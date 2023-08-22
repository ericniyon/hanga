<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialities = Specialty::query()->orderBy('id', 'DESC')->get();
        return view('admin.specialities.create', compact('specialities'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $study = new Specialty();
        $study->name = $request->name;
        $study->name_kn = $request->name_kn;
        $study->save();
        return redirect()->back()->with('success', 'Specialty created successfully');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $study = Specialty::findOrFail($request->input('StudyId'));
        $study->name = $request->name;
        $study->name_kn = $request->name_kn;
        $study->save();

        return redirect()->back()->with('success', 'Specialty updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $study = Specialty::find($id);
        $study->delete();

        return redirect()->back()->with('success', 'Specialty deleted successfully');
    }
}
