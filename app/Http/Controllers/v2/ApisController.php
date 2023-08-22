<?php

namespace App\Http\Controllers\v2;

use App\Client;
use App\Http\Controllers\Controller;
use App\Models\ApplicationSolution;
use App\Models\RegistrationType;
use App\Traits\HasTopRated;
use Illuminate\Database\Eloquent\Builder;

class ApisController extends Controller
{

    public function index()
    {
        return view('client.v2.apis');
    }

    public function details($id)
    {
        $api = ApplicationSolution::find(decryptId($id))
            ->loadCount('ratings')
            ->loadAvg('ratings', 'rating');

        return view('client.v2.api_details', [
            'model' => $api,
            'relatedApis' => $api->relatedApis()
        ]);
    }

}
