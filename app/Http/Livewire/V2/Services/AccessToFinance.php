<?php

namespace App\Http\Livewire\V2\Services;

use App\Models\AccessToFinance as ModelsAccessToFinance;
use Livewire\Component;
use Livewire\WithFileUploads;

class AccessToFinance extends Component
{
    use WithFileUploads;
    public $image;
    public $access_to_finance_interest_id = [];
    public $description;


    protected $rules = [

        'description' => 'required',
        'image' => 'required',
        'access_to_finance_interest_id' => 'required',
    ];


    public function  save()
    {
        // dd($this->description);

        $this->validate();
        ModelsAccessToFinance::create([
            'description' => $this->description,
            'access_to_finance_interest_id' => $this->access_to_finance_interest_id,
            'image' => $this->image->store('serviceadvocacy'),
        ]);
        session()->flash('msg', 'success');
        return redirect('client/advocacy');
    }
    public function render()
    {
        return view('livewire.v2.services.access-to-finance');
    }
}
