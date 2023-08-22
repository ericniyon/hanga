<?php

namespace App\Http\Controllers\v2;

use App\Client;
use App\Http\Controllers\Controller;
use App\Models\RegistrationType;
use function PHPUnit\Framework\isNull;

class IworkerController extends Controller
{

    public function details(Client $client)
    {
        $application = $client->application;
        $iworkerRegistration = optional($application)->iWorkerRegistrations;
        if (is_null($iworkerRegistration))
        {
            return back()->with('error', "Details not found");
        }

        $client->loadCount('ratings');
        $client->loadSum('ratings', 'rating');

        $client->load(['application.businessSectors', 'application.iWorkerRegistrations']);


        $registrationTypes = RegistrationType::with('categories')->whereHas('categories')->get();
        $selected_interests = $application->interests()->with(['category', 'registrationType'])->get();


        return view('client.v2.iWorker.details', [
            'application' => $application,
            'model' => $iworkerRegistration,
            'client' => $client,
            'editable' => false,
            'registrationTypes' => $registrationTypes,
            'selected_interests' => $selected_interests,
            'review' => false,
        ]);
    }

}
