<?php


namespace App\Http\Controllers\Frontend;


use App\Client;
use App\Models\Application;
use App\Models\ApplicationBaseModel;
use App\Models\BusinessSector;
use App\Models\District;
use App\Models\Province;
use App\Models\RegistrationType;
use App\Models\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SearchController extends \App\Http\Controllers\Controller
{

    public function searchView()
    {
        $services = Service::latest()->get();
        $sectors = BusinessSector::latest()->get();
        $provinces = Province::query()->latest()->get();
        $searchedMembers = Client::with('registrationType')
            ->whereHas("searchHistory")
            ->withoutMe()
            ->whereHas('registrationType', function (Builder $builder) {
//                $builder->where('name', '=', RegistrationType::iWorker);
            })
            ->whereHas("application", function (Builder $builder) {
                $builder->whereNotIn("status", [Application::DRAFT, Application::REJECTED]);
            })
            ->orderSearch()->limit(8)
            ->get();

        return view('frontend.search', compact('services', 'sectors', 'searchedMembers','provinces'));
    }

    public function getSearchResult(Request $request)
    {
        $sectors = explode(",", $request->input("sectors"));
        $services = explode(",", $request->input("service"));
        $types = explode(",", $request->input("types"));

        $query = Client::with('registrationType')->whereHas("application");

        if (!empty($request->input("sectors"))) {
            if (count($sectors) > 0) {

                $query->whereHas("application", function (Builder $builder) use ($sectors) {
                    $builder->whereHas('businessSectors', function (Builder $builder) use ($sectors) {
                        $builder->whereIn("business_sector_id", $sectors);
                    });
                });
            }
        }

        $sector = $request->input("sector");
        if (!empty($sector)) {
                $query->whereHas("application", function (Builder $builder) use ($sector) {
                    $builder->whereHas('msmeRegistrations', function (Builder $builder) use ($sector) {
                        $builder->where("sector_id", $sector);
                    })->orWhereHas('iWorkerRegistrations', function (Builder $builder) use ($sector) {
                        $builder->where("sector_id", $sector);
                    })->orWhereHas('dspRegistrations', function (Builder $builder) use ($sector) {
                        $builder->where("sector_id", $sector);
                    });
                });
        }

        $district = $request->input("district");
        if (!empty($district)) {
                $query->whereHas("application", function (Builder $builder) use ($district) {
                    $builder->whereHas('msmeRegistrations', function (Builder $builder) use ($district) {
                        $builder->where("district_id", $district);
                    })->orWhereHas('iWorkerRegistrations', function (Builder $builder) use ($district) {
                        $builder->where("district_id", $district);
                    })->orWhereHas('dspRegistrations', function (Builder $builder) use ($district) {
                        $builder->where("district_id", $district);
                    });
                });
        }

        $province = $request->input("province");
        if (!empty($province)) {
                $query->whereHas("application", function (Builder $builder) use ($province) {
                    $builder->whereHas('msmeRegistrations', function (Builder $builder) use ($province) {
                        $builder->where("province_id", $province);
                    })->orWhereHas('iWorkerRegistrations', function (Builder $builder) use ($province) {
                        $builder->where("province_id", $province);
                    })->orWhereHas('dspRegistrations', function (Builder $builder) use ($province) {
                        $builder->where("province_id", $province);
                    });
                });
        }

        if (!empty($request->input("types"))) {
            if (count($types) > 0) {

                $query->whereHas("registrationType", function (Builder $builder) use ($types) {
                    $builder->whereIn("name", $types);
                });
            }
        }


        if (!empty($request->input("service"))) {
            if (count($services) > 0) {
                $query->whereHas("application", function (Builder $builder) use ($services) {
                    $builder
//                        ->whereHas('iWorkerRegistrations', function (Builder $builder) use ($services) {
//                            $builder->whereHas('services', function (Builder $builder) use ($services) {
//                                $builder->whereIn("id", $services);
//                            });
//                        })
//                        ->orWhereHas('msmeRegistrations', function (Builder $builder) use ($services) {
//                            $builder->whereHas('supportServices', function (Builder $builder) use ($services) {
//                                $builder->whereIn("services.id", $services);
//                            });
//                        })
                        ->whereHas('services', function (Builder $builder) use ($services) {
                            $builder->whereIn("services.id", $services);
                        });
                });
            }
        }
        $clients = $query->orderSearch()->get();
        return view('frontend._search_result', compact('clients'));
    }

    public function getEmployers()
    {
        $name = strtolower(\request('search'));
        return Client::whereHas('application', function (Builder $builder) {
            if (!app()->environment('local'))
                $builder->where('status', ApplicationBaseModel::APPROVED);
        })->whereHas('registrationType', function (Builder $builder) {
            $builder->whereIn('name', [RegistrationType::DSP, RegistrationType::MSME]);
        })
            ->withoutMe()
            ->where(\DB::raw('LOWER(name)'), 'LIKE', "%$name%")->orderBy('name')->get();
    }

}
