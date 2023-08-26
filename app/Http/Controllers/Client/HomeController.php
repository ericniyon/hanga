<?php


namespace App\Http\Controllers\Client;


use App\Client;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationBaseModel;
use App\Models\ApplicationCompletedProject;
use App\Models\ApplicationSolution;
use App\Models\Connection;
use App\Models\DSPRegistration;
use App\Models\IworkerExperience;
use App\Models\IworkerRegistration;
use App\Models\MSMERegistration;
use App\Models\RegistrationType;
use App\Models\SearchHistory;
use App\Models\StartupCompanyProfile;
use App\Models\StudyLevel;
use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Throwable;

class HomeController extends Controller
{

    public function messages()
    {
        return view('chat_blade');
    }

    public function home()
    {
        $application = Application::with('client.registrationType')
            ->where('client_id', '=', auth('client')->id())
            ->first();

        $application2 = StartupCompanyProfile::where('client_id', '=', auth('client')->id())
            ->first();

        if (is_null($application)) {
            // if (is_null($application) && is_null($application2)) {
            return redirect()->to(route('v2.join.as'));
        }
        return view('client.home', [
            'application' => $application == null ? $application2 : $application,
        ]);
    }

    public function profile()
    {
        $user = auth('client')->user();
        $application = Application::with('client.registrationType')
            ->where('client_id', '=', auth('client')->id())
            ->first();

        if (is_null($application)) {
            return redirect()->to(route('v2.join.as'));
        }
        $suggested = Client::with(['registrationType', 'application.businessSectors'])
            ->withCount('ratings')
            ->withSum('ratings', 'rating')
            ->withoutMe()
            ->whereHas('registrationType')
            ->notConnectedWithMe()
            ->mySuggestions()
            ->limit(10)
            ->get();
        $pendingRequest = Connection::query()
            ->where("friend_id", $user->id)
            ->where("status", Connection::PENDING)
            ->get();
        return view('client.profile', [
            'application' => $application,
            'suggested' => $suggested,
            'pendingRequest' => $pendingRequest,
        ]);
    }

    public function registrationType()
    {
        $types = RegistrationType::all();
        return view('client.choose_registration_type', compact('types'));
    }

    public function startApplication(): RedirectResponse
    {
        $type = request('type');
        $route = null;
        if ($type == RegistrationType::DSP) {
            $route = route('client.dsp.application.form');
        } elseif ($type == RegistrationType::iWorker) {
            $route = route('client.iworker.application.form');
        } elseif ($type == RegistrationType::MSME) {
            $route = route('client.msme.application.form');
        } elseif ($type == RegistrationType::STARTUP) {
            $route = route('client.startup.application.form');
        } else {
            redirect()->to('/');
        }

        $model = RegistrationType::findByName($type);

        $client = auth('client')->user();
        $client->registration_type_id = $model->id;
        $client->update();

        return redirect()->to($route ?? '/');
    }

    /**
     * @throws Throwable
     */
    public function resetRegistration(): RedirectResponse
    {
        $client = auth('client')->user();

        $type = $client->registrationType->name;

        DB::beginTransaction();

        if ($type == RegistrationType::DSP) {
            DSPRegistration::reset();
        } elseif ($type == RegistrationType::iWorker) {
            IworkerRegistration::reset();
        } elseif ($type == RegistrationType::MSME) {
            MSMERegistration::reset();
        }


        $client->registration_type_id = null;
        $client->update();

        DB::commit();
        return redirect()->to(route('client.home'))
            ->with('success', 'Registration deleted successfully');
    }

    public function details(Request $request, string $slug)
    {


        $client = Client::with(['registrationType', 'application' => function ($builder) {
            $this->getWhereNotIn($builder);
        }])->whereHas('application', function ($builder) {
            $this->getWhereNotIn($builder);
        })->where('name_slug', '=', $slug)->firstOrFail();
        $application = $client->application;

        $from = $request->input("from");
        if (!empty($from) && strpos($from, '/search') !== false) {
            SearchHistory::create(
                [
                    "client_id" => $client->id,
                    "search_by_id" => auth()->guard('client')->id()
                ]
            );
            return redirect(route('client.details', ['slug' => $slug]));
        }

        $recommendations = Client::with(['registrationType', 'application'])
            ->where('registration_type_id', $client->registration_type_id)
            ->notConnectedWithMe()
            ->where("id", '<>', $client->id)
            ->withoutMe()
            ->latest()
            ->orderByRaw("(select count(a.id) from application_service a inner join applications app on app.id = a.application_id  where app.client_id = clients.id and a.service_id in ( select s.service_id from application_service s where s.application_id = " . $client->application->id . ")) desc")
            ->limit(10)->get();
        saveProfileVisit($client);

        if ($client->type == RegistrationType::iWorker) {
            $model = getIworkerModel($application);
        } else if ($client->type == RegistrationType::MSME) {
            $model = getMsmeModel($application);
            $application->load(['client.registrationType', 'applicationSolutions']);
        } else if ($client->type == RegistrationType::DSP) {
            $model = getDspModel($application);
            $application->load(['client.registrationType', 'completedProjects', 'applicationSolutions.platformTypes']);
        }

        return view('client.client_details', compact('client', 'model', 'application', 'recommendations'));
    }

    /**
     * @param $builder
     */
    public function getWhereNotIn($builder): void
    {
        if (!app()->environment('local'))
            $builder->whereNotIn("status", [ApplicationBaseModel::DRAFT, ApplicationBaseModel::REJECTED]);
    }

    /**
     * @return string
     */
    protected function getStatus(): string
    {
        if (app()->environment('local'))
            return ApplicationBaseModel::DRAFT;
        return ApplicationBaseModel::APPROVED;
    }

    public function openApis()
    {
        return view('frontend.open_apis');
    }

    public function about()
    {
        return view('frontend.about_ihuzo');
    }

    public function verification()
    {
        $application = auth('client')->user()->application;
        return view('frontend.request_verification', compact('application'));
    }

    public function myEmployees()
    {

        $application = auth('client')->user()->application;
        return view('frontend.my_employees', compact('application'));
    }

    public function fieldOfStudy(StudyLevel $level): Collection
    {
        return $level->fieldOfStudy()->get();
    }
}
