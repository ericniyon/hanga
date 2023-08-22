<?php

namespace App\Http\Controllers\v2;

use App\Client;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\GoogleRatings;
use App\Models\RegistrationType;

class DspController extends Controller
{

    public function details(Client $client)
    {
        $application = $client->application;
        $DSPRegistration = optional($application)->dspRegistrations;
        if (is_null($DSPRegistration))
        {
            return back()->with('error', "Details not found");
        }

        $client->loadCount('ratings');
        // $client->loadCount('google_ratings');
        $client->loadSum('ratings', 'rating');

        $client->load(['application.businessSectors', 'application.dspRegistrations']);


        $registrationTypes = RegistrationType::with('categories')->whereHas('categories')->get();
        $google_ratings = GoogleRatings::where('client_id', $client->id)->count();

        // dd($google_ratings->loadSum('ratings', 'rating'));
        $selected_interests = $application->interests()->with(['category', 'registrationType'])->get();


        return view('client.v2.dsp.details', [
            'application' => $application,
            'model' => $DSPRegistration,
            'client' => $client,
            'google_ratings' => $google_ratings,
            'editable' => false,
            'registrationTypes' => $registrationTypes,
            'selected_interests' => $selected_interests,
            'review' => false,
        ]);
    }

}
