<?php

namespace App\Http\Livewire\V2;

use Livewire\Component;

class HomeTabs extends Component
{
    public string $tab = '';

    protected $queryString = ['tab'];

    public function mount()
    {
        $this->tab = request()->query('tab', 'dsp');
    }

    public function render()
    {
        return view('livewire.v2.home-tabs');
    }

    public function activateTab($tab)
    {
        $this->tab = $tab;
    }
}
