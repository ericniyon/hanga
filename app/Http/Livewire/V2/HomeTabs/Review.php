<?php

namespace App\Http\Livewire\V2\HomeTabs;

use Livewire\Component;
use App\Models\Testmonials;

class Review extends Component
{

    public $full_name, $email, $phone, $message, $status;


    public function store()
    {
        $this->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'status' => 'required',
            'message' => 'required'
        ]);

        Testmonials::create([
            'full_name' => $this->full_name,
            'email' => $this->emaail,
            'phone' => $this->phone,
            'status' => 'unpublished',
            'message' => $this->message
        ]);
        session()->flash('message', 'Thank you your review have been sent ');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.v2.home-tabs.review');
    }
}
