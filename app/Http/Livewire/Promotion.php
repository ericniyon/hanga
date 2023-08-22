<?php

namespace App\Http\Livewire;

use App\Models\PackegePromotion;
use Livewire\Component;

class Promotion extends Component
{

    public $promotion, $total_free = false, $time_to_date, $membership_packeges_id, $time_from_date;

    protected $rules = [
        'total_free' => 'required',
        'time_from_date' => 'required',
        'time_to_date' => 'required',
        'membership_packeges_id' => 'required',
    ];

    public function updateFree()
    {

        $this->total_free = $this->total_free;
        if($this->total_free){
            $this->promotion = 0;
        }else{
            $this->promotion = $this->promotion;
        }
    }

    public function save()
    {
        $this->validate();
        PackegePromotion::create([
            'promotion' => $this->promotion ? $this->promotion : 0,
            'total_free' => $this->total_free,
            'time_to_date' => $this->time_to_date,
            'time_from_date' => $this->time_from_date,
            'membership_packeges_id' => $this->membership_packeges_id,
        ]);
        session()->flash('msg', 'Promotion created successfully');
        return redirect()->back();
    }


    public function render()
    {
        return view('livewire.promotion');
    }
}
