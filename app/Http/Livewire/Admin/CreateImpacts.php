<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Impact;


class CreateImpacts extends Component
{
    public $impact_title, $impact_section, $impact_description, $impact_link;
    public $perPage;
    public $searchKey;
    public $bySkills;


    public function store()
    {

        $this->validate([
            'impact_title' => 'required|unique:impacts,impact_title',
            'impact_link' => 'nullable',
            'impact_section' => 'required',
            'impact_description' => 'required|min:50',
        ]);


        Impact::create([
            'impact_title' => $this->impact_title,
            'impact_link' => $this->impact_link,
            'impact_section' => $this->impact_section,
            'impact_description' => $this->impact_description,
        ]);

        session()->flash('message', 'New record have been inserted successfully');
        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.admin.create-impacts')
        ->extends('layouts.master')
        ;
    }
}
