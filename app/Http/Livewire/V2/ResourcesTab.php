<?php

namespace App\Http\Livewire\V2;

use Livewire\Component;

class ResourcesTab extends Component
{
    public function render()
    {
        return view('livewire.v2.resources-tab')
            ->extends('client.v2.layout.app')
            ->section('content');
    }
}
