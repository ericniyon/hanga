<?php

namespace App\Http\Livewire\V2\AdvocacyComplains;

use Livewire\Component;

class ACTabs extends Component
{
    public string $tab = '';

    protected $queryString = ['tab'];

    public function mount()
    {
        $this->tab = request()->query('tab', 'homeTab');
    }
    public function render()
    {
        return view('livewire.v2.advocacy-complains.a-c-tabs');
    }
    public function activateTab($tab)
    {
        $this->tab = $tab;
    }
}
