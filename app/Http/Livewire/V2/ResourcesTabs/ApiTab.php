<?php

namespace App\Http\Livewire\V2\ResourcesTabs;

use Livewire\Component;
use App\Models\Resources;



class ApiTab extends Component
{

    public $details = false;
    public $search;
    public $resources;


    public function singleResource($id)
    {
        return redirect()->to("/client/resources/single/$id");
    }




    public function render()
    {
        $this->resources = Resources::where('resource_field', "API's")
                            ->when($this->search, function($query){
                                return $query->where('resource_title', "LIKE", "%{$this->search}%")
                                              ->where('resource_description', 'LIKE', "%{$this->search}%");
                            })
        ->get();


        return view('livewire.v2.resources-tabs.api-tab');
    }
}
