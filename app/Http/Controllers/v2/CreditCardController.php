<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redis;
class CreditCardController extends Controller
{
    public function __construct() {
        $this->client = new Client();
        $this->base_uri = 'https://comparator-api.bnr.rw/api/en/v1/cards-services?service=';
    }

    private function fetching($query, $type) {
        $response = $this->client->get($this->base_uri . $query, ['verify' => false]);
        $data = json_decode($response->getBody()->getContents());
        $all = $data[0]->data;
        Redis::set($type, json_encode($all));
        return response()->json($all);
    }

    public function creditCard () {
        $this->fetching('626f7ac1-d0ce-4d1d-8d26-3cdbe2f03221', 'creditCard');
    }

    public function debitCard() {
        $this->fetching('7df1b8ee-b071-4f85-bae5-f00f304ab8d2', 'debitCard');
    }
}

//https://comparator-api.bnr.rw/api/en/v1/cards-services?service=626f7ac1-d0ce-4d1d-8d26-3cdbe2f03221

// https://comparator-api.bnr.rw/api/en/v1/cards-services?service=62617ac1-d0ce-4d1d-8d26-3cdbe2103221

// https://comparator-api.bnr.rw/api/en/v1/cards-services?service=7d11b8ee-b071-4165-bae5-1001304ab8d2
