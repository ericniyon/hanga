<?php

namespace App\Http\Livewire\V2;

use Livewire\Component;

class HomeImpactTabs extends Component
{
    public string $tab = '';

    protected $queryString = ['tab'];

    public function mount()
    {
        $this->tab = request()->query('tab', 'dsp');
    }

    public function render()
    {
        return view('livewire.v2.home-impact-tabs');
    }

    public function activateImpactTab($tab)
    {
        $this->tab = $tab;
    }
}
