<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction;

class Pay extends Component
{

    public $packege;
    public $plan_price;
    public $order_nr;
    public $clusters = [];
    public $clusters_output = [];

    public $cluster_items = [];
    public $cluster_items_output = [];

    public $data = [];
    public $output = [];
    public $bg = '#FFF';
    public $MemberPlan = '';

    public $universities = [];

    public $phoneNumnmber;


    protected $rules = [
        'phoneNumnmber' => 'required|min:10',
    ];



  public function doPayment()
    {
        $this->validate();

        $this->waiting = true;
        $handler = new \App\Handlers\PaypackHandler();
        $response = $handler->cashin($this->phoneNumnmber,100);
        $this->transaction_id = $response['ref'];
        Transaction::create([
            'user_id' => auth('client')->user()->id,
            'ref' => $response['ref'],
            'transaction_id' => $response['ref'],
            'status' => $response['status'],
        ]);

        return $response;
    }



    public function render()
    {
        $this->order_nr = '#'.str_pad($this->packege->id + 1, 8, "0", STR_PAD_LEFT);
        return view('livewire.pay');
    }
}
