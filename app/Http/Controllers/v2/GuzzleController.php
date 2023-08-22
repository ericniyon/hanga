<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class GuzzleController extends Controller
{
    public function __construct() {
        $this->client = new Client();
    }
}
