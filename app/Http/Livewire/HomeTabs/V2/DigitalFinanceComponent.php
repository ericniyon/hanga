<?php

namespace App\Http\Livewire\HomeTabs\V2;

use Livewire\Component;

class DigitalFinanceComponent extends Component
{

    public $loading = false;
    public function render()
    {
        return view('livewire.home-tabs.v2.digital-finance-component');
    }
}
