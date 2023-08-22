<?php

namespace App\Http\Livewire\V2\Services;

use App\Models\ServiceAdvocacy;
use Livewire\WithFileUploads;
use Livewire\Component;

class Advocacy extends Component
{
    use WithFileUploads;
    public $attachment;
    public $copy;
    public $tags;
    public $existance;
    public $category;
    public $description;


    protected $rules = [
            'category' => 'required',
            'tags' => 'required',
            'copy' => 'required',
            'description' => 'required',
            'attachment' => 'required',
    ];


    public function  save()
    {

        $this->validate();
        ServiceAdvocacy::create([
            'category' => $this->category,
            'tags' => $this->tags,
            'copy' => $this->copy,
            'description' => $this->description,
            'existance' => '12 months',
            'attachment' => $this->attachment->store('serviceadvocacy'),
        ]);
        session()->flash('msg', 'success');
        return redirect('client/advocacy');
    }


    public function render()
    {
        return view('livewire.v2.services.advocacy');
    }
}
