<?php

namespace App\Http\Controllers;

use App\Models\ReportSource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ReportSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reportSources=ReportSource::orderBy("id","desc")->get();
        return view("admin.report.report_source",compact("reportSources"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
      if(Schema::hasTable($request->name) || $this->isViewExist($request->name)){
          $source=new ReportSource();
          $source->name=$request->name;
          $source->type=$request->type;
          $source->save();
          return redirect()->back()->with("success","Report Source Created Successfully");
      }else return redirect()->back()->with("error","Report Source Does not Exist");


    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReportSource  $reportSource
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, ReportSource $reportSource)
    {
        //
        if(Schema::hasTable($request->name)|| $this->isViewExist($request->name)) {
            $reportSource->name = $request->name;
            $reportSource->type = $request->type;
            $reportSource->save();
            return redirect()->back()->with("success", "Report Source updated Successfully");
        }else return redirect()->back()->with("error","Report Source Does not Exist");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReportSource  $reportSource
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ReportSource $reportSource)
    {

        //
        try{
            $reportSource->delete();
            return redirect()->back()->with("success", "Report Source destroyed Successfully");
        }catch (\Exception $exception){
            return back()->with('error', $exception->getMessage());
        }


    }


}
