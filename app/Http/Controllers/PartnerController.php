<?php

namespace App\Http\Controllers;

use App\Constants;
use App\Http\Requests\ValidatePartners;
use App\Models\Partner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     *function to display all Partners in backend
     */
    public function index()
    {
        $partners = Partner::query()->orderBy('id', 'DESC')->get();
        return view('admin.partners.create', compact('partners'));
    }

    /**
     * function to store partner
     * @param ValidatePartners $request
     * @return RedirectResponse
     */
    public function store(ValidatePartners $request): RedirectResponse
    {
        $partner = new Partner();
        $partner->name = $request->name;
        if ($request->hasFile('logo')) {
            $logoPath = Constants::PARTNERS_PATH;
            $logo_path = $request->file("logo")->store($logoPath);
            $logo_file = str_replace("$logoPath", "", "$logo_path");
            $partner->logo = $logo_file;
        }
        $partner->description = $request->description;
        $partner->save();
        return redirect()->back()->with('success', 'Partner created successfully');
    }

    /**
     * function to update partner
     * @param ValidatePartners $request
     * @return RedirectResponse
     */
    public function update(ValidatePartners $request): RedirectResponse
    {
        $partner = Partner::findOrFail($request->input('PartnerId'));
        $partner->name = $request->name;
        if ($request->hasFile('logo')) {
            $logoPath = Constants::PARTNERS_PATH;
            $logo_path = $request->file("logo")->store($logoPath);
            $logo_file = str_replace("$logoPath", "", "$logo_path");
            $partner->logo = $logo_file;
        }
        $partner->description = $request->description;
        $partner->save();

        return redirect()->back()->with('success', 'Partner updated successfully');
    }

    /**
     * function to delete partner
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {

        $partner = Partner::find($id);
        $partner->delete();

        return redirect()->back()->with('success', 'Partner deleted successfully');
    }
}
