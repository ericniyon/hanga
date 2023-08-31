<?php

namespace App\Http\Controllers\v2;

use App\Client;
use App\Http\Controllers\Controller;
use App\Models\GoogleRatings;
use App\Models\RegistrationType;
use App\Models\StartupCategory;
use App\Models\StartupCompanyProfile;
use App\Models\StartupCompanyTeam;
use App\Models\StartupPublication;
use App\Models\StartupSolution;
use App\Models\StartupSubCategory;

class MsmeController extends Controller
{


    public function details(Client $client)
    {
        $application = $client->application;
        // $MSMERegistration = optional($application)->msmeRegistrations;
        $MSMERegistration = StartupCompanyProfile::where('client_id', $client->id)->first();
        if (is_null($MSMERegistration)) {
            return back()->with('error', "Details not found");
        }


        $client->loadCount('ratings');
        $client->loadSum('ratings', 'rating');

        $client->load(['application.businessSectors', 'application.msmeRegistrations']);

        $google_ratings = GoogleRatings::where('client_id', $client->id)->count();

        $registrationTypes = RegistrationType::with('categories')->whereHas('categories')->get();
        $category = StartupCategory::where('id', $MSMERegistration->category_id)->first();
        $subCategory = StartupSubCategory::where('id', $MSMERegistration->sub_category_id)->first();

        $teamMembers = StartupCompanyTeam::where('client_id', $client->id)->get();
        $publications = StartupPublication::where('client_id', $client->id)->get();
        $solutions  = StartupSolution::where('client_id', '=', $client->id)->latest()->get();


        return view('client.v2.msme.details', [
            'model'             => $MSMERegistration,
            'review'            => false,
            'client'            => $client,
            'editable'          => false,
            'category'          => $category,
            'solutions'         => $solutions,
            'subCategory'       => $subCategory,
            'application'       => $application,
            'teamMembers'       => $teamMembers,
            'publications'      => $publications,
            'google_ratings'    => $google_ratings,
            'businessSectors'   => $category,
            'registrationTypes' => $registrationTypes,
        ]);
    }
}
