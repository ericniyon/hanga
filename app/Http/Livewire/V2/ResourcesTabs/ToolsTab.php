<?php

namespace App\Http\Livewire\V2\ResourcesTabs;

use Livewire\Component;
use App\Models\Resources;


class ToolsTab extends Component
{
    public $details = false;


    public function singleResource($id)
    {
        $getResource = Resources::find($id)->get();

        dd($id);
        $this->details = true;

        session()->put('single-resource', $getResource);
        // return view('livewire/v2/single-resource', compact('resource'));
    }
    public function render()
    {
        return view('livewire.v2.resources-tabs.tools-tab');
    }
}
