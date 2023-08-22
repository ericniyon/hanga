<?php

namespace App\Http\Livewire;

use App\Models\ClusterAssociationCategory;
use App\Models\MembershipPackege;
use Livewire\Component;

class ClusterItems extends Component
{

    public $membership_packeges_id, $title, $description, $items = [[]], $itemsLoop;

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
        
        $cluster = ClusterAssociationCategory::create([
            'membership_packeges_id' => $this->membership_packeges_id,
            'title' => $this->title,
            'description' => $this->description,
        ]);

        // cluster and association associations

        foreach ($this->itemsLoop as $key => $item ){
                $cluster->items()->create([
                    'name' => $item['name'],
                    'cluster_association_categories_id' => $cluster->id
                ]);
        }
        session()->flash('msg', 'cluster created ');
        return redirect('admin/cluster/association');

    }

    public function render()
    {
        return view('livewire.cluster-items');
    }
}
