<?php

namespace App\Http\Controllers\Discount;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function details($discount_id)
    {
        $discount = Discount::find(decryptId($discount_id));
        // $similardiscount = Discount::query()
        //     ->where('opportunity_type_id', $discount->opportunity_type_id)
        //     ->where('id', '!=', $discount->id)
        //     ->orderBy('created_at', 'desc')
        //     ->get()->take(3);
        return view('frontend.discount_details', compact('discount'));
    }
}
