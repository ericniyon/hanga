<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Resources;
use Livewire\WithFileUploads;



class CreateResources extends Component
{
    use WithFileUploads;

    public $resource_title, $resource_section, $resource_description, $resource_link;
    public $perPage;
    public $searchKey;
    public $resource_id;
    public $bySkills;

    public $updateMode = false;

    public function edit($id)
    {
        $resource = Resources::find($id);

        $this->resource_id = $id;
        $this->resource_title = $resource->resource_title;
        $this->resource_link = $resource->resource_link;
        $this->resource_cover = $resource->resource_cover;
        $this->resource_section = $resource->resource_section;
        $this->resource_description = $resource->resource_description;

        $this->updateMode = true;

    }

    public function update()
    {



        if ($this->updateMode && $this->resource_id) {
            if(!empty($this->resource_cover)){
                // $extension = $this->resource_cover->getClientOriginalExtension();
                // $filename = date('YmdHis').rand(1, 99999).'.'.$extension;
                $this->resource_cover->move(public_path('resources_covers'), $this->resource_cover);

            }

            else{
                $filename = '';
            }
            # code...
            $resource = Resources::find($this->resource_id);

            $resource->update([
                'resource_title' => $this->resource_title,
                'resource_link' => $this->resource_link,
                'resource_cover' => $filename,

                'resource_section' => $this->resource_section,
                'resource_description' => $this->resource_description,
            ]);

            session()->flash('message', 'Record updated successfully');

            return redirect()->back();
        }
    }


    public function render()
    {
        return view('livewire.admin.create-resources')
        ->extends('layouts.master')
        ->section('content')
        ;
    }
}
