<?php


namespace App\Http\Controllers;


use App\Client;
use App\Models\JobOpportunity;
use App\Models\Partner;
use App\Models\RegistrationType;
use App\Models\Webinar;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class HomepageController extends Controller
{

    public function setLang($lang): RedirectResponse
    {
        Session::put('lang', $lang);
        App::setLocale($lang);
        return back();
    }

    public function index()
    {
        $webinars=Webinar::query()
        ->where(function ($q){
            $q->whereDate("end_date",'>=',now())
                ->orWhereHas("otherDates",function ($q){
                    $q->whereDate("end_date",'>=',now());
                });
        })->latest()->take(5)->get();
        $jobs = JobOpportunity::query()->limit(5)->orderByDesc("id")->get();
        $partners = Partner::query()->limit(20)->orderByDesc("id")
            ->get();


        $msmes = Client::with(['registrationType', 'application'])
            ->withoutMe()->whereHas('application')
            ->whereHas("ratings")
            ->whereHas('registrationType', function (Builder $builder) {
                $builder->where('name', '=', RegistrationType::MSME);
            })->orderRating()
            ->limit(4)
            ->get();


        $dsps = Client::with(['registrationType', 'application'])
            ->withoutMe()
            ->whereHas('application')
            ->whereHas("ratings")
            ->whereHas('registrationType', function (Builder $builder) {
                $builder->where('name', '=', RegistrationType::DSP);
            })
            ->orderRating()
            ->limit(4)
            ->get();


        $iworkers = Client::with(['registrationType', 'application'])
            ->withoutMe()->whereHas('application')
            ->whereHas('registrationType', function (Builder $builder) {
                $builder->where('name', '=', RegistrationType::iWorker);
            })
            ->whereHas("ratings")
            ->orderRating()
            ->limit(4)
            ->get();

        return view('client.v2.home_page', compact('webinars', 'jobs', 'partners', 'msmes', 'dsps', 'iworkers'));
    }


}
