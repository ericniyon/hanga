<?php

namespace App\Http\Livewire\V2\AdvocacyComplains\Tabs;

use Livewire\Component;
use App\Models\Advocacie;
use App\Models\Reply;

class Home extends Component
{
    public $Complants;
    public $Issues;
    public $Suggestions;
    public $Recommandations;

    public $total_Complants;
    public $total_Issues;
    public $total_Suggestions;
    public $total_Recommandations;

    public $replyModel = false;
    public $replyMessage;
    public $complaint;

    public function mount()
    {
        $this->total_Complants = Advocacie::where('category', 'Complants')->where('addressed_to', auth('client')->user()->id)->where('status', 'ToProducer')->count();
        $this->total_Issues = Advocacie::where('category', 'Issues')->where('addressed_to', auth('client')->user()->id)->where('status', 'ToProducer')->count();
        $this->total_Suggestions = Advocacie::where('category', 'Suggestions')->where('addressed_to', auth('client')->user()->id)->where('status', 'ToProducer')->count();
        $this->total_Recommandations = Advocacie::where('category', 'Recommandations')->where('addressed_to', auth('client')->user()->id)->where('status', 'ToProducer')->count();
    }




    public function render()
    {

        $advocacies = Advocacie::where('addressed_to', auth('client')->user()->id)->whereIn('status', ['ToProducer','Replyed'])->when($this->Complants, function($query){
            return $query->where('category', $this->Complants);
        })
        ->when($this->Issues, function($query1){
            return $query1->where('category', $this->Issues);
        })
        ->when($this->Suggestions, function($query2){
            return $query2->where('category', $this->Suggestions);
        })
        ->when($this->Recommandations, function($query3){
            return $query3->where('category', $this->Recommandations);
        })

        ->paginate(10);

        return view('livewire.v2.advocacy-complains.tabs.home', ['advocacies' => $advocacies]);
    }

    public function onReply($id)
    {
        if ($id) {
            $this->replyModel = true;
            # code...
            session()->put('replyModel', $this->replyModel);
            session()->put('complaint_id', $id);
        }else{
            $this->replyModel = false;

        }
    }

    public function storeReply($complaint)
    {
        // dd(auth('client')->user()->id);
        Reply::create([
            'replyer' => auth('client')->user()->id,
            'complaint' => $complaint,
            'message' => $this->replyMessage,
        ]);

        $advocacy = Advocacie::find($complaint);
        $advocacy->update([
            'status' => 'Replyed'
        ]);



        session()->flash('success', 'Thank you for your reply submitted successfully');

        return redirect()->route('client.advocacy.complains');
    }

    
}
