<?php

namespace App\Http\Controllers;

use App\Models\AvailabilityType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AvailabilityTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $availabilityTypes=AvailabilityType::all();
        return view('admin.availability_types.create',compact('availabilityTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $availabilityType = new AvailabilityType();
        $availabilityType->name = $request->name;
        $availabilityType-> name_kn = $request->name_kn;
        $availabilityType->description = $request->description;
        $availabilityType->save();
        return redirect()->back()->with('success', 'Availability Type created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $availabilityType =AvailabilityType::find($id);
        $availabilityType->name = $request->name;
        $availabilityType-> name_kn = $request->name_kn;
        $availabilityType->description = $request->description;
        $availabilityType->save();
        return redirect()->back()->with('success', 'Availability Type Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $opportunitytype=AvailabilityType::find($id);
        $opportunitytype->delete();
        return redirect()->back()->with('success','Availability Type Deleted Successfully!!!');
    }
}
