<?php

namespace App\Http\Livewire\V2\AdvocacyComplains;

use Livewire\Component;

class AdvocacyComplains extends Component
{


    public function render()
    {

        return view('livewire.v2.advocacy-complains.advocacy-complains')
                ->extends('frontend.master')
                ->section('content');
    }


}
