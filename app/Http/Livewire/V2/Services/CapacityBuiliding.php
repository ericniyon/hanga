<?php

namespace App\Http\Livewire\V2\Services;

use App\Models\CapacityBuiliding as ModelsCapacityBuiliding;
use Livewire\Component;
use Livewire\WithFileUploads;

class CapacityBuiliding extends Component
{

    use WithFileUploads;
    public $image;
    public $capacity_builiding_items = [];
    public $description;


    protected $rules = [

        'description' => 'required',
        'image' => 'required',
        'capacity_builiding_items' => 'required',
    ];


    public function  save()
    {
        // dd($this->description);

        $this->validate();
        ModelsCapacityBuiliding::create([
            'description' => $this->description,
            'capacity_builiding_items' => $this->capacity_builiding_items,
            'image' => $this->image->store('serviceadvocacy'),
        ]);
        session()->flash('msg', 'success');
        return redirect('client/advocacy');
    }
    public function render()
    {
        return view('livewire.v2.services.capacity-builiding');
    }
}
