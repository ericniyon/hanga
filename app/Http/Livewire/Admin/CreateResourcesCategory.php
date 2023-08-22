<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ResourcesCategory;

class CreateResourcesCategory extends Component
{
    public $title = '';
    public $searchKey;
    public $selected_id;
    public $delete_id;
    public $updateMode = false;

    public function store()
    {
        $this->validate([
            'title' => 'required|unique:resources_categories,title'
        ]);

        ResourcesCategory::create([
            'title' => $this->title
        ]);

        session()->flash('msg', 'Record have inserted successfully');

        return redirect()->back();
    }


    public function edit($id)
    {
            $cate = ResourcesCategory::find($id);
            $this->selected_id = $id;
            $this->title = $cate->title;

            $this->updateMode = true;
    }

    public function update()
    {

        if($this->selected_id){

            $cate = ResourcesCategory::find($this->selected_id);
            $cate->update([
                'title' => $this->title
            ]);
        }

    }


    public function delete($id)
    {
        $cate = ResourcesCategory::find($id);
        $delete_id = $id;

    }



    public function render()
    {
        return view('livewire.admin.create-resources-category')
        ->extends('layouts.master')
        ->section('content')
        ;
    }
}
