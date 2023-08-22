<?php

namespace App\Http\Controllers;

use App\Models\DSPRegistration;
use App\Models\IworkerRegistration;
use App\Models\MembershipApplication;
use App\Models\MSMERegistration;
use App\Models\Plan;
use App\Models\Webinar;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $membership =   array();

        $upcomingEvents=Webinar::query()
            ->where(function ($q){
                $q->whereDate("end_date",'>=',now())
                    ->orWhereHas("otherDates",function ($q){
                        $q->whereDate("end_date",'>=',now());
                    });
            })->orderBy("start_date")->take(5)->get();

        $plans    =   Plan::all();
        $packages = MembershipApplication::all();

        return view('admin.dashboard',compact("upcomingEvents","plans",'packages'));
    }

    function chartData(){

        $months  =   array();
        $dsp     =   array();
        $iworker =   array();
        $msme    =   array();
        $data    =   array();

        for ($i=1; $i <=12; $i++) {
            array_push($months,Carbon::create(null, $i)->format('F'));
            array_push($dsp,DSPRegistration::whereMonth('created_at',$i)->whereYear('created_at',date('Y'))->count());
            array_push($msme,MSMERegistration::whereMonth('created_at',$i)->whereYear('created_at',date('Y'))->count());
            array_push($iworker,IworkerRegistration::whereMonth('created_at',$i)->whereYear('created_at',date('Y'))->count());
        }

        $data   =   [
            'months'=>$months,
            'dsp'=>$dsp,
            'msme'=>$msme,
            'iworker'=>$iworker,
        ];

        return json_encode($data);
    }

}
