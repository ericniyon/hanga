<?php

namespace App\Http\Livewire;

use App\Models\ServiceBenefit;
use Livewire\Component;

class BenefitItems extends Component
{
    public $membership_packeges_id;
    public $title, $color, $description, $category, $items = [[]], $itemsLoop;

    public function mount()

    {
        $this->itemsLoop = [[]];
    }

    public function addNewRow()
    {
        $this->itemsLoop[] = [];
    }

    public function removeRow($index)
    {
        unset($this->itemsLoop[$index]);
        $this->itemsLoop = array_values($this->itemsLoop);
    }


    public function save()
    {
        // dd($this->membership_packeges_id);
        $oriantation = ServiceBenefit::create([
            'membership_packeges_id' => $this->membership_packeges_id,
            'title' => $this->title,
            'color' => 'skyblue',
            'category' => $this->category,
            'description' => $this->description,
        ]);

        foreach ($this->itemsLoop as $key => $item) {
            $oriantation->items()->create([
                'name' => $item['name'],
                'service_benefit_id' => $oriantation->id
            ]);
        }
        return redirect('admin/benefit/benefit');
    }
    public function render()
    {
        return view('livewire.benefit-items');
    }
}
