<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use GuzzleHttp\Client;
class AccountFinanceController extends Controller
{
    public function __construct() {
        $this->client = new Client();
        $this->base_uri = 'https://comparator-api.bnr.rw/api/en/v1/accounts-services?service=';
    }

    private function fetching($query, $type) {
        $response = $this->client->get($this->base_uri . $query, ['verify' => false]);
        $data = json_decode($response->getBody()->getContents());
        $all = $data[0]->data;
        Redis::set($type, json_encode($all));

    }

    public function currentAccount () {
        $this->fetching('d0efa99a-bd2f-49b5-bdac-79377573d41f', 'currentAccount');
    }

    public function fixedAccount () {
        $this->fetching('cebe1dbd-7389-4001-ae6f-94021b14ec8b', 'fixedTermAccount');
    }

    public function savingsAccount () {
        $this->fetching('1ade3fed-df73-4f41-b465-7c145acb6882', 'savingsAccount');
    }
}
