<?php


namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Webinar;

class WebinarsController extends Controller
{

    public function index()
    {
        $recommendations=Webinar::query()
            ->where(function ($q){
                $q->whereDate("end_date",'>=',now())
                    ->orWhereHas("otherDates",function ($q){
                        $q->whereDate("end_date",'>=',now());
                    });
            })->latest()->take(5)->get();
        return view('frontend.webinars',compact('recommendations'));
    }

    public function details(Webinar $webinar)
    {
        $upcomingEvents=Webinar::query()->where('id','<>',$webinar->id)
            ->where(function ($q){
                $q->whereDate("end_date",'>=',now())
                    ->orWhereHas("otherDates",function ($q){
                        $q->whereDate("end_date",'>=',now());
                    });
            })->orderBy("start_date")->take(5)->get();
        return view('frontend.webinar_details',compact('webinar','upcomingEvents'));
    }

}
