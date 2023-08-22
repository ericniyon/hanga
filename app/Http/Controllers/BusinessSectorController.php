<?php

namespace App\Http\Controllers;

use App\Models\BusinessSector;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BusinessSectorController extends Controller
{
    /**
     *function to display all Business Sectors in backend
     */
    public function index()
    {
        $sectors = BusinessSector::query()->orderBy('id', 'DESC')->get();
        return view('admin.business_sectors.create', compact('sectors'));
    }

    /**
     * function to store Business sector
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {

        $sector = new BusinessSector();
        $sector->name = $request->name;
        $sector-> name_kn = $request->name_kn;
        $sector->save();
        return redirect()->back()->with('success', 'Business Sector created successfully');
    }

    /**
     * function to update Business Sector
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {

        $sector = BusinessSector::findOrFail($request->input('SectorId'));
        $sector->name = $request->name;
        $sector-> name_kn = $request->name_kn;
        $sector->save();

        return redirect()->back()->with('success', 'Business Sector updated successfully');
    }

    /**
     * function to delete Business Sector
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {

        $sector = BusinessSector::find($id);
        $sector->delete();

        return redirect()->back()->with('success', 'Business Sector deleted successfully');
    }
}
