<?php

namespace App\Http\Controllers;

use App\Models\StrategicOriantation as ModelsStrategicOriantation;
use Illuminate\Http\Request;

class StrategicOriantation extends Controller
{


    public function index()
    {
        return view('admin.chambermembership.strategic');
    }

    public function create()
    {
        return view('admin.chambermembership.strategic_create');
    }

    public function save(Request $request, ModelsStrategicOriantation $oriantation)
    {

        $oriantation = new ModelsStrategicOriantation();

        $oriantation->title = $request->title;
        $oriantation->description = $request->description;
        $oriantation->color = $request->color;
        $oriantation->items =  explode(',', $request->items);;


        $oriantation->save();

        return redirect('admin/strategic/strategic');
    }

    public function edit($id)
    {
        $strategic = ModelsStrategicOriantation::find($id);
        return view('admin.chambermembership.strategic_edit',compact('strategic'));
    }

    public function delete($id)
    {
        $oriantation = ModelsStrategicOriantation::find($id);
        $oriantation->delete();
        return redirect()->back();
    }
}
