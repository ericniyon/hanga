<?php

namespace App\Http\Controllers;

use App\Models\AssociationItem;
use App\Models\ClusterAssociationCategory;
use Illuminate\Http\Request;

class ClusterMembership extends Controller
{
    public function index()
    {
        return view('admin.chambermembership.cluster');
    }

    public function create()
    {
        return view('admin.chambermembership.cluster_create');
    }

    public function save(Request $request)
    {

        // return $request->items;

        $cluster = ClusterAssociationCategory::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

            $cluster->items()->create([
                'name' => $request->items,
                'cluster_association_categories_id' => $cluster->id
            ]);




        return redirect('admin/cluster/association');
    }

    public function delete($id)

    {
        $cluster = ClusterAssociationCategory::find($id);
        $cluster->delete();
        return redirect()->back();
    }

    function edit($id)
    {
        $cluster = ClusterAssociationCategory::find($id);
        return view('admin.chambermembership.edit_cluster', ['cluster' => $cluster]);

    }
}
