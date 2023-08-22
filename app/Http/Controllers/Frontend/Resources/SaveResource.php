<?php

namespace App\Http\Controllers\Frontend\Resources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resources;

class SaveResource extends Controller
{
    public function store(Request $request)
    {

        // $request->validate([
        //     'resource_title' => 'required|unique:resources,resource_title',
        //     'resource_link' => 'nullable',
        //     'resource_cover' => 'image|max:1024',
        //     'resource_category' => 'required',
        //     'resource_field' => 'required',
        //     'resource_description' => 'required|min:50',
        // ]);

        if($request->resource_cover->getClientOriginalName()){
            $extension = $request->resource_cover->getClientOriginalExtension();
            $filename = date('YmdHis').rand(1, 99999).'.'.$extension;
            $request->resource_cover->move(public_path('resources_covers'), $filename);

        }

        else{
            $filename = '';
        }
        Resources::create([
            'resource_title' => $request->resource_title,
            'resource_link' => $request->resource_link,
            'resource_cover' => $filename,
            'resource_category' => $request->resource_category,
            'resource_field' => $request->resource_field,
            'resource_description' => $request->resource_description,
        ]);

        session()->flash('message', 'New record have been inserted successfully');
        return redirect()->back();
    }

    public function show($id)
    {
        $resource = Resources::find($id);

        return view('client/v2/single_resources', compact('resource'));
    }


    public function update(Request $request, $id)
    {


        // $request->validate([
        //     'resource_title' => 'required|unique:resources,resource_title',
        //     'resource_link' => 'nullable',
        //     'resource_cover' => 'image|max:1024',
        //     'resource_category' => 'required',
        //     'resource_field' => 'required',
        //     'resource_description' => 'required|min:50',
        // ]);

        if(isset($request->resource_cover)){
            $extension = $request->resource_cover->getClientOriginalExtension();
            $filename = date('YmdHis').rand(1, 99999).'.'.$extension;
            $request->resource_cover->move(public_path('resources_covers'), $filename);

        }

        else{
            $filename = '';
        }
        // $resource = Resources::find($)
        Resources::where('id', $request->id)->update([
            'resource_title' => $request->resource_title,
            'resource_link' => $request->resource_link,
            'resource_cover' => $filename,
            'resource_category' => $request->resource_category,
            'resource_field' => $request->resource_field,
            'resource_description' => $request->resource_description,
        ]);

        // session()->put('message', 'New record have been inserted successfully');
        return redirect()->back();
    }
}
