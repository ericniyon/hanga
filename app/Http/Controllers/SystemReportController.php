<?php

namespace App\Http\Controllers;

use App\Exports\ReportExport;
use App\Models\ReportSource;
use App\Models\SystemReport;
use App\Unit;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\DataTables;

class SystemReportController extends Controller
{
    //

    public function index()
    {
        $reportSources = ReportSource::orderBy("id", "desc")->get();
        $reports = SystemReport::orderBy("id", "desc");
        $reports=$reports->get();
        return view("admin.report.report_list", compact("reports", "reportSources"));
    }

    public function viewCreateReport(Request $request)
    {
        $reportSource = ReportSource::find($request->reportSource);
        $columns = Schema::getColumnListing($reportSource->name);
        return view("admin.report.create_report", compact("reportSource", "columns"));
    }



    public function editReport(SystemReport $systemReport)
    {
        $reportSource = ReportSource::where("name", $systemReport->data_source)->first();
        $columns = Schema::getColumnListing($reportSource->name);
        return view("admin.report.update_report", compact("reportSource", "columns", "systemReport"));
    }

    public function updateReport(Request $request, SystemReport $report): \Illuminate\Http\RedirectResponse
    {
        DB::beginTransaction();
        $report->report_name = $request->report_name;
        $report->data_source = $request->report_source;
        $report->column_list = implode(",", $request->columnList);
        $report->require_date_filter = $request->require_date_filter == null ? 0 : 1;
        $report->date_filter = $request->date_filter;
        $report->date_filter_description = $request->date_filter_description;
        $report->is_active = $request->is_active == null ? 0 : 1;
        $report->save();
        DB::commit();
        return redirect()->route("admin.report.list")->with("success","Report Is update Successfully");
    }

    /**delete existing report
     * @param SystemReport $report
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyReport(SystemReport $report): \Illuminate\Http\RedirectResponse
    {
        //
        $report->delete();
        return redirect()->back()->with("success", "Report is destroyed Successfully");
    }

     /**store report
     * @param SystemReport $report
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createReport(Request $request): \Illuminate\Http\RedirectResponse
    {
        DB::beginTransaction();
        $report = new SystemReport();
        $report->report_name = $request->report_name;
        $report->data_source = $request->report_source;
        $report->column_list = implode(",", $request->columnList);
        $report->require_date_filter = $request->require_date_filter == null ? 0 : 1;
        $report->date_filter = $request->date_filter;
        $report->date_filter_description = $request->date_filter_description;
        $report->save();
        DB::commit();
        return redirect()->route("admin.report.list");

    }

    public function generateReportView()
    {
        $reports = SystemReport::orderBy("id", "desc")->where("is_active",true)->get();
        $start_date = Carbon::now()->startOfYear()->toDateString();
        $end_date = Carbon::now()->toDateString();
        return view("admin.report.construct_report", compact("reports", "start_date", "end_date"));
    }

    public function generateReport(Request $request)
    {

        $report = SystemReport::find($request->report);
        $columns = $request->columnList;
        if ($request->columnList) {
            if (Schema::hasTable($report->data_source) || $this->isViewExist($report->data_source)) {
                    $data = DB::table($report->data_source);
                    if ($request->filter_value && $request->filter_selector) {
                        $data->where($request->filter_selector, 'LIKE', "%$request->filter_value%");
                    }
                    if ($report->require_date_filter) {
                        if ($request->start_date) {
                            $data->whereDate($report->date_filter, ">=", $request->start_date);
                        }
                        if ($request->end_date) {
                            $data->whereDate($report->date_filter, "<=", $request->end_date);
                        }
                    }

                    if($request->download==true){
                        $data = $data->select('*');
                        $title=$request->report_name??$report->report_name;
                        return $this->exportReport($data,$columns,$title);
                    }
                    $columnNames=collect();
                    foreach ($columns as $column){
                        $arr=[];
                        $arr["name"]=$column;
                        $columnNames->push($arr);
                    }
                    if ($request->ajax()) {
                        return Datatables::of($data->select($columns))
                            ->rawColumns(['status'])
                            ->make(true);
                    }
                    return view("admin.report.generated_custom_report", compact("data", "columns", "report","columnNames"));

            } else return redirect()->back()->with("error", "Report Source Does not Exist");
        } else return redirect()->back()->with("error", "Please Select At least one column");

    }

    public function exportReport($query,$columns,$title): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        $name='Report_'.time();
        return Excel::download(new ReportExport($query,$columns,$title), "$name.xlsx");
    }
}
