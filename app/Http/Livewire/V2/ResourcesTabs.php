<?php

namespace App\Http\Livewire\V2;

use Livewire\Component;
use App\Models\ResourcesCategory;
class ResourcesTabs extends Component
{
    public string $tab = '';
    public $selectedResourcesCategory;

    protected $queryString = ['tab'];

    public function mount()
    {
        $this->tab = request()->query('tab', 'ICT_Laws');
    }

    public function render()
    {
        $categories = ResourcesCategory::all();

        return view('livewire.v2.resources-tabs', compact('categories'));
    }

    public function activateTab($tab)
    {
        $this->tab = $tab;
    }
}
