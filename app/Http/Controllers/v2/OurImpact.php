<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OurImpact extends Controller
{
    public function index()
    {
        return view('client.v2.impact');
    }
}
