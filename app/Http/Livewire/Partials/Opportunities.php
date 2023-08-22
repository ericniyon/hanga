<?php

namespace App\Http\Livewire\Partials;

use Livewire\Component;

class Opportunities extends Component
{
    public string $tab = '';


    protected $queryString = ['tab'];

    public function mount()
    {
        $this->tab = request()->query('tab', 'OpportunitiesEvents');
    }
    public function render()
    {
        return view('livewire.partials.opportunities');
    }
}
