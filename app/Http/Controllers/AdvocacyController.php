<?php

namespace App\Http\Controllers;

use App\Models\Advocacie;
use Illuminate\Http\Request;

class AdvocacyController extends Controller
{
    public function index()
    {

        return view('admin.advocacy.complants');
    }
}
