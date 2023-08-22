<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\v2\GuzzleController as GuzzleController;
use GuzzleHttp\Client;

use function React\Promise\Stream\first;

class DigitalFinanceController extends Controller

{
    public function __construct()
    {
        $this->client = new Client();
        $this->base_uri = 'https://comparator-api.bnr.rw/api/en/v1/loans?service=';
    }

    private function fetching($query,$type)
    {
        $response = $this->client->get($this->base_uri . $query, ['verify' => false]);
        $data = json_decode($response->getBody()->getContents());
        $all = $data[0]->data;
        Redis::set($type, json_encode($all));
        return response()->json($all);
    }



    public function iworkers(Request $request) {

        $this->fetching('14a4cfcf-6743-41b8-9e4e-50b3d22152b9', 'iworkerLoan');
    }

    public function treasury() {
        $this->fetching('cfec118e-6ec4-41c5-9730-546604078617', 'treasuryLoan');
    }

    public function equipment() {
        $this->fetching('e8511073-9faa-40bf-9962-8e5cdc1d0ea0', 'equipmentLoan');
    }

    public function digital() {
        $this->fetching('1712db2e-544c-49ed-a7b9-476b8229f0c8', 'digitalLoan');
    }

    public function other() {
        $this->fetching('8be80db5-d863-43c0-961e-8f6e6d9f43e4', 'otherLoan');
    }
    public function mortage() {
        $this->fetching('b308b63f-ecc1-4e83-b37e-81a2f6e67276', 'mortageLoan');
    }

}

