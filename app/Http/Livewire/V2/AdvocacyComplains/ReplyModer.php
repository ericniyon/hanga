<?php

namespace App\Http\Livewire\V2\AdvocacyComplains;

use Livewire\Component;
use App\Models\Reply;
use App\Models\Advocacie;

class ReplyModer extends Component
{
    public $replyMessage;
    public $complaint;

    public function store()
    {
        dd('22');
        $advocacy = Advocacie::find( $this->complaint);


        Reply::create([
            'replyer' => auth('client')->user()->id,
            'complaint' => $this->complaint,
            'message' => $this->replyMessage,
        ]);

        // $advocacy->update('status', 'replied');
        $advocacy->update([
            'status' => 'Replyed'
        ]);

        session()->flash('success', 'Thank you for your reply submitted successfully');

        return redirect()->route('client.advocacy.complains');
    }

    public function render()
    {
        return view('livewire.v2.advocacy-complains.reply-moder');
    }
}
