<?php

namespace App\View\Components;

use App\Models\ClusterAssociationCategory;
use App\Models\MembershipLevel;
use Illuminate\View\Component;

class MembershipComponent extends Component
{
    public $clusters = [];
    public $clusters_output = [];

    public $cluster_items = [];
    public $cluster_items_output = [];

    public $data = [];
    public $output = [];



    public function __construct()
    {
        $this->data = MembershipLevel::take(10)->pluck('id', 'title');
        $this->clusters = ClusterAssociationCategory::all();
        $this->cluster_items = ClusterAssociationCategory::take(10)->pluck('id', 'items');
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.membership-component', [
            'data' => $this->data,
            'clusters' => $this->clusters,
            'cluster_items' => $this->cluster_items,
        ]);
    }
}
