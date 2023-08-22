<?php

namespace App\Http\Livewire;

use App\Models\OriantationItem;
use App\Models\StrategicOriantation as ModelsStrategicOriantation;
use Livewire\Component;

class StrategicUpdate extends Component
{

    public $membership_packeges_id;
    public $strategic;
    public $title, $color, $description, $items = [[]], $itemsLoop, $currentItems = [];

    public function mount()

    {
        $this->itemsLoop = [[]];
        $this->title = $this->strategic->title;
        $this->description = $this->strategic->description;
        $this->membership_packeges_id = $this->strategic->membership_packeges_id;
        $this->currentItems = $this->strategic->items;
    }


    public function removeItem($id)
    {
        OriantationItem::find($id)->delete();
        session()->flash('msg', 'item deleted successfully');
        return redirect('admin/strategic/strategic');
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
        $oriantation = ModelsStrategicOriantation::create([
            'membership_packeges_id' => $this->membership_packeges_id,

            'title' => $this->title,
            'color' => $this->color,
            'description' => $this->description,
        ]);

        foreach ($this->itemsLoop as $key => $item) {
            $oriantation->items()->create([
                'name' => $item['name'],
                'strategic_oriantation_id' => $oriantation->id
            ]);
        }
        return redirect('admin/strategic/strategic');
    }
    public function render()
    {
        return view('livewire.strategic-update');
    }


    public function update()
    {
        $oriantation = ModelsStrategicOriantation::find($this->strategic->id);
        $oriantation->update([
            'membership_packeges_id' => $this->membership_packeges_id,
            'title' => $this->title,
            'description' => $this->description,
        ]);

        // cluster and association associations
        foreach ($this->itemsLoop as $key => $item) {
            if (count($item) > 0) {
                # code...
                $oriantation->items()->create([

                    'name' => $item['name'],
                    'cluster_association_categories_id' => $oriantation->id
                ]);
            }
        }

        session()->flash('msg', 'cluster updated successfully');
        return redirect('admin/strategic/strategic');
    }
}
