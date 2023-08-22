<?php

namespace App\Http\Controllers;

use App\Models\PackegePromotion;
use Illuminate\Http\Request;


class Promotion extends Controller
{
    function index()
    {
        $promotions = PackegePromotion::all();
        return view('admin.membership.promotions.index', compact('promotions'));
    }


    function savePromotion(Request $request)
    {
        $promotion = new PackegePromotion();


        PackegePromotion::create([
            'promotion' => $request->promotion,
            'organization_description' => 'null',
            // 'cover_picture' => $filename,
            'packege_description' => $request->packege_description,

        ]);

        return redirect()->back();
    }


    function edit(Request $request)
    {

        // $promotion = PackegePromotion::findOrFail($request->input('PromotionId'));


        PackegePromotion::where('id', $request->PromotionId)->update([
            'promotion' => $request->promotion,
            'time_from_date' => $request->time_from_date,
            'time_to_date' => $request->time_to_date,

        ]);


        return redirect()->back();
    }

    function delete($id)
    {
        PackegePromotion::find($id)->delete();
        return redirect()->back();
    }
}
