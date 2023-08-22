<?php

namespace App\Http\Controllers\v2;

use App\Client;
use App\Http\Controllers\Controller;
use App\Models\GoogleRatings;
use App\Models\RegistrationType;

class MsmeController extends Controller
{


    public function details(Client $client)
    {
        $application = $client->application;
        $MSMERegistration = optional($application)->msmeRegistrations;
        if (is_null($MSMERegistration))
        {
            return back()->with('error', "Details not found");
        }


        $client->loadCount('ratings');
        $client->loadSum('ratings', 'rating');

        $client->load(['application.businessSectors', 'application.msmeRegistrations']);

        $google_ratings = GoogleRatings::where('client_id', $client->id)->count();

        $registrationTypes = RegistrationType::with('categories')->whereHas('categories')->get();
        $selected_interests = $application->interests()->with(['category', 'registrationType'])->get();


        return view('client.v2.msme.details', [
            'application' => $application,
            'model' => $MSMERegistration,
            'google_ratings' => $google_ratings,
            
            'client' => $client,
            'editable' => false,
            'registrationTypes' => $registrationTypes,
            'selected_interests' => $selected_interests,
            'review' => false,
        ]);
    }
}
