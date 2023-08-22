<?php

namespace App\Http\Livewire\V2\Services;

use Livewire\Component;
use App\Models\ServiceAdvocacy;
use Livewire\WithFileUploads;

class Services extends Component
{
    public string $tab = '';


    protected $queryString = ['tab'];


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
        return redirect()->back();
    }



    public function mount()
    {
        $this->tab = request()->query('tab', 'MyAdvocacy');
    }
    public function render()
    {
        return view('livewire.v2.services.services');
    }
}
