<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\TranningApplication;

class Application extends Component
{
    public function render()
    {
        $applications = TranningApplication::all();
        return view('livewire.frontend.application', compact('applications'))
                ->extends('client.v2.layout.app')
                ->section('content')
        ;
    }
}
