<?php

namespace App\Http\Livewire\V2\ResourcesTabs;

use Livewire\Component;

class NavTab extends Component
{
    public string $tab = '';

    protected $queryString = ['tab'];

    public function mount()
    {
        $this->tab = request()->query('tab', 'api');
    }
    public function render()
    {
        return view('livewire.v2.resources-tabs.nav-tab');
    }
    public function activateTab($tab)
    {
        $this->tab = $tab;
    }
}
