<?php

namespace App\Http\Controllers;

use App\Models\PlanFeatures as Features;
use App\Models\Plan;
use Illuminate\Http\Request;

class MembershipLevels extends Controller
{
    public function index()
    {
        $levels = Features::all();
        return view('admin.chambermembership.m_level', compact('levels'));
    }

    public function create()
    {
        return view('admin.chambermembership.m_level_create');
    }

    public function save(Request $request, Features $levels)
    {
        // return $request->all();

        $plans = $request->plans;

        $levels = new Features();

        $levels->membership_packeges_id = $request->membership_packeges_id;
        $levels->name = $request->name;
        $levels->plan_id = $plans;
        // $levels->plans()->attach($plans);


        $levels->save();

        return redirect('admin/membership_level/membership_level');
    }
    public function savePlan(Request $request, Plan $plans)
    {


        // return $request->all();

        $plans = new Plan();

        $plans->name = $request->name;
        $plans->price = $request->price;


        $plans->save();

        return redirect()->back();
    }


    public function editLevel($id)
    {

        $level = Features::find($id);
        // $level_plans  = MembershipPlan::where
        return view('admin.chambermembership.edite_level', compact('level'));

    }
    public function updateLevel(Request $request,$id)
    {


        $plan = Features::find($id);
        $plan->update([
            'name' => $request->name,
            'plan_id' => $request->plans
        ]);

        return redirect('admin/membership_level/membership_level');

    }
    public function deletePlan($id)
    {



        $plan = Features::find($id)->delete();

        return redirect()->back();

    }
}
