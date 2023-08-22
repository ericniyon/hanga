<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SecondPaymentModal extends Component
{
    public $Terms = false;



    public function AcceptTerms(){
        $this->Terms = true;
        session()->put('terms', $this->Terms);
        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.second-payment-modal');
    }
}
