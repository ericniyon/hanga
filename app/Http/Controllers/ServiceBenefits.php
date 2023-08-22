<?php

namespace App\Http\Controllers;

use App\Models\ServiceBenefit;
use Illuminate\Http\Request;

class ServiceBenefits extends Controller
{
    public function index()
    {
        return view('admin.chambermembership.benefit');
    }

    public function create()
    {
        return view('admin.chambermembership.benefit_create');
    }

    public function save(Request $request, ServiceBenefit $benefit)
    {

        // return $request->all();

        // return explode(',', $request->items);

        $benefit = new ServiceBenefit();

        $benefit->title = $request->title;
        $benefit->description = $request->description;
        $benefit->color = $request->color;
        $benefit->category = $request->category;
        $benefit->items =  explode(',', $request->items);;


        $benefit->save();

        return redirect('admin/benefit/benefit');
    }

    public function delete($id){
        $benefit = ServiceBenefit::find($id);
        $benefit->delete();
        return redirect()->back();
    }

    function edit($id)
    {
        $service = ServiceBenefit::find($id);
        return view('admin.chambermembership.edit_service', ['service' => $service]);
    }
}
