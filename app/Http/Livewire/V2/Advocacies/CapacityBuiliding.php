<?php

namespace App\Http\Livewire\V2\Advocacies;

use Livewire\Component;

class CapacityBuiliding extends Component
{
    public $oriantaion_background_colors = array('#E0E4FD', '#F2F6FE', '#F2FFF8', '#FFF1E2', '#E0E4FD');

    public function render()
    {
        return view('livewire.v2.advocacies.capacity-builiding');
    }
}
