<?php

namespace App\Http\Controllers\v2;

use App\Client;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\JobOpportunity;
use App\Models\Partner;
use App\Models\RegistrationType;
use App\Models\Webinar;
use App\Traits\HasTopRated;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    use HasTopRated;

    public function index()
    {
        $webinars = Webinar::query()
            ->where(function ($q) {
                $q->whereDate("end_date", '>=', now())
                    ->orWhereHas("otherDates", function ($q) {
                        $q->whereDate("end_date", '>=', now());
                    });
            })->latest()->take(5)->get();
        $jobs = JobOpportunity::query()->limit(5)->orderByDesc("id")->get();


        $msmes = $this->getHighRatedMsmes();


        $dsps = $this->getHighRatedDsp();


        $iworkers = $this->getHighRatedIworkers();

        return view('client.v2.home_page', compact('webinars', 'jobs', 'msmes', 'dsps', 'iworkers'));
    }



    public function joinAs()
    {
        return view('client.v2.join_as');
    }

    public function profile()
    {
        return view('client.v2.auth.profile');
    }

    public function howItWorks()
    {

        $msmes = $this->getHighRatedMsmes();


        $dsps = $this->getHighRatedDsp();


        $iworkers = $this->getHighRatedIworkers();

        return view('client.v2.how_it_works', [
            'msmes' => $msmes,
            'dsps' => $dsps,
            'iworkers' => $iworkers,
            // 'iworkers' => $iworkers
        ]);
    }

    public function clientDetails(Client $client): RedirectResponse
    {
        //TODO save profile visit


        if ($client->registration_type_id == RegistrationType::MSME_ID) {
            return redirect()->route('v2.msme.details', encryptId($client->id));
        }
        elseif ($client->registration_type_id == RegistrationType::DSP_ID) {
            return redirect()->route('v2.dsp.details', encryptId($client->id));
        }
        elseif ($client->registration_type_id == RegistrationType::iWorkerId) {
            return redirect()->route('v2.iworker.details', encryptId($client->id));
        }
        return back();
    }


}
