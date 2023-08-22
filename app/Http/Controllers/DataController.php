<?php

namespace App\Http\Controllers;

use App\Models\BusinessSector;
use App\Models\BusinessSectorRegistrationType;
use App\Models\Cell;
use App\Models\CompanyCategory;
use App\Models\District;
use App\Models\Province;
use App\Models\Sector;
use App\Models\Service;
use App\Models\ServiceRegistrationType;
use App\Models\Village;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function getDistricts(Province $province): \Illuminate\Database\Eloquent\Collection
    {
        return $province->districts()->get();
    }

    public function getSectors(District $district): \Illuminate\Database\Eloquent\Collection
    {
        return $district->sectors()->get();
    }

    public function getCells(Sector $sector): \Illuminate\Database\Eloquent\Collection
    {
        return $sector->cells()->get();
    }
    public function getVillages(Cell $cell): \Illuminate\Database\Eloquent\Collection
    {
        return $cell->villages()->get();
    }


    public function getMultipleDistricts(Request $request): \Illuminate\Database\Eloquent\Collection
    {
        return District::query()->whereIn("province_id",$request->provinces)->get();
    }

    public function getMultipleSectors(Request $request): \Illuminate\Database\Eloquent\Collection
    {
        return Sector::query()->whereIn("district_id",$request->districts)->get();
    }

    public function getMultipleCells(Request $request): \Illuminate\Database\Eloquent\Collection
    {
        return Cell::query()->whereIn("sector_id",$request->sectors)->get();
    }
    public function getMultipleVillages(Request $request): \Illuminate\Database\Eloquent\Collection
    {
        return Village::query()->whereIn("cell_id",$request->cells)->get();
    }

    public function getDedicatedServicesAndBusiness(Request $request): array
    {
        $categoriesIds=\DB::table("category_registration_type")
            ->whereIn("registration_type_id",$request->types)->get()->pluck("category_id");
        $categories=CompanyCategory::query()->whereIn("id",$categoriesIds)->get();
        return ["categories"=>$categories];

    }
}
