<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Resources;

class NewResource extends Component
{
    use WithFileUploads;
    public $resource_title, $resource_cover,  $resource_category, $resource_description, $resource_link, $resource_field;
    public $perPage;
    public $searchKey;
    public $bySkills;


    public function store()
    {

        $this->validate([
            'resource_title' => 'required|unique:resources,resource_title',
            'resource_link' => 'nullable',
            'resource_cover' => 'image|max:1024',
            'resource_category' => 'required',
            'resource_field' => 'required',
            'resource_description' => 'required|min:50',
        ]);

        if($this->resource_cover->getClientOriginalName()){
            $extension = $this->resource_cover->getClientOriginalExtension();
            $filename = date('YmdHis').rand(1, 99999).'.'.$extension;
            $this->resource_cover->move(public_path('resources_covers'), $filename);

        }

        else{
            $filename = '';
        }
        Resources::create([
            'resource_title' => $this->resource_title,
            'resource_link' => $this->resource_link,
            'resource_cover' => $filename,
            'resource_category' => $this->resource_category,
            'resource_field' => $this->resource_field,
            'resource_description' => $this->resource_description,
        ]);

        session()->flash('message', 'New record have been inserted successfully');
        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.admin.new-resource')
        ->extends('layouts.master')
        ->section('content')
        ;
    }
}

// summernote
