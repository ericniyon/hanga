<?php

namespace App\Http\Controllers;

use App\Models\CreditSource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CreditSourceController extends Controller
{
    /**
     *function to display all Credit Sources in backend
     */
    public function index()
    {
        $sources = CreditSource::query()->orderBy('id', 'DESC')->get();
        return view('admin.credit_sources.create', compact('sources'));
    }

    /**
     * function to store Credit Sources
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {

        $source = new CreditSource();
        $source->name = $request->name;
        $source->name_kn = $request->name_kn;
        $source->save();
        return redirect()->back()->with('success', 'Credit Sources created successfully');
    }

    /**
     * function to update Credit Source
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {

        $source = CreditSource::findOrFail($request->input('SourceId'));
        $source->name = $request->name;
        $source->name_kn = $request->name_kn;
        $source->save();

        return redirect()->back()->with('success', 'Credit Sources updated successfully');
    }

    /**
     * function to delete Credit Source
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {

        $source = CreditSource::find($id);
        $source->delete();

        return redirect()->back()->with('success', 'Credit Sources deleted successfully');
    }
}
