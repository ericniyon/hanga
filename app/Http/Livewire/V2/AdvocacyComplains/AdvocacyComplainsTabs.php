<?php

namespace App\Http\Livewire\V2\AdvocacyComplains;

use Livewire\Component;
use App\Models\Client;

class AdvocacyComplainsTabs extends Component
{
    public string $tab = '';

    protected $queryString = ['tab'];

    public function mount()
    {
        $this->tab = request()->query('tab', 'api');
    }
    public function render()
    {
        $clients = Client::all();
        return view('livewire.v2.advocacy-complains.advocacy-complains-tabs', compact('clients'));
    }
    public function activateTab($tab)
    {
        $this->tab = $tab;
    }
}
