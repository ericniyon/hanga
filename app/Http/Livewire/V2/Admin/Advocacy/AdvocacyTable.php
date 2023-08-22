<?php

namespace App\Http\Livewire\V2\Admin\Advocacy;

use Illuminate\Support\Facades\Mail;

use Livewire\Component;
use App\Models\Advocacie;

class AdvocacyTable extends Component
{


    public $updateStatus;
    public $advocacy;
    public $complaint_id;
    public $detailsMode = '';




    public function detailed($id)
    {
        $advocacy = Advocacie::find($id);
        session()->put('advocat', $advocacy);
        $this->detailsMode = 'modal';

        // dd($advocacy);


    }


    public function byStatus($id)
    {
        $complaint = Advocacie::find($id);
        // dd($complaint->status);


        if ($complaint->status = 'Pending') {
            # code...
            $complaint->update([
                'status' => 'ToProducer'
            ]);
        }else{
            $complaint->update([
                'status' => 'PublishedToWeb'
            ]);

        }
        Mail::to($complaint->email)->send(new \App\Mail\advocacy\sendToProducer($complaint->category));

        session()->flash('success', 'Information has been updated ');
        return redirect()->route('admin.list.complaints');
    }

    public function render()
    {
        return view('livewire.v2.admin.advocacy.advocacy-table');
    }
}
