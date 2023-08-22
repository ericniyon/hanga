<?php

namespace App\Http\Controllers\MembershiPackegs;

use App\Http\Controllers\Controller;
use App\Models\MembershipPackege;
use App\Models\Plan;
use Illuminate\Http\Request;
use Redirect;

class Packeges extends Controller
{
    function index()
    {
        $packeges = MembershipPackege::all();
        return view('admin.membership.packeges.index', compact('packeges'));
    }

    function delete($id)
    {
        MembershipPackege::find($id)->delete();
        return redirect('admin/membership/packeges');
    }

    function delete_plan($id)
    {
        Plan::find($id)->delete();
        return redirect()->back();
    }

    function create()
    {
        return view('admin.membership.packeges.create');
    }

    function edit_packege(Request $request)
    {

        $packege = MembershipPackege::findOrFail($request->input('PackegeId'));

        $packege->packege_name = $request->packege_name;
        if (isset($request->cover_picture)) {
            $extension = $request->cover_picture->getClientOriginalExtension();
            $filename = date('YmdHis') . rand(1, 99999) . '.' . $extension;
            $request->cover_picture->move(public_path('photos'), $filename);
        } else {
            $filename = '';
        }


        MembershipPackege::where('id', $request->PackegeId)->update([
            'packege_name' => $request->packege_name,
            'cover_picture' => $filename,
            'packege_description' => $request->packege_description,

        ]);


        return redirect()->back();
    }

    function plan()
    {
        $plas = Plan::orderBy('price','DESC')->get();
        return view('admin.membership.packeges.create_plan',['plans' => $plas]);
    }

    function savePackege(Request $request)
    {
        $packege = new MembershipPackege();

        $packege->packege_name = $request->packege_name;
        if (isset($request->cover_picture)) {
            $extension = $request->cover_picture->getClientOriginalExtension();
            $filename = date('YmdHis') . rand(1, 99999) . '.' . $extension;
            $request->cover_picture->move(public_path('photos'), $filename);
        } else {
            $filename = '';
        }


        MembershipPackege::create([
            'packege_name' => $request->packege_name,
            'organization_description' => 'null',
            'cover_picture' => $filename,
            'packege_description' => $request->packege_description,

        ]);

        return redirect()->back();
    }

    function edit_plan(Request $request)
    {
        $plan = Plan::findOrFail($request->input('planId'));

        Plan::where('id', $request->planId)->update([
            'name' => $request->name,
            'price' => $request->price,

        ]);


        return redirect()->back();
    }
}
