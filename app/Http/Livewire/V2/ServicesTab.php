<?php

namespace App\Http\Livewire\V2;

use Livewire\Component;

class ServicesTab extends Component
{
    public function render()
    {
        return view('livewire.v2.services-tab')->extends('client.v2.layout.app')
        ->section('content');
    }
}
