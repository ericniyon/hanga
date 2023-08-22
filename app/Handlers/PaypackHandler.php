<?php

namespace App\Handlers;

use Paypack\Paypack;

class PaypackHandler
{
    protected $paypack;

    public function __construct()
    {
        $this->paypack = new Paypack();
        $this->paypack->config([
            'client_id' => env('PAYPACK_CLIENT_ID'),
            'client_secret' => env('PAYPACK_CLIENT_SECRET'),
            'webhook_mode' => 'production'
        ]);

    }

    public function cashin($phone, $amount)
    {
        return $this->paypack->Cashin([
            'phone' => $phone,
            'amount' => $amount
        ]);
    }

    public function cashout($phone, $amount)
    {

        return $this->paypack->Cashout([
            'phone' => $phone,
            'amount' => $amount
        ]);
    }


    public function event($id)
    {
        return $this->paypack->Event($id);
    }


    public function checkPayment($ref)
    {
        return $this->paypack->Transaction($ref);
    }
}