<?php

namespace App\Http\Controllers;

use App\Client;
use App\Exports\ClientExport;
use App\Exports\ReportExport;
use App\Models\Application;
use App\Models\BusinessSector;
use App\Models\CompanyCategory;
use App\Models\Province;
use App\Models\RegistrationType;
use App\Models\ReportSource;
use App\Models\Service;
use App\Models\SystemReport;
use CategoryRegistrationType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ReportController extends Controller
{
    //

    public function index(){

        $services = Service::latest()->get();
        $sectors = BusinessSector::latest()->get();
        $registrationTypes=RegistrationType::latest()->get();
        $provinces=Province::all();
        $categories=CompanyCategory::all();
        return view('admin.report.index',compact('services','sectors','registrationTypes','provinces','categories'));
    }

    public function generatedReport(Request $request){
        $sectors = $request->input("sectors");
        $services = $request->input("services");
        $types =$request->input("types");
        $provinces=$request->provinces;
        $districts=$request->districts;
        $location_sectors=$request->location_sectors;
        $cells=$request->cells;
        $villages=$request->villages;
        $categories=$request->categories;
        $end_date=$request->end_date;
        $start_date=$request->start_date;
        if($request->ajax() || $request->download==1){
            $query = Client::with(['registrationType','application']);

            $query->when($provinces && !$districts,function ($q) use ($provinces) {
                return $this->queryLocations($q, "province_id", $provinces);
            });
            $query->when($districts,function ($q) use ($districts) {
                return $this->queryLocations($q, "district_id", $districts);
            });
            $query->when($location_sectors,function ($q) use ($location_sectors) {
                return $this->queryLocations($q, "sector_id", $location_sectors);
            });
            $query->when($cells,function ($q) use ($cells) {
                return $this->queryLocations($q, "cell_id", $cells);
            });
            $query->when($villages,function ($q) use ($villages) {
                return $this->queryLocations($q, "village_id", $villages);
            });

            $query->whereHas("application", function (Builder $builder) use ($sectors,$categories,$services,$start_date,$end_date){
                $builder->when($sectors,function (Builder $q) use ($sectors) {
                  return  $q->whereHas('businessSectors', function (Builder $builder) use ($sectors) {
                        $builder->whereIn("business_sectors.id", $sectors);
                    });
                });
                $builder->when($categories,function (Builder $q) use ($categories){
                   return $q->whereHas("companyCategory", function (Builder $builder) use ($categories) {
                       return $builder->whereIn("company_categories.id", $categories);
                    });
                });
                $builder->when($services,function (Builder $q) use ($services){
                   return $q->whereHas('services', function (Builder $builder) use ($services) {
                       return $builder->whereIn("services.id", $services);
                    });
                });
                $builder->when($start_date,function (Builder $q) use ($start_date) {
                    return $q->whereDate("created_at",">=", $start_date);
                });
                $builder->when($end_date,function (Builder $q) use ($end_date){
                  return $q->whereDate("created_at","<=", $end_date);
                });
                $builder->where("status","<>",Application::DRAFT);
            });

            $query->when($types,function (Builder $q) use ($types){
                return $q->whereHas("registrationType", function (Builder $builder) use ($types) {
                    $builder->whereIn("registration_types.id", $types);
                });
            });
            $clients=$query->select('clients.*');
            if($request->download==1){
                $name="Member_".time().".xlsx";
                return \Excel::download(new ClientExport($clients,$request->report_name),$name);
            }
            return $this->formatGeneralReportValue($clients);
        }
        $report_name=$request->report_name;
        return view("admin.report.generated_report",compact("report_name"));
    }


    protected function queryLocations(Builder $builder,$locationName,$locationLevelValues): Builder
    {
        return $builder->whereHas("application", function (Builder $builder) use ($locationName,$locationLevelValues) {
            $builder->whereHas('iWorkerRegistrations', function (Builder $builder) use ($locationName,$locationLevelValues) {
                $builder->whereIn("$locationName", $locationLevelValues);
            })->orWhereHas('msmeRegistrations', function (Builder $builder) use ($locationName,$locationLevelValues) {
                    $builder->whereIn("$locationName", $locationLevelValues);
                })
                ->orWhereHas('dspRegistrations', function (Builder $builder) use ($locationName,$locationLevelValues) {
                    $builder->whereIn("$locationName", $locationLevelValues);
                });
        });
    }


    /**
     * function to format values of datatable
     */
    public function formatGeneralReportValue($applications)
    {
        return Datatables::of($applications)
            ->addIndexColumn()
            ->editColumn('submission_date', function ($item) {
                return $item->submission_date;
            })
            ->editColumn('type', function ($item) {
                return $item->registrationType->name;
            })->editColumn('registration_date', function ($item) {
                return $item->application->created_at??'';
            })
            ->editColumn('is_verified', function ($item) {
                if($item->application->status==Application::APPROVED){
                    return '<span class="label label-light-success label-inline" >Yes</span>';

                }else{
                    return '<span class="label label-light-warning label-inline" >No</span>';
                }
            })->rawColumns(['is_verified'])
            ->make(true);
    }

}
