<?php

namespace App\Http\Controllers;

use App\Models\WhatisICTChamberMembership;
use Illuminate\Http\Request;

class ICTChamberMemberShip extends Controller
{
    public function ictChamber()
    {
        return view('admin.chambermembership.index');
    }
    public function newIctChamber()
    {
        return view('admin.chambermembership.create');
    }
    public function saveIctChamber(Request $request)
    {

        WhatisICTChamberMembership::create([
            'what_is_ict_chamber_membership' => $request->what_is_ict_chamber_membership
        ]);
        return redirect()->to('admin/ict/chamber/membership');
    }
    public function deleteIctChamber($id)
    {
        $chamber = WhatisICTChamberMembership::find($id);
        $chamber->delete();
        return redirect()->back();
    }
    public function editIctChamber($id)
    {
        $chamber = WhatisICTChamberMembership::find($id);

        return view('admin.chambermembership.edit', compact('chamber'));
    }
    public function updateIctChamber(Request $request, $id)
    {
        $chamber = WhatisICTChamberMembership::find($id);
        $chamber->update([
            'what_is_ict_chamber_membership' => $request->what_is_ict_chamber_membership
        ]);
        return redirect()->to('admin/ict/chamber/membership');
    }
}
