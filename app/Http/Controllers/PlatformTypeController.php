<?php

namespace App\Http\Controllers;

use App\Models\PlatformType;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PlatformTypeController extends Controller
{
    /**
     *function to display all Platform Types in backend
     */
    public function index()
    {
        $platforms = PlatformType::query()->orderBy('id', 'DESC')->get();
        return view('admin.platform_types.create', compact('platforms'));
    }

    /**
     * function to store Platform Type
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {

        $platform = new PlatformType();
        $platform->name = $request->name;
        $platform-> name_kn = $request->name_kn;
        $platform->save();
        return redirect()->back()->with('success', 'Platform Type created successfully');
    }

    /**
     * function to update Platform Type
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {

        $platform = PlatformType::findOrFail($request->input('PlatformId'));
        $platform->name = $request->name;
        $platform-> name_kn = $request->name_kn;
        $platform->save();

        return redirect()->back()->with('success', 'Platform Type updated successfully');
    }

    /**
     * function to delete Platform Type
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {

        $platform = PlatformType::find($id);
        $platform->delete();

        return redirect()->back()->with('success', 'Platform Type deleted successfully');
    }
}
