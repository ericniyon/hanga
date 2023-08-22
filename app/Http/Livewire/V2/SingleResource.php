<?php

namespace App\Http\Livewire\V2;

use Livewire\Component;
use App\Models\Resources;


class SingleResource extends Component
{
    public string $tab = '';

    protected $queryString = ['tab'];

    public $resource;

    public function mount($id)

    {
        $this->resource = Resources::find($id);
        $this->tab = request()->query('tab', 'api');
    }
    public function render()
    {
        return view('livewire.v2.single-resource',$this->resource)
            ->extends('client.v2.layout.app')
            ->section('content');
    }

    public function activateTab($tab)
    {
        $this->tab = $tab;
    }
}
