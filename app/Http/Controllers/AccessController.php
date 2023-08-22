<?php

namespace App\Http\Controllers;

use App\Models\AccessToFinanceInterest;
use App\Models\AccessToMarketInterest;
use App\Models\CapacityBuiliding;
use App\Models\CapacityBuilidingItems;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    function index(Request $request)

    {
        $access = new AccessToFinanceInterest();

        $access->name = $request->name;
        $access->save();
        return redirect()->back();
    }
    function market(Request $request)

    {
        $access = new AccessToMarketInterest();

        $access->name = $request->name;
        $access->save();
        return redirect()->back();
    }
    function capbuiliding(Request $request)

    {
        $access = new CapacityBuilidingItems();

        $access->name = $request->name;
        $access->save();
        return redirect()->back();
    }
}
