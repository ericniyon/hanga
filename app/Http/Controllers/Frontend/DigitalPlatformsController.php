<?php


namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;

class DigitalPlatformsController extends Controller
{

    public function index()
    {
        return view('frontend.digital_platforms');
    }

}
