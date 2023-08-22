<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\AssociationItem;
use App\Models\BenefitItem;
use App\Models\Client;
use App\Models\ClusterAssociationCategory;
use App\Models\MembershipApplication;
use App\Models\OriantationItem;
use App\Models\Plan;
use App\Models\PlanFeatures;
use App\Models\ServiceBenefit;
use App\Models\StrategicOriantation;
use App\Models\WhatisICTChamber;
use Crypt;
use Illuminate\Http\Request;

class MemberShip extends Controller
{
    public function ictChamber()
    {
        return view('admin.membership.index');

    }
    public function newIctChamber()
    {
        return view('admin.membership.create');

    }
    public function saveIctChamber(Request $request)
    {
        WhatisICTChamber::create([
            'what_is_the_rwanda_ict_chamber' => $request->what_is_the_rwanda_ict_chamber
        ]);
        return redirect()->to('admin/membership');

    }
    public function deleteIctChamber($id)
    {
        $chamber = WhatisICTChamber::find($id);
        $chamber->delete();
        return redirect()->back();

    }
    public function deleteChamber($id)
    {
        $chamber = MembershipApplication::find($id);
        $chamber->delete();
        return redirect()->back();

    }
    public function editIctChamber($id)
    {
        $chamber = WhatisICTChamber::find($id);

        return view('admin.membership.edit', compact('chamber'));


    }
    public function editChamber($id)
    {
        $chamber = MembershipApplication::find($id);

        return view('admin.membership.edit_membership', compact('chamber'));


    }
    public function updateIctChamber(Request $request, $id)
    {
        $chamber = WhatisICTChamber::find($id);
        $chamber->update([
            'what_is_the_rwanda_ict_chamber' => $request->what_is_the_rwanda_ict_chamber
        ]);
        return redirect()->to('admin/membership');


    }


    public function AllMembers()
    {
        $members_list = MembershipApplication::all();
        // $applicant = Client::where('id', $members_list)->get();
        return view('admin.membership.list',compact('members_list'));


    }

    public function showMember($id)
    {
        $decripted_id = Crypt::decryptString($id);
        $membership = MembershipApplication::find($decripted_id);
        $cluster = $membership->clustre_items;
        $strategc = $membership->Strategic_oriantation;
        $benefits = $membership->student_service_benefits;
        $__plans = $membership->membership_levels;


        if($cluster){
            $items_ids = AssociationItem::whereIn('id',$cluster)->pluck('cluster_association_categories_id');
        }else{

            $items_ids = [];
        }
        if(count($items_ids) != 0){

            $clusters = ClusterAssociationCategory::whereIn('id', $items_ids)->get();
        }else{

            $clusters = [];
        }


        $strategic_ids = OriantationItem::whereIn('id', $strategc ? $strategc : [])->pluck('strategic_oriantation_id');
        if ($strategic_ids == null) {
            # code...
            $strategics = [];
        } else {
            $strategics = StrategicOriantation::whereIn('id', $strategic_ids ? $strategic_ids : [])->get();
            # code...
        }

        $benefit_ids = BenefitItem::whereIn('id', $benefits ? $benefits : [])->pluck('service_benefit_id');
        if ($benefit_ids != null) {
            $service_benefits = ServiceBenefit::whereIn('id', $benefit_ids ? $benefit_ids : [])->get();
        } else {
            # code...
            $service_benefits = [];
        }

        $plans_ids = Plan::where('id', $__plans ? $__plans : [] )->get();



        return view('admin.membership.show', compact(
            'membership',
            'clusters',
            'strategics',
            'service_benefits',
            'plans_ids'
            ));
    }



}
