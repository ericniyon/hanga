<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MembershipPackege;
use Livewire\WithFileUploads;

class Packege extends Component
{
    use WithFileUploads;

    public $packege_name, $packege_description, $cover_picture;

    public function createPackege(){
        // $picture = ;
        MembershipPackege::create([
            'packege_name' => $this->packege_name,
            'packege_description' => $this->packege_description,
            'organization_description' => 'null',
            'cover_picture' => $this->cover_picture->store('photos')

        ]);
        session()->flash('msg', 'Packege created');
    }
    public function render()
    {
        return view('livewire.packege');
    }
}
