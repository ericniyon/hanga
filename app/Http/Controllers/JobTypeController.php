<?php

namespace App\Http\Controllers;

use App\Models\JobType;
use Illuminate\Http\Request;

class JobTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.job_types.create');
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

        $jobtype = new JobType();
        $jobtype->name = $request->name;
        $jobtype-> name_kn = $request->name_kn;
        $jobtype->description = $request->description;
        $jobtype->save();
        return redirect()->back()->with('success', 'Job Type created successfully');
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
        $jobtype=JobType::find($id);
//        dd($jobtype);
        $jobtype->name = $request->name;
        $jobtype-> name_kn = $request->name_kn;
        $jobtype->description = $request->description;
        $jobtype->save();
        return redirect()->back()->with('success','Job Type Updated Successfully!!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return string
     */
    public function destroy($id)
    {

        $jobtype=JobType::find($id);
        $jobtype->delete();
        return redirect()->back()->with('success','Job Type Deleted Successfully!!!');
    }
}
