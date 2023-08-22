<?php


namespace App\Http\Controllers\Client;


use App\Constants;
use App\FileManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateIworker;
use App\Http\Requests\ValidateIworkerInformation;
use App\Http\Requests\ValidateIworkerMoreDetails;
use App\Http\Requests\ValidateUpdateCompanyRepresentative;
use App\Models\Affiliation;
use App\Models\Application;
use App\Models\ApplicationBaseModel;
use App\Models\ApplicationBranch;
use App\Models\BusinessSector;
use App\Models\FieldOfStudy;
use App\Models\IworkerRegistration;
use App\Models\PhysicalDisability;
use App\Models\Province;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Throwable;
use function request;
use function response;
use function view;

class IworkerRegistrationController extends Controller
{
    protected function guard(): StatefulGuard
    {
        return Auth::guard('client');
    }

    public function index()
    {
        $model = IworkerRegistration::query()
            ->whereHas('application', function (Builder $builder) {
                $builder->where('client_id', '=', $this->guard()->id());
            })->first();
        $application_id = 0;
        $selected_supports = [];
        $selected_categories = [];
        $selected_interests = collect();
        if (is_null($model)) {
            $currentStep = 0;
        } else {
            $currentStep = $model->application->current_step;
            $application = $model->application;
            $application_id = $model->application_id;
            $selected_supports = $model->application->services->pluck("id");
            if (!is_null($selected_supports)) {
                $selected_supports = $selected_supports->toArray();
            }
            $selected_categories = $model->application->categories->pluck("id");
            if (!is_null($selected_categories)) {
                $selected_categories = $selected_categories->toArray();
            }

            $selected_interests = $application->interests()->get();
        }

        $categories = $this->getCategories();

        $currentStep++;
        $provinces = Province::all();
        $payments = is_null($model) ? [] : $model->paymentMethods()->pluck('payment_method_id')->toArray();
        $creditSources = is_null($model) ? [] : $model->creditSources()->pluck('credit_source_id')->toArray();
        $skills = is_null($model) ? [] : $model->skills()->pluck('iworker_soft_skill_id')->toArray();
        $platforms = is_null($model) ? collect() : $model->iWorkerDigitalPlatforms()->get();

        $certificates = [];
        if (optional($model)->iworker_type == Constants::Individual) {
            $certificates = $model->certificates()->latest()->get();
        }
        $branches = [];
        $employees = [];
        if (optional($model)->iworker_type == Constants::Company) {
            $branches = ApplicationBranch::where('application_id', '=', $application_id)->latest()->get();
            $employees = $model->companyEmployees()->with('studyLevel')->latest()->get();
        }
        $supportServices = $this->getSupportServices();
        $experiences = is_null($model) ? collect() : $model->experiences()->latest()->get();

        $affiliations = Affiliation::query()->where('client_id', '=', \auth('client')->id())->get();

        $fieldOfStudies = FieldOfStudy::all();
        $physicalDisabilities = PhysicalDisability::all();

        $businessSectors = BusinessSector::all();
        $selected_business_sectors = (optional(optional(optional($model)->application)->businessSectors)->pluck("id") ?? collect())->toArray();

        $totalFormSteps = 8;
        if (optional($model)->iworker_type == Constants::Individual) {
            $totalFormSteps = 7;
        }


        return view('frontend.iworker.iworker_application_form',
            compact('provinces', 'model', 'currentStep', 'payments', 'creditSources', 'skills', 'platforms', 'certificates', 'experiences', 'branches', 'employees', 'selected_supports', 'supportServices', 'categories', 'selected_categories', 'affiliations', 'fieldOfStudies', 'physicalDisabilities', 'businessSectors', 'selected_business_sectors'), [
                'registrationTypes' => $this->getRegistrationTypes(),
                'selected_interests' => $selected_interests,
                'totalFormSteps' => $totalFormSteps
            ]);
    }

