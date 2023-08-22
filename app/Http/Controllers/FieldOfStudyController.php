<?php

namespace App\Http\Controllers;

use App\Models\FieldOfStudy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class FieldOfStudyController extends Controller
{
    /**
     *function to display all Field Of Studies in backend
     */
    public function index()
    {
        $studies = FieldOfStudy::query()->orderBy('id', 'DESC')->get();
        return view('admin.field_of_studies.create', compact('studies'));
    }

    /**
     * function to store Field Of Study
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {

        $study = new FieldOfStudy();
        $study->name = $request->name;
        $study->name_kn = $request->name_kn;
        $study->save();
        return redirect()->back()->with('success', 'Field Of Study created successfully');
    }

    /**
     * function to update Field Of Study
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {

        $study = FieldOfStudy::findOrFail($request->input('StudyId'));
        $study->name = $request->name;
        $study->name_kn = $request->name_kn;
        $study->save();

        return redirect()->back()->with('success', 'Field Of Study updated successfully');
    }

    /**
     * function to delete Field Of Study
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {

        $study = FieldOfStudy::find($id);
        $study->delete();

        return redirect()->back()->with('success', 'Field Of Study deleted successfully');
    }
}
