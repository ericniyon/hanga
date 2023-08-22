<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Impact;

class ImpactsPage extends Component
{
    public $impact_title, $impact_section, $impact_description, $impact_link;
    public $perPage;
    public $searchKey;
    public $impact_id;
    public $bySkills;

    public $updateMode = false;

    public function edit($id)
    {
        $impact = Impact::find($id);

        $this->impact_id = $id;
        $this->impact_title = $impact->impact_title;
        $this->impact_link = $impact->impact_link;
        $this->impact_section = $impact->impact_section;
        $this->impact_description = $impact->impact_description;

        $this->updateMode = true;

    }

    public function update()
    {
        if ($this->updateMode && $this->impact_id) {
            # code...
            $impact = Impact::find($this->impact_id);

            $impact->update([
                'impact_title' => $this->impact_title,
                'impact_link' => $this->impact_link,
                'impact_section' => $this->impact_section,
                'impact_description' => $this->impact_description,
            ]);

            session()->flash('msg', 'Record updated successfully');

            return redirect('admin/impact');
        }
    }

    public function render()
    {
        return view('livewire.admin.impacts-page')
            ->extends('layouts.master')
        ;
    }
}
