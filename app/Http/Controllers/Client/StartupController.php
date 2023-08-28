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
    private int $steps = 7;

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

        $clientId = \auth('client')->id();
        $rdbCertificates = null;
        $companyLogo = null;
        $companypitch_deck = null;
        $existingLogo = StartupCompanyProfile::where('client_id', '=', $clientId)->pluck('logo')->first();
        $existingCertificate = StartupCompanyProfile::where('client_id', '=', $clientId)->pluck('rdb_certificate')->first();
        $existingPitchDEck = StartupCompanyProfile::where('client_id', '=', $clientId)->pluck('pitch_deck')->first();
        DB::beginTransaction();

        $currentStep = $request->input('current_step');

        if ($request->has('logo')) {

            $logo       = $request->logo;
            $companyLogo        =   Storage::disk('logos')->put('/', $logo);
        } else {
            $companyLogo        =   $existingLogo;
        }

        if ($request->has('pitch_deck')) {
            $pitch_deck       = $request->pitch_deck;
            $companypitch_deck = Storage::disk('pitch_deck')->put('/', $pitch_deck);
        } else {
            $companypitch_deck        =   $existingPitchDEck;
        }

        if ($request->has('rdb_certificate')) {
            # code...
            $rdb_certificate       = $request->rdb_certificate;
        } else {
            $rdbCertificates = $existingCertificate;
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
                'pitch_deck' => $companypitch_deck,
                'website' => $request->website,
                'mission' => $request->mission,
                'logo' => $companyLogo,
                'bio' => $request->business_description,
                'current_step' => 1,
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
                'registration_date' => $request->registration_date,
                'number_of_employee' => $request->number_of_employees,
                'rdb_certificate' => $rdbCertificates,
                'website' => $request->website,
                'mission' => $request->mission,
                'logo' => $companyLogo,
                'pitch_deck' => $companypitch_deck,
                'current_step' => $currentStep,
                'bio' => $request->business_description,

                // business model
                'target_customers'  => $request->target_customers,
                'business_model'    => $request->business_model == null ?: implode(',', $request->business_model),
                'revenue_stream'    => $request->revenue_stream,
                'customer_value'    => $request->customer_value,
                'gmt_channel'       => $request->gmt_channel,

                // traction
                'market_size_tam'   => $request->market_size_tam,
                'market_size_sam'   => $request->market_size_sam,
                'market_size_som'   => $request->market_size_som,
                'active_users'      => $request->active_users,
                'paying_customers'  => $request->paying_customers,
                'anual_recuring_revenue' => $request->anual_recuring_revenue,
                // 'revenue_frequency' => $request->revenue_frequency,
                'customer_growth_rate' => $request->customer_growth_rate,
                'gross_transaction_value' => $request->gross_transaction_value,

                // fundraising
                'current_startup_stage' => $request->current_startup_stage,
                'previous_investment_size' => $request->previous_investment_size,
                'previous_investment_type' => $request->previous_investment_type,
                'target_investors' => $request->target_investors == null ?: implode(',', $request->target_investors),
                'target_investment_size' => $request->target_investment_size,
                'fundraising_breakdown' => $request->fundraising_breakdown,
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
        DB::beginTransaction();

        $model = StartupCompanyTeam::create([
            'client_id' => \auth('client')->id(),
            'team_firstname' => $request->team_firstname,
            'team_lastname' => $request->team_lastname,
            'team_phone' => $request->team_phone,
            'team_email' => $request->team_email,
            'team_position' => $request->team_position,
            'team_linkedin' => $request->linkedin_profile,
            'team_description' => $request->team_mate_description
        ]);

        DB::commit();
        if ($request->ajax())
            return $model;
        return back();
    }

    function saveSolutions(ValidateStartUpSolution $request)
    {
        $model =    StartupSolution::create([
            'client_id'  => \auth('client')->id(),
            'product_type' => $request->solution_type,
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->solution_status,

            'active_users' => $request->active_users,
            'capacity' => $request->capacity,
            'product_link' => $request->product_link,
        ]);

        DB::commit();
        if ($request->ajax())
            return $model;
        return back();
    }
}
