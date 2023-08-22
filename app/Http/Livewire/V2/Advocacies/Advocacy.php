<?php

namespace App\Http\Livewire\V2\Advocacies;

use Livewire\Component;

class Advocacy extends Component
{
    
    public string $tab = '';


    protected $queryString = ['tab'];

    public function mount()
    {
        $this->tab = request()->query('tab', 'MyAdvocacy');
    }

    public function render()
    {
        return view('livewire.v2.advocacies.advocacy');
    }


    public function activateTab($tab)
    {
        $this->tab = $tab;
    }
}