    /**
     * @throws Throwable
     */
    public function store(ValidateIworker $request)
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
                'bio' => $request->input('bio'),
            ]);
            $model = new IworkerRegistration();
            $this->saveApplicationFlow($application->id, 'Application started', 'Draft');

        } else {
            $model = IworkerRegistration::where([
                ['application_id', '=', $application->id]
            ])->first();
        }

        $model = $this->saveModel($request, $model, $application);
        $currentStep = $request->input('current_step');
        $application->update(['current_step' => $currentStep]);

        $finalStep = 8;
        if ($model->iworker_type == Constants::Individual) {
            $finalStep = 7;
        }
        if ($currentStep == $finalStep) {

            $application->update([
                'status' => ApplicationBaseModel::SUBMITTED,
//                'submission_date' => now()
            ]);
            $application->save();
            DB::commit();
            return response()->json(['success' => true, 'location' => route('client.profile')], 200);
        }

        DB::commit();

        return $model->load('application');
    }

    private function saveModel(ValidateIworker $request, IworkerRegistration $model, $application): IworkerRegistration
    {
        $model->application_id = $application->id;
        $model->iworker_type = $request->input('iworker_type');
        $model->id_type = $request->input('id_type');
        $model->id_number = $request->input('id_number');
        $model->name = $request->input('name');
        $model->phone = $request->input('phone');
        $model->email = $request->input('email');
        $model->gender = $request->input('gender');
        $model->website = $request->input('website');
        $model->portfolio_link = $request->input('portfolio_link');

        $model->comp_date_of_registration = $request->input('comp_date_of_registration');
        $model->dob = $request->input('dob');
        $model->level_of_study_id = $request->input('level_of_study_id');
        $model->field_of_study_id = $request->input('field_of_study_id');
        $model->website = $request->input('website');
        $model->physical_disability_id = $request->input('physical_disability_id');
        $model->rep_physical_disability_id = $request->input('rep_physical_disability_id');

        $model->province_id = $request->input('province_id');
        $model->district_id = $request->input('district_id');
        $model->sector_id = $request->input('sector_id');
        $model->cell_id = $request->input('cell_id');
        $model->village_id = $request->input('village_id');
        $model->digital_literacy = $request->input('digital_literacy');
        $model->can_attend_online_class = $request->input('can_attend_online_class') == Constants::Yes;
        $model->has_bank_account = $request->input('has_bank_account') == Constants::Yes;
        $model->credit_access = $request->input('credit_access') == Constants::Yes;


        $model->cp_representative_name = $request->input('cp_representative_name');
        $model->cp_representative_email = $request->input('cp_representative_email');
        $model->cp_representative_phone = $request->input('cp_representative_phone');
        $model->cp_representative_position = $request->input('cp_representative_position');
        $model->cp_representative_gender = $request->input('cp_representative_gender');
        $model->cp_description = $request->input('cp_description');
        $model->brief_bio = $request->input('brief_bio');

        if ($request->hasFile('supporting_document')) {
            $dir = FileManager::IWORKER_DOCS_PATH;
            if ($model && $rdb_certificate = $model->supporting_document) {
                Storage::delete($dir . $rdb_certificate);
            }

            $uuid = "supporting_document_" . $application->id . "_" . Str::slug(Str::uuid(), '_');
            $file = $request->file('supporting_document');
            $extension = $file->extension();
            $path = $file->storeAs($dir, "$uuid" . ".$extension");
            $model->supporting_document = str_replace("$dir", '', $path);
        }

        if ($request->hasFile('profile_picture')) {
            $dir = FileManager::IWORKER_PROFILE_PIC_PATH;
            if ($model && $logo = $model->profile_picture) {
                Storage::delete($dir . $logo);
            }
            $uuid = "profile_picture_" . $application->id . "_" . Str::slug(Str::uuid(), '_');
            $file = $request->file('profile_picture');
            $extension = $file->extension();
            $path = $file->storeAs($dir, "$uuid" . ".$extension");
            $model->profile_picture = str_replace("$dir", '', $path);
        }

        if ($request->hasFile('logo')) {
            $dir = FileManager::IWORKER_LOGO_PATH;
            if ($model && $logo = $model->logo) {
                Storage::delete($dir . $logo);
            }
            $uuid = "logo_" . $application->id . "_" . Str::slug(Str::uuid(), '_');
            $file = $request->file('logo');
            $extension = $file->extension();
            $path = $file->storeAs($dir, "$uuid" . ".$extension");
            $model->logo = str_replace("$dir", '', $path);
        }
        if ($request->hasFile('rdb_certificate')) {
            $dir = FileManager::IWORKER_RDB_CERTIFICATE_PATH;
            if ($model && $logo = $model->rdb_certificate) {
                Storage::delete($dir . $logo);
            }
            $uuid = "rdb_certificate_" . $application->id . "_" . Str::slug(Str::uuid(), '_');
            $file = $request->file('rdb_certificate');
            $extension = $file->extension();
            $path = $file->storeAs($dir, "$uuid" . ".$extension");
            $model->rdb_certificate = str_replace("$dir", '', $path);
        }

        $model->creditSources()->sync($request->input('credit_sources'));
        $model->paymentMethods()->sync($request->input('digital_payments'));
        $model->skills()->sync($request->input('software_skills'));

        $model->application->categories()->sync($request->input("categories_id"));

        $model->application->businessSectors()->sync($request->input("business_sector_id"));

        $digitalPlatformsId = $request->input('platforms');
        $model->digitalPlatforms()->detach($digitalPlatformsId);
        foreach ($digitalPlatformsId as $key => $item) {
            $input = $request->input("platforms_links")[$key];
            if (!$input) continue;
            $model->iWorkerDigitalPlatforms()->create([
                'link' => $input,
                'digital_platform_id' => $item
            ]);
        }


        $model->save();

        if ($request->input('current_step') == 2) {
            $model->application->services()->sync($request->input("support_service_id"));
            $this->saveInterests($model->application, $request);
        }

        return $model;
    }

    public function details(Application $application)
    {

        $application->load(['client.registrationType', 'categories']);
        $model = IworkerRegistration::with(['experiences'])
            ->whereHas('application', function (Builder $builder) use ($application) {
                $builder->where('id', '=', $application->id);
            })->first();
        $provinces = Province::all();
        $selected_categories = $model->application->categories->pluck("id");
        if (!is_null($selected_categories)) {
            $selected_categories = $selected_categories->toArray();
        }

        $selected_supports = $model->application->services->pluck("id");
        if (!is_null($selected_supports)) {
            $selected_supports = $selected_supports->toArray();
        }

        $provinces = Province::all();
        $payments = is_null($model) ? [] : $model->paymentMethods()->pluck('payment_method_id')->toArray();
        $creditSources = is_null($model) ? [] : $model->creditSources()->pluck('credit_source_id')->toArray();
        $skills = is_null($model) ? [] : $model->skills()->pluck('iworker_soft_skill_id')->toArray();
        $platforms = is_null($model) ? collect() : $model->iWorkerDigitalPlatforms()->get();
        $supportServices = $this->getSupportServices();

        $fieldOfStudies = FieldOfStudy::all();
        $physicalDisabilities = PhysicalDisability::all();

        $businessSectors = BusinessSector::orderBy('name')->get();
        $selected_interests = $application->interests()->with(['category', 'registrationType'])->get();
        return view('frontend.iworker.iworker_application_details', compact('model', 'application', 'provinces', 'selected_categories', 'creditSources', 'payments', 'skills', 'platforms', 'supportServices', 'selected_supports', 'fieldOfStudies', 'physicalDisabilities', 'businessSectors'))
            ->with([
                "selected_business_sectors" => (optional(optional(optional($model)->application)->businessSectors)->pluck("id") ?? collect())->toArray(),
                'registrationTypes' => $this->getRegistrationTypes(),
                'selected_interests' => $selected_interests
            ]);
    }

    public function downloadAttachment($id)
    {
        $type = request('type');
        $registration = IworkerRegistration::find(decryptId($id));
        $path = '';
        if ($type == 'rdb') {
            $path = FileManager::IWORKER_RDB_CERTIFICATE_PATH . $registration->rdb_certificate;
        } elseif ($type == 'logo') {
            $path = FileManager::IWORKER_LOGO_PATH . $registration->logo;
        } elseif ($type == 'profile') {
            $path = FileManager::IWORKER_PROFILE_PIC_PATH . $registration->profile_picture;
        } elseif ($type == 'doc') {
            $path = FileManager::IWORKER_DOCS_PATH . $registration->supporting_document;
        }

        if (Storage::exists($path))
            return Storage::download($path);
        return response('File not found', 404);
    }

    /**
     * @throws Throwable
     */
    public function updateInformation(ValidateIworkerInformation $request, $id)
    {
        $request->validated();
        $registration = IworkerRegistration::find(decryptId($id));
        DB::beginTransaction();

        $registration
            ->forceFill(
                $request->except([
                    'bio', '_token', 'proengsoft_jsvalidation', 'categories_id', 'supporting_document', ''
                ])
            )
            ->update();

        $registration->application()->update([
            'bio' => $request->input('bio'),
        ]);
        $registration->application->categories()->sync($request->input("categories_id"));

        DB::commit();
        if ($request->ajax())
            return $registration;
        return back();
    }


    /**
     * @throws Throwable
     */
    public function updateMoreDetails(ValidateIworkerMoreDetails $request, $id)
    {
        $request->validated();
        $model = IworkerRegistration::find(decryptId($id));
        DB::beginTransaction();

        $model->creditSources()->sync($request->input('credit_sources'));
        $model->paymentMethods()->sync($request->input('digital_payments'));
        $model->skills()->sync($request->input('software_skills'));
        $model->application->services()->sync($request->input("support_service_id"));

        $digitalPlatformsId = $request->input('platforms');
        $model->digitalPlatforms()->detach($digitalPlatformsId);
        $model->application->businessSectors()->sync($request->input("business_sector_id"));


        $platforms_links = [];
        foreach ($digitalPlatformsId as $item) {
            $input = $request->input("platforms_link$item");
            $platforms_links[] = "platforms_link$item";
            if (!$input) continue;
            $model->iWorkerDigitalPlatforms()->create([
                'link' => $input,
                'digital_platform_id' => $item
            ]);
        }
//        return response()->json($platforms_links,400);

        $excepts = ['_token', 'proengsoft_jsvalidation', 'credit_sources', 'digital_payments', 'software_skills', 'support_service_id', 'platforms', 'business_sector_id', 'interests_id'];
        $model
            ->forceFill(
                $request->except(array_merge($excepts, $platforms_links))
            )->update();
        $this->saveInterests($model->application, $request);

        DB::commit();
        if ($request->ajax())
            return $model;
        return back();
    }

    /**
     * @throws Throwable
     */
    public function updateCompanyRepresentative(ValidateUpdateCompanyRepresentative $request, $id)
    {
        $request->validated();
        $registration = IworkerRegistration::find(decryptId($id));
        DB::beginTransaction();


        $registration
            ->forceFill(
                $request->except([
                    '_token', 'proengsoft_jsvalidation'
                ])
            )
            ->update();
        DB::commit();
        if ($request->ajax())
            return $registration;
        return back();
    }


}
