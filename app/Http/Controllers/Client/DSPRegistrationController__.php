<?php

namespace App\Http\Controllers\Client;

use App\FileManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateDspAddress;
use App\Http\Requests\ValidateDspIdentification;
use App\Http\Requests\ValidateDspRegistration;
use App\Http\Requests\ValidateDspRepresentative;
use App\Models\Application;
use App\Models\ApplicationBaseModel;
use App\Models\ApplicationCompletedProject;
use App\Models\ApplicationFlowHistory;
use App\Models\ApplicationSolution;
use App\Models\BusinessSector;
use App\Models\CompanyCategory;
use App\Models\DSPRegistration;
use App\Models\Province;
use App\Models\RegistrationType;
use App\Models\Service;
use DB;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Throwable;

class DSPRegistrationController extends Controller
{


    public int $formTotalSteps = 7;

    protected function guard(): StatefulGuard
    {
        return Auth::guard('client');
    }

    public function index()
    {
        $model = DSPRegistration::with(['companyCategory'])
            ->whereHas('application', function (Builder $builder) {
                $builder->where('client_id', '=', $this->guard()->id());
            })
            ->first();
        $application_id = 0;
        $application = null;
        $selected_supports = [];
        $selected_categories = [];
        $selected_interests = collect();
        if (is_null($model)) {
            $currentStep = 0;
        } else {
            $application = $model->application;
            $currentStep = $application->current_step;
            $application_id = $model->application_id;

            $selected_supports = $application->services->pluck("id");
            if (!is_null($selected_supports)) {
                $selected_supports = $selected_supports->toArray();
            }

            $selected_categories = $application->categories->pluck("id");
            if (!is_null($selected_categories)) {
                $selected_categories = $selected_categories->toArray();
            }

            $selected_interests = $application->interests()->get();
        }

        $currentStep++;
        $provinces = Province::all();
        $categories = $this->getCategories();


        $projects = ApplicationCompletedProject::where('application_id', '=', $application_id)
            ->latest('end_date')
            ->get();

        $solutions = ApplicationSolution::where('application_id', '=', $application_id)
            ->with('platformTypes')
            ->latest()
            ->get();

        $businessSectors = BusinessSector::orderBy('name')->get();
        $supportServices = $this->getSupportServices();

        $history = $this->getLastComment(optional($application)->id);
        return view('frontend.dsp.dsp_application_form',
            compact('provinces', 'model', 'categories', 'currentStep', 'projects', 'solutions', 'history', 'application', 'businessSectors', 'supportServices'), [
                "selected_business_sectors" => (optional(optional(optional($model)->application)->businessSectors)->pluck("id") ?? collect())->toArray(),
                "selected_supports" => $selected_supports,
                'selected_categories' => $selected_categories,
                'registrationTypes' => $this->getRegistrationTypes(),
                'selected_interests' => $selected_interests,
                'formTotalSteps' => $this->formTotalSteps
            ]
        );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param ValidateDspRegistration $request
     * @return DSPRegistration|JsonResponse
     * @throws Throwable
     */
    public function store(ValidateDspRegistration $request)
    {
        $request->validated();
        DB::beginTransaction();
        $authId = \auth('client')->id();
        $application = Application::where('client_id', '=', $authId)
            ->first();
        if (is_null($application)) {
            $application = Application::create([
                'client_id' => $authId,
                'status' => ApplicationBaseModel::DRAFT,
            ]);

            $model = new DSPRegistration();
            session()->put('app_id', $application->id);
            $this->saveApplicationFlow($application->id, 'Application started', 'Draft');

        } else {
            $model = DSPRegistration::where([
                ['application_id', '=', $application->id]
            ])->first();
        }

        $model = $this->saveModel($request, $model, $application);
        $currentStep = $request->input('current_step');
        $application->update([
            'current_step' => $currentStep,
            'bio' => $request->input('bio'),
            'company_category_id' => $request->input('company_category_id')
        ]);

        if ($currentStep == $this->formTotalSteps) {
            $application->status = ApplicationBaseModel::SUBMITTED;
            $application->save();
            DB::commit();
            return \response()->json(['success' => true, 'location' => route('client.profile')], 200);
        }

        DB::commit();

        return $model->load('application');
    }

    public function saveAddress(ValidateDspAddress $request, DSPRegistration $model): RedirectResponse
    {
        $request->validated();
        $model->village_id = $request->input('village_id');
        $model->website = $request->input('website');
        $model->province_id = $request->input('province_id');
        $model->district_id = $request->input('district_id');
        $model->sector_id = $request->input('sector_id');
        $model->cell_id = $request->input('cell_id');

        $model->update();


        return back()->with("success", "Company address successfully edited !");
    }

    /**
     * @throws Throwable
     */
    public function saveIdentification(ValidateDspIdentification $request, DSPRegistration $model): RedirectResponse
    {


        $request->validated();

        $application = $model->application;

        DB::beginTransaction();


        if ($request->hasFile('rdb_certificate')) {
            $dir = FileManager::DSP_RDB_CERTIFICATE_PATH;
            if ($model && $rdb_certificate = $model->rdb_certificate) {
                Storage::delete($dir . $rdb_certificate);
            }

            $uuid = "rdb_certificate_" . $application->id . "_" . Str::slug(Str::uuid(), '_');
            $file = $request->file('rdb_certificate');
            $extension = $file->extension();
            $path = $file->storeAs($dir, "$uuid" . ".$extension");
            $model->rdb_certificate = str_replace("$dir", '', $path);
        }

        $application->update([
            'bio' => $request->input('bio'),
        ]);

        $model->company_email = $request->input('company_email');
        $model->registration_date = $request->input('registration_date');
        $model->company_name = $request->input('company_name');
        $model->TIN = $request->input('tin');
        $model->company_phone = $request->input('company_phone');
        $model->number_of_employees = $request->input('number_of_employees');


        $model->application->businessSectors()->sync($request->input("business_sector_id"));
        $model->application->services()->sync($request->input("support_service_id"));
        $model->application->categories()->sync($request->input("categories_id"));

        $model->update();

        $this->saveInterests($model->application, $request);

        DB::commit();

        return back()->with("success", "Company representative successfully edited !");

    }

    public function saveRepresentative(ValidateDspRepresentative $request, DSPRegistration $model): RedirectResponse
    {

        $request->validated();
        $model->representative_name = $request->input('representative_name');
        $model->representative_email = $request->input('representative_email');
        $model->representative_phone = $request->input('representative_phone');
        $model->representative_position = $request->input('representative_position');
        $model->representative_gender = $request->input('representative_gender');
        $model->representative_physical_disability = $request->input('representative_physical_disability');


        $model->update();


        return back()->with("success", "Company representative successfully edited !");
    }


    /**
     * @param ValidateDspRegistration $request
     * @param DSPRegistration $model
     * @param $application
     * @return DSPRegistration
     */
    private function saveModel(ValidateDspRegistration $request, DSPRegistration $model, $application): DSPRegistration
    {
        $model->application_id = $application->id;
        $model->company_name = $request->input('company_name');
        $model->TIN = $request->input('tin');
        $model->company_phone = $request->input('company_phone');
        $model->company_email = $request->input('company_email');
        $model->registration_date = $request->input('registration_date');
        $model->number_of_employees = $request->input('number_of_employees');
//        $model->company_category_id = $request->input('company_category_id');

        $model->province_id = $request->input('province_id');
        $model->district_id = $request->input('district_id');
        $model->sector_id = $request->input('sector_id');
        $model->cell_id = $request->input('cell_id');
        $model->village_id = $request->input('village_id');
        $model->website = $request->input('website');
        $model->company_description = $request->input('company_description');

        $model->representative_name = $request->input('representative_name');
        $model->representative_email = $request->input('representative_email');
        $model->representative_phone = $request->input('representative_phone');
        $model->representative_position = $request->input('representative_position');
        $model->representative_gender = $request->input('representative_gender');
        $model->representative_physical_disability = $request->input('representative_physical_disability');

        if ($request->hasFile('rdb_certificate')) {
            $dir = FileManager::DSP_RDB_CERTIFICATE_PATH;
            if ($model && $rdb_certificate = $model->rdb_certificate) {
                Storage::delete($dir . $rdb_certificate);
            }

            $uuid = "rdb_certificate_" . $application->id . "_" . Str::slug(Str::uuid(), '_');
            $file = $request->file('rdb_certificate');
            $extension = $file->extension();
            $path = $file->storeAs($dir, "$uuid" . ".$extension");
            $model->rdb_certificate = str_replace("$dir", '', $path);
        }

        if ($request->hasFile('logo')) {
            $dir = FileManager::DSP_LOGO_PATH;
            if ($model && $logo = $model->logo) {
                Storage::delete($dir . $logo);
            }

            $uuid = "logo_" . $application->id . "_" . Str::slug(Str::uuid(), '_');
            $file = $request->file('logo');
            $extension = $file->extension();
            $path = $file->storeAs($dir, "$uuid" . ".$extension");
            $model->logo = str_replace("$dir", '', $path);
        }


        $model->application->businessSectors()->sync($request->input("business_sector_id"));

        if ($request->input('current_step') == 2) {
            $model->application->services()->sync($request->input("support_service_id"));
            $this->saveInterests($model->application, $request);

        }

        $model->application->categories()->sync($request->input("categories_id"));


        $model->save();
        return $model;
    }

    public function details(Application $application)
    {

        $application->load(['client.registrationType', 'completedProjects', 'applicationSolutions.platformTypes']);
        $model = getDspModel($application);
        $history = $this->getLastComment(optional($application)->id);
        $provinces = Province::all();
        $categories = $this->getCategories();
        $selected_supports = $application->services->pluck("id");
        if (!is_null($selected_supports)) {
            $selected_supports = $selected_supports->toArray();
        }

        $selected_categories = $application->categories->pluck("id");
        if (!is_null($selected_categories)) {
            $selected_categories = $selected_categories->toArray();
        }
        $supportServices = $this->getSupportServices();
        $businessSectors = BusinessSector::orderBy('name')->get();

        $selected_interests = $application->interests()->with(['category', 'registrationType'])->get();
        return \view('frontend.dsp.dsp_application_details', compact('model', 'businessSectors', 'application', 'history',
            'provinces',
            'selected_categories',
            'selected_supports',
            'supportServices',
            'categories'))->with([
            "selected_business_sectors" => (optional(optional(optional($model)->application)->businessSectors)->pluck("id") ?? collect())->toArray(),
            'selected_interests' => $selected_interests,
            'registrationTypes' => $this->getRegistrationTypes()
        ]);
    }

    public function downloadAttachment($id)
    {
        $type = \request('type');
        $registration = DSPRegistration::find(decryptId($id));
        $path = '';
        if ($type == 'rdb') {
            $path = FileManager::DSP_RDB_CERTIFICATE_PATH . $registration->rdb_certificate;
        } elseif ($type == 'logo') {
            $path = FileManager::DSP_LOGO_PATH . $registration->logo;
        }

        if (Storage::exists($path))
            return Storage::download($path);
        return \response('File not found', 404);
    }



}
