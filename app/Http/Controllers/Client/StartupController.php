<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateStartupRegistration;
use App\Http\Requests\ValidateStartUpSolution;
use App\Http\Requests\ValidateStartupTeam;
use App\Models\Cell;
use App\Models\DigitalPlatform;
use App\Models\District;
use App\Models\PaymentMethod;
use App\Models\Province;
use App\Models\Sector;
use App\Models\StartupCategory;
use App\Models\StartupCompanyProfile;
use App\Models\StartupCompanyTeam;
use App\Models\StartupSolution;
use App\Models\StartupSubCategory;
use App\Models\Village;
use DB;
use Illuminate\Http\Request;
use Storage;

class StartupController extends Controller
{
    private int $steps = 3;

    function index()
    {
        $model = StartupCompanyProfile::where('client_id', \auth('client')->id())->first();
        $teamMembers = StartupCompanyTeam::where('client_id', \auth('client')->id())->get();
        $application_id = 0;
        $application = null;
        $selected_sub_categories = null;
        $selected_supports = [];
        $selected_categories = [];
        $selected_interests = collect();

        if (is_null($model)) {
            $currentStep = 0;
        } else {
            // $application = $model->application;
            $currentStep = $model->current_step;
            $application_id = $model->id;

            $selected_categories = $model->category_id;
            $selected_sub_categories = $model->sub_category_id;
        }

        $currentStep++;

        $provinces  = Province::all();
        $categories = StartupCategory::all();
        $platforms  = DigitalPlatform::all();
        $businessSectors    = StartupSubCategory::all();
        $paymentMethods     = PaymentMethod::all();
        $supportServices    = $this->getSupportServices();

        $solutions  = StartupSolution::where('client_id', '=', \auth('client')->id())->latest()->get();
        $history    = $this->getLastComment(optional($application)->id);

        return view('frontend.startup.startup_application', compact('categories', 'provinces', 'platforms', 'businessSectors', 'paymentMethods', 'supportServices', 'solutions', 'model', 'application', 'history'))->with(
            [
                "currentStep" => $currentStep,
                'teamMembers' => $teamMembers,
                'selected_sub_categories' => $selected_sub_categories,
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

    public function store(ValidateStartupRegistration $request)
    {
        $request->validated();

        $rdbCertificates = null;
        $companyLogo = null;
        DB::beginTransaction();
        $clientId = \auth('client')->id();

        $currentStep = $request->input('current_step');

        if ($request->has('logo')) {
            # code...
            $logo       = $request->logo;
            $logo_name  = $logo->getClientOriginalName();
            $companyLogo        =   Storage::disk('logos')->put('/', $logo);
        }

        if ($request->has('rdb_certificate')) {
            # code...

            $rdb_certificate       = $request->rdb_certificate;
            $rdb_certificate_name  = $rdb_certificate->getClientOriginalName();

            $rdbCertificates    =   Storage::disk('rdb_certificate')->put('/', $rdb_certificate);
        }

        if (!StartupCompanyProfile::where('client_id', '=', $clientId)->exists()) {
            $model = StartupCompanyProfile::create([
                'client_id' => $clientId,
                'category_id' => $request->company_category,
                'sub_category_id' => $request->business_sector_id,
                'company_name' => $request->company_name,
                'tin' => $request->tin,
                'phone' => $request->company_phone,
                'email' => $request->company_email,
                // 'location'=>$request->,
                'registration_date' => $request->registration_date,
                'number_of_employee' => $request->number_of_employees,
                'rdb_certificate' => $rdbCertificates,
                'website' => $request->website,
                'mission' => $request->mission,
                'logo' => $companyLogo,
                'bio' => $request->bio,
                'current_step' => 1,


                'revenue_stream' => $request->revenue_stream,
                'market_size' => $request->market_size,
                'fund_raising' => $request->fund_raising,
                'fund_raising_reason' => $request->fund_raising_reason,
                'acheivement' => $request->acheivement,
                'acheivement_date' => $request->acheivement_date,
            ]);
            DB::commit();
            return $model;
        } else {
            $model = StartupCompanyProfile::where('client_id', '=', $clientId)->update([
                'client_id' => $clientId,
                'category_id' => $request->company_category,
                'sub_category_id' => $request->business_sector_id,
                'company_name' => $request->company_name,
                'tin' => $request->tin,
                'phone' => $request->company_phone,
                'email' => $request->company_email,
                // 'location'=>$request->,
                'registration_date' => $request->registration_date,
                'number_of_employee' => $request->number_of_employees,
                'rdb_certificate' => $rdbCertificates,
                'website' => $request->website,
                'mission' => $request->mission,
                'logo' => $companyLogo,
                'current_step' => $currentStep,
                'bio' => $request->bio,

                'revenue_stream' => $request->revenue_stream,
                'market_size' => $request->market_size,
                'fund_raising' => $request->fund_raising,
                'fund_raising_reason' => $request->fund_raising_reason,
                'acheivement' => $request->acheivement,
                'acheivement_date' => $request->acheivement_date,
            ]);
            DB::commit();

            return $model;
        }
        return back();
    }

    /**
     * @throws Throwable
     */
    public function saveStartupTeam(ValidateStartupTeam $request)
    {
        $request->validated();
        DB::beginTransaction();

        $model = StartupCompanyTeam::create([
            'client_id' => \auth('client')->id(),
            'team_firstname' => $request->team_firstname,
            'team_lastname' => $request->team_lastname,
            'team_phone' => $request->team_phone,
            'team_email' => $request->team_email,
            'team_position' => $request->team_position,
        ]);

        DB::commit();
        if ($request->ajax())
            return $model;
        return back();
    }

    function saveSolutions(Request $request)
    {
        $model =    StartupSolution::create([
            'client_id'  => \auth('client')->id(),
            'product_type' => $request->solution_type,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        DB::commit();
        if ($request->ajax())
            return $model;
        return back();
    }
}
