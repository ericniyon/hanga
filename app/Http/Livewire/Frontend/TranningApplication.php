<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\TranningApplication as TrApplication;
use App\Models\ApplicantInfo;

class TranningApplication extends Component
{
    public $title, $requirements;
    public $status = 'true';

    public function changeStatus($application)
    {
        $app = TrApplication::find($application);
            $app->update(['status' => $this->status]);

        if ($app->status == $this->status) {

            $app->update(['status' => 'true']);
        } else {
            $app->update(['status' => $this->status]);

        }
        session()->flash('message', 'Farm status changed successfully!');
    }


    public function store()
    {
        $this->validate([
            'title' => 'required',
            'requirements' => 'required',
        ]);
        TrApplication::create([
            'title' => $this->title,
            'requirements' => $this->requirements,
        ]);
    }

    public function render()
    {
        $applications = TrApplication::all();
        $traingin_applications = ApplicantInfo::all();
        return view('livewire.frontend.tranning-application', compact('applications', 'traingin_applications'))
                ->extends("layouts.master")
                ->section("content")

        ;
    }
}
