<?php

namespace App\Http\Livewire\V2\AdvocacyComplains;

use Livewire\Component;
use App\Models\Advocacie;

class ConsumerACTab extends Component
{
    public $Complants;
    public $Issues;
    public $Suggestions;
    public $Recommandations;

    public function render()
    {
        $advocacies = Advocacie::when($this->Complants, function($query){
            return $query->where('category', $this->Complants);
        })
        ->when($this->Issues, function($query1){
            return $query1->where('category', $this->Issues);
        })
        ->when($this->Suggestions, function($query){
            return $query->where('category', $this->Suggestions);
        })
        ->when($this->Recommandations, function($query){
            return $query->where('category', $this->Recommandations);
        })
        ->paginate(10);
        return view('livewire.v2.advocacy-complains.consumer-a-c-tab', ['advocacies' => $advocacies]);
    }
}
