<?php

namespace App\Http\Controllers;

use App\Models\StartupCompanyProfile;
use App\Models\StartupCompanyTeam;
use App\Models\StartupSolution;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    function downloadOnePager($id)
    {
        $model  =   StartupCompanyProfile::where('client_id', \auth('client')->id())->first();
        $products  =   StartupSolution::where('client_id', \auth('client')->id())->get();
        $team  =   StartupCompanyTeam::where('client_id', \auth('client')->id())->get();

        $pdf = PDF::loadView('partials.pdf.one-page', compact('model', 'products', 'team'));
        return $pdf->download('invoice.pdf');
    }
}
