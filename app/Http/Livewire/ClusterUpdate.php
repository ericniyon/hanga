<?php

namespace App\Http\Livewire;

use App\Models\ClusterAssociationCategory;
use App\Models\AssociationItem;
use Livewire\Component;

class ClusterUpdate extends Component
{

    public $cluster;

    public $membership_packeges_id, $title, $description, $items = [[]], $itemsLoop, $currentItems=[];

    public function mount()

    {
        $this->itemsLoop = [[]];

        $this->membership_packeges_id = $this->cluster->membership_packeges_id;
        $this->title = $this->cluster->title;
        $this->description = $this->cluster->description;

        $this->currentItems = $this->cluster->items;
        // dd($this->cluster->items);
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
        AssociationItem::find($id)->delete();
        session()->flash('msg', 'cluster deleted successfully');
        return redirect('admin/cluster/association');

    }


    public function save()
    {

        $cluster = ClusterAssociationCategory::create([
            'membership_packeges_id' => $this->membership_packeges_id,
            'title' => $this->title,
            'description' => $this->description,
        ]);

        // cluster and association associations

        foreach ($this->itemsLoop as $key => $item) {
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
        return view('livewire.cluster-update');
    }


    public function update(){
        $cluster = ClusterAssociationCategory::find($this->cluster->id);
        $cluster->update([
            'membership_packeges_id' => $this->membership_packeges_id,
            'title' => $this->title,
            'description' => $this->description,
        ]);

        // dd(count($this->itemsLoop));
        // cluster and association associations
        if($this->itemsLoop){
            foreach ($this->itemsLoop as $key => $item) {
                // dd(count($item));
                if (count($item) > 0) {
                    # code...
                    $cluster->items()->create([
                        'name' => $item['name'],
                        'cluster_association_categories_id' => $cluster->id
                    ]);
                }

            }
        }

        session()->flash('msg', 'cluster updated successfully');
        return redirect('admin/cluster/association');
    }


}
