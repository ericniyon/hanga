<?php

namespace App\Http\Controllers\v2;

use App\Client;
use App\Http\Controllers\Controller;
use App\Models\ApplicationSolution;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DigitalPlatformsController extends Controller
{
    public function details($id)
    {
        $model = ApplicationSolution::findOrFail(decryptId($id))
            ->load('myRating')
            ->loadCount('ratings')
            ->loadAvg('ratings', 'rating');

        $relatedDigitalPlatforms = $model->relatedDigitalPlatforms();
        return view('client.v2.digital_platform_details', [
            'model' => $model,
            'relatedDigitalPlatforms' => $relatedDigitalPlatforms,
        ]);
    }

    public function storeRate(Request $request, $id): RedirectResponse
    {
        $model = ApplicationSolution::findOrFail(decryptId($id));

        $model->rate($request->input('rating'), $request->input('comment'));

        return back()->with("success", "Successfully added rating information !");
    }

}
