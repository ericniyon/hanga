<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use App\Models\JobOpportunity;

class OpportunitiesController extends Controller
{

    public function details($id)
    {
        $opportunity = JobOpportunity::with(['opportunityType','client','availabilityTypes'])
            ->findOrFail(decryptId($id));
        return view('client.v2.opportunity_details', [
            'opportunity' => $opportunity
        ]);
    }



}
