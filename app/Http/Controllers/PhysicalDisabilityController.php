<?php

namespace App\Http\Controllers;

use App\Models\FieldOfStudy;
use App\Models\PhysicalDisability;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PhysicalDisabilityController extends Controller
{
    /**
     *function to display all Physical Disabilities in backend
     */
    public function index()
    {
        $disabilities = PhysicalDisability::query()->orderBy('id', 'DESC')->get();
        return view('admin.physical_disabilities.create', compact('disabilities'));
    }

    /**
     * function to store Physical Disability
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {

        $disability = new PhysicalDisability();
        $disability->name = $request->name;
        $disability->name_kn = $request->name_kn;
        $disability->save();
        return redirect()->back()->with('success', 'Physical Disability created successfully');
    }

    /**
     * function to update Physical Disability
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {

        $disability = PhysicalDisability::findOrFail($request->input('DisabilityId'));
        $disability->name = $request->name;
        $disability->name_kn = $request->name_kn;
        $disability->save();

        return redirect()->back()->with('success', 'Physical Disability updated successfully');
    }

    /**
     * function to delete Physical Disability
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {

        $disability = PhysicalDisability::find($id);
        $disability->delete();

        return redirect()->back()->with('success', 'Physical Disability deleted successfully');
    }
}
