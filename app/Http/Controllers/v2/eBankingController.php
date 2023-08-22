<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redis;
class eBankingController extends Controller
{
    public function __construct() {
        $this->client = new Client();
        $this->base_uri = 'https://comparator-api.bnr.rw/api/en/v1/ebanking-services?service=1addb3e7-bc7a-4f34-8a63-61c23b76b19b';
    }

    private function fetching($type) {
        $response = $this->client->get($this->base_uri, ['verify' => false]);
        $data = json_decode($response->getBody()->getContents());

        $all = $data[0]->data;
        Redis::set($type, json_encode($all));
    }

    public function eBanking () {
        $this->fetching('ebanking');
    }


}
