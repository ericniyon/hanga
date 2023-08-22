<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ApplicationSolution;
use App\Models\BusinessSector;
use App\Models\Cell;
use App\Models\DigitalPlatform;
use App\Models\District;
use App\Models\MSMERegistration;
use App\Models\PaymentMethod;
use App\Models\Province;
use App\Models\Sector;
use App\Models\Village;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class StartupController extends Controller
{
    private int $steps = 6;

    function index()
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

        return view('frontend.startup.startup_application', compact('categories', 'provinces', 'platforms', 'businessSectors', 'paymentMethods', 'supportServices', 'solutions', 'model', 'application', 'history'))->with(
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
}
