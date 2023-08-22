<?php

namespace App\Http\Livewire\V2\Affiliates;

use App\Models\AffiliateCohort;
use Livewire\Component;
class AddGroup extends Component
{
    public $description,$name,$parent;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required|string|min:3|max:50',
            'parent'=>'nullable|integer|exists:affiliate_cohorts,id',
            'description'=>'nullable|string|min:10|max:255',
        ]);
    }

    public function saveGroup()
    {
        $this->validate([
            'name'=>'required|string|min:3|max:50',
            'parent'=>'nullable|integer|exists:affiliate_cohorts,id',
            'description'=>'nullable|string|min:10|max:255',
        ]);

        // AffiliateCohort::create([
        //     'group_name'=>$this->name,
        //     'description'=>$this->description,
        //     'parent_id'=>$this->parent,
        //     'client_id'=>auth('client')->user()->id
        // ]);
        $this->reset();

        return redirect()->route('client.cohorts.index');
        # code...
    }
    public function render()
    {
        $parents = AffiliateCohort::whereClientId(auth('client')->user()->id)->doesntHave('parent')
                                    ->select('group_name','id')->orderBy('group_name')->get();
        return view('livewire.v2.affiliates.add-group', compact('parents'));
    }
}
