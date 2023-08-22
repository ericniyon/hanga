<?php

namespace App\Http\Livewire\V2\AdvocacyComplains\Tabs;

use Livewire\Component;
use App\Models\Advocacie;

class ResponseTracker extends Component
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

    public string $tab = '';

    protected $queryString = ['tab'];



    public function mount()
    {
        $this->tab = request()->query('tab', 'homeTab');
        $this->total_Complants = Advocacie::where('category', 'Complants')->where('addressed_to', auth('client')->user()->id)->where('status', 'ToProducer')->count();
        $this->total_Issues = Advocacie::where('category', 'Issues')->where('addressed_to', auth('client')->user()->id)->where('status', 'ToProducer')->count();
        $this->total_Suggestions = Advocacie::where('category', 'Suggestions')->where('addressed_to', auth('client')->user()->id)->where('status', 'ToProducer')->count();
        $this->total_Recommandations = Advocacie::where('category', 'Recommandations')->where('addressed_to', auth('client')->user()->id)->where('status', 'ToProducer')->count();
    }
    public function render()
    {
        $advocacies = Advocacie::where('addressed_to', auth('client')->user()->id)->where('status', 'ToProducer')->when($this->Complants, function($query){
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
        return view('livewire.v2.advocacy-complains.tabs.response-tracker', ['advocacies' => $advocacies])
            ->extends('frontend.master')
            ->section('content')
        ;
    }
    public function activateTab($tab)
    {
        $this->tab = $tab;
    }
}
