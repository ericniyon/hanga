<?php

namespace App\Http\Controllers;

use App\Models\DigitalPlatform;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DigitalPlatformController extends Controller
{
    /**
     *function to display all Digital Platforms in backend
     */
    public function index()
    {
        $platforms = DigitalPlatform::query()->orderBy('id', 'DESC')->get();
        return view('admin.digital_platforms.create', compact('platforms'));
    }

    /**
     * function to store Digital Platform
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {

        $platform = new DigitalPlatform();
        $platform->name = $request->name;
        $platform->name_kn = $request->name_kn;
        $platform->save();
        return redirect()->back()->with('success', 'Digital Platform created successfully');
    }

    /**
     * function to update Digital Platform
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {

        $platform = DigitalPlatform::findOrFail($request->input('PlatformId'));
        $platform->name = $request->name;
        $platform->name_kn = $request->name_kn;
        $platform->save();

        return redirect()->back()->with('success', 'Digital Platform updated successfully');
    }

    /**
     * function to delete Digital Platform
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {

        $platform = DigitalPlatform::find($id);
        $platform->delete();

        return redirect()->back()->with('success', 'Digital Platform deleted successfully');
    }
}
