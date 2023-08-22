<?php

namespace App\Http\Controllers;


use App\Models\Audit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AuditingController extends Controller
{
    //
    public function index(){
        $audits=Audit::query()->whereDate('created_at','=',Carbon::now()->toDateString())->orderBy('id',"desc")->get();

        $start_date=Carbon::now()->toDateString();
        $end_date=Carbon::now()->toDateString();
        return view('admin.audits',compact('audits','start_date','end_date'));
    }

    public function customAudits($start,$end){

        $start_date=$start;
        $end_date=$end;
        $audits=Audit::query()->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->get();
        return view('admin.audits',compact('audits','start_date','end_date'));
    }

    public function destroy($id){
        $audit=Audit::find($id);
        $audit->delete();
        return redirect()->back()->with('success','Audit Destroyed');
    }
}
