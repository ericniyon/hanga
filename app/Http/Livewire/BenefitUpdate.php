<?php

namespace App\Http\Livewire;

use App\Models\ServiceBenefit;
use Livewire\Component;

class BenefitUpdate extends Component
{

    public $membership_packeges_id;
    public $service;
    public $title, $color, $description, $category, $items = [[]], $itemsLoop, $currentItems;
    public function mount()

    {
        $this->itemsLoop = [[]];


        $this->membership_packeges_id = $this->service->membership_packeges_id;
        $this->title = $this->service->title;
        $this->description = $this->service->description;
        $this->category = $this->service->category;

        $this->currentItems = $this->service->items;
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


    public function removeItem($id)
    {
        ServiceBenefit::find($id)->delete();
        session()->flash('msg', 'cluster deleted successfully');
        return redirect('admin/cluster/association');
    }


    public function render()
    {
        return view('livewire.benefit-update');
    }


    public function update()
    {
        $service = ServiceBenefit::find($this->service->id);
        $service->update([
            'membership_packeges_id' => $this->membership_packeges_id,
            'title' => $this->title,
            'color' => 'skyblue',
            'category' => $this->category,
            'description' => $this->description,
        ]);

        // service and association associations
        foreach ($this->itemsLoop as $key => $item) {
            if (count($item) > 0) {
                # code...
                $service->items()->create([
                    'name' => $item['name'],
                    'service_benefit_id' => $service->id
                ]);
            }

        }

        session()->flash('msg', 'cluster updated successfully');
        return redirect('admin/cluster/association');
    }

}
