<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MembershipLevel;
use App\Models\ClusterAssociationCategory;
use App\Models\MembershipApplication;

class chamberMembership extends Controller
{

    public  $clusters = [];
    public  $clusters_output = [];

    public  $cluster_items = [];
    public  $cluster_items_output = [];

    public  $data = [];
    public  $output = [];

    public function __construct()
    {
        $this->data = MembershipLevel::take(10)->pluck('id', 'title');
        $this->clusters = ClusterAssociationCategory::all();
        $this->cluster_items = ClusterAssociationCategory::take(10)->pluck('id', 'items');
    }


    public function saveChamberMembership(Request $request)
    {

        dd($request->all());
        MembershipApplication::create([
            $request->all()
        ]);
        return redirect()->back();
    }

    public function chamberMembership()
    {
        return view('client.v2.membership.membership',[
            'data' => $this->data,
            'clusters' => $this->clusters,
            'cluster_items' => $this->cluster_items,
        ]);
    }
}
