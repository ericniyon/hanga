<?php


namespace App\Http\Controllers\Client;


use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Throwable;
use App\FileManager;
use App\Models\Cell;
use App\Models\Sector;
use function response;
use App\Models\Service;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use App\Models\Application;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use Illuminate\Http\Response;
use App\Models\BusinessSector;
use App\Models\CompanyCategory;
use App\Models\DigitalPlatform;
use App\Models\MSMERegistration;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Models\ApplicationSolution;
use App\Http\Controllers\Controller;
use App\Models\ApplicationBaseModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\ApplicationFlowHistory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\StatefulGuard;
use App\Http\Requests\ValidateMsmeRegistration;
use App\Http\Requests\ValidateMsmesBizIdentification;
use App\Http\Requests\ValidateMsmesCompanyAddress;
use App\Http\Requests\ValidateMsmesRepresentative;

class MsmeController extends Controller
{
    private int $steps = 6;

    protected function guard(): StatefulGuard
    {
        return Auth::guard('client');
    }

    public function index()
    {
        $model = MSMERegistration::with(['companyCategory'])
            ->whereHas('application', function (Builder $builder) {
                $builder->where('client_id', '=', \auth('client')->id());
            })->first();
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
        $platforms = DigitalPlatform::all();
        $businessSectors = BusinessSector::all();
        $paymentMethods = PaymentMethod::all();
        $supportServices = $this->getSupportServices();

        $solutions = ApplicationSolution::where('application_id', '=', $application_id)
            ->latest()
            ->get();
        $history = $this->getLastComment(optional($application)->id);

        return view('frontend.msmes.msme_application', compact('categories', 'provinces', 'platforms', 'businessSectors', 'paymentMethods', 'supportServices', 'solutions', 'model', 'application', 'history'))->with(
            [
                "currentStep" => $currentStep,
                'steps' => $this->steps,
                "selected_platforms" => (optional(optional($model)->digitalPlatforms)->pluck("id") ?? collect())->toArray(),
                "selected_payments" => (optional(optional($model)->paymentMethods)->pluck("id") ?? collect())->toArray(),
                "selected_supports" => $selected_supports,
                "selected_business_sectors" => (optional(optional(optional($model)->application)->businessSectors)->pluck("id") ?? collect())->toArray(),
                'districts' => District::query()->where("province_id", "=", $model->province_id ?? 0)->get(),
                'sectors' => Sector::query()->where("district_id", "=", $model->district_id ?? 0)->get(),
                'cells' => Cell::query()->where("sector_id", "=", $model->sector_id ?? 0)->get(),
                'villages' => Village::query()->where("cell_id", "=", $model->cell_id ?? 0)->get(),
                'selected_categories' => $selected_categories,
                'registrationTypes' => $this->getRegistrationTypes(),
                'selected_interests' => $selected_interests
            ]
        );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param ValidateMsmeRegistration $request
     * @return MSMERegistration|JsonResponse|RedirectResponse
     * @throws Throwable
     */
    public function store(ValidateMsmeRegistration $request)
    {
        $request->validated();
        DB::beginTransaction();
        $clientId = \auth('client')->id();
        $application = Application::where('client_id', '=', $clientId)->first();
        $currentStep = $request->input('current_step');
        if ($application == null) {
            $application = Application::create([
                'client_id' => $clientId,
                'status' => ApplicationBaseModel::DRAFT,
            ]);
            $model = new MSMERegistration();
            $this->saveApplicationFlow($application->id, 'Application started', ApplicationBaseModel::DRAFT);

        } else {
            $model = MSMERegistration::where([
                ['application_id', '=', $application->id]
            ])->first();
        }

        $model = $this->saveModel($request, $model, $application);

        $application->update([
            'current_step' => $currentStep,
            'bio' => $request->input('bio'),
            'company_category_id' => $request->input('company_category_id'),
        ]);

        if ($currentStep == $this->steps) {
            //check if you have a completed projects
            /*  if ($application->applicationSolutions()->doesntExist()) {
                  DB::rollBack();
                  return \response()->json(['error' => 'Please add  your products or services to continue'], ResponseAlias::HTTP_BAD_REQUEST);
              }*/

            /*           if ($application->status == ApplicationBaseModel::DRAFT) {
                           $application->submission_date = now();
                       }*/
            $application->status = ApplicationBaseModel::SUBMITTED;
            $application->save();

            $this->saveApplicationFlow($application->id, 'Application submitted', ApplicationBaseModel::SUBMITTED);
            DB::commit();
            return response()->json(['success' => true, 'location' => route('client.profile')], 200);
        }
        DB::commit();
        if ($request->ajax())
            return $model->load('application');
        return back();
    }


    /**
     * @param ValidateMsmeRegistration $request
     * @param MSMERegistration $model
     * @param $application
     * @return MSMERegistration
     */
    private function saveModel(ValidateMsmeRegistration $request, MSMERegistration $model, $application): MSMERegistration
    {
        $model->application_id = $application->id;
        $model->company_name = $request->input('company_name');
        $model->tin = $request->input('tin');
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
        $model->has_digital_platform = $request->input('has_digital_platform');

        $model->representative_name = $request->input('representative_name');
        $model->representative_email = $request->input('representative_email');
        $model->representative_phone = $request->input('representative_phone');
        $model->representative_position = $request->input('representative_position');
        $model->representative_gender = $request->input('representative_gender');
        $model->representative_physical_disability = $request->input('representative_physical_disability');


        if ($request->hasFile('rdb_certificate')) {
            $dir = FileManager::MSME_RDB_CERTIFICATE_PATH;
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
            $dir = FileManager::MSME_LOGO_PATH;
            if ($model && $logo = $model->logo) {
                Storage::delete($dir . $logo);
            }

            $uuid = "logo_" . $application->id . "_" . Str::slug(Str::uuid(), '_');
            $file = $request->file('logo');
            $extension = $file->extension();
            $path = $file->storeAs($dir, "$uuid" . ".$extension");
            $model->logo = str_replace("$dir", '', $path);
        }

        $model->save();

        $model->load(["digitalPlatforms", "application"]);


        $model->digitalPlatforms()->sync($request->input("platform_id"));
        $model->paymentMethods()->sync($request->input("payment_method_id"));

        if ($request->input('current_step') == 2) {
            $model->application->services()->sync($request->input("support_service_id"));
            $this->saveInterests($model->application, $request);
        }


        $model->application->businessSectors()->sync($request->input("business_sector_id"));
        $model->application->categories()->sync($request->input("categories_id"));


        return $model;
    }

    public function details(Application $application)
    {
        $application->load(['client.registrationType', 'applicationSolutions']);
        $model = getMsmeModel($application);

        $history = $this->getLastComment(optional($application)->id);
        $provinces = Province::all();
        $districts = District::all();
        $sectors = Sector::all();
        $cells = Cell::all();
        $villages = Village::all();
        $categories = CompanyCategory::all();

        $platforms = DigitalPlatform::all();
        $businessSectors = BusinessSector::all();
        $paymentMethods = PaymentMethod::all();
        $supportServices = $this->getSupportServices();

        $selected_categories = $application->categories->pluck("id");
        if (!is_null($selected_categories)) {
            $selected_categories = $selected_categories->toArray();
        }

        $selected_supports = $application->services->pluck("id");
        if (!is_null($selected_supports)) {
            $selected_supports = $selected_supports->toArray();
        }

        $selected_interests = $application->interests()->with(['category', 'registrationType'])->get();
        return \view('frontend.msmes.msme_application_details',
            compact('model', 'application', 'application', 'history', 'provinces', 'districts', 'sectors', 'cells', 'villages', 'categories', 'businessSectors',
                'paymentMethods', 'platforms', 'supportServices', 'selected_supports', 'selected_categories'))
            ->with([
                "selected_business_sectors" => (optional(optional(optional($model)->application)->businessSectors)->pluck("id") ?? collect())->toArray(),
                "selected_payments" => (optional(optional($model)->paymentMethods)->pluck("id") ?? collect())->toArray(),
                "selected_platforms" => (optional(optional($model)->digitalPlatforms)->pluck("id") ?? collect())->toArray(),
                'selected_interests' => $selected_interests,
                'registrationTypes' => $this->getRegistrationTypes()
            ]);
    }

    public function downloadAttachment($id)
    {
        $type = \request('type');
        $registration = MSMERegistration::find(decryptId($id));
        $path = '';
        if ($type == 'rdb') {
            $path = FileManager::MSME_RDB_CERTIFICATE_PATH . $registration->rdb_certificate;
        } elseif ($type == 'logo') {
            $path = FileManager::MSME_LOGO_PATH . $registration->logo;
        }

        if (Storage::exists($path))
            return Storage::download($path);
        return \response('File not found', 404);
    }

    public function updateBizIdetification(ValidateMsmesBizIdentification $request, $application)
    {
        $request->validated();

        $application = Application::find($application);
        $model = getMsmeModel($application);
        if ($request->hasFile('rdb_certificate')) {
            $dir = FileManager::MSME_RDB_CERTIFICATE_PATH;
            if ($model && $rdb_certificate = $model->rdb_certificate) {
                Storage::delete($dir . $rdb_certificate);
            }

            $uuid = "rdb_certificate_" . $application->id . "_" . Str::slug(Str::uuid(), '_');
            $file = $request->file('rdb_certificate');
            $extension = $file->extension();
            $path = $file->storeAs($dir, "$uuid" . ".$extension");
            $request->merge(['rdb_certificate' => str_replace("$dir", '', $path)]);
        }
        $input = $request->except(['business_sector_id', 'payment_method_id', 'support_service_id', 'platform_id', 'bio', 'interests_id', 'interests_id','categories_id']);
        $application->update(['bio' => $request->input('bio')]);
        $model->update($input);
        $model->application->services()->sync($request->input("support_service_id"));
        $model->digitalPlatforms()->sync($request->input("platform_id"));
        $model->paymentMethods()->sync($request->input("payment_method_id"));
        $model->application->businessSectors()->sync($request->input("business_sector_id"));
        $model->application->categories()->sync($request->input("categories_id"));

        $this->saveInterests($application, $request);

        return back()->with('success', 'Representative details updated successfully!');
    }

    public function updateRepresentativeDetails(ValidateMsmesRepresentative $request, $application): RedirectResponse
    {
        $request->validated();

        $application = Application::find($application);
        $model = getMsmeModel($application);
        $model->update($request->all());
        return back()->with('success', 'Representative details updated successfully!');
    }

    public function updateCompanyAddress(ValidateMsmesCompanyAddress $request, $application): RedirectResponse
    {
        $request->validated();

        $application = Application::find($application);
        $model = getMsmeModel($application);
        $model->update($request->all());
        return back()->with('success', 'Company address updated successfully!');
    }

}
