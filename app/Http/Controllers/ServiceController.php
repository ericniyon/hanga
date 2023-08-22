<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{


    /**
     *function to display all services in backend
     */
    public function index()
    {
        $services = Service::query()->orderBy('id', 'DESC')->get();
        return view('admin.services.create', compact('services'));
    }

    /**
     * function to store service
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {

        $service = new Service();
        $service->name = $request->name;
        $service-> name_kn = $request->name_kn;
//        dd($request->all());
        $service->save();
        return redirect()->back()->with('success', 'Service created successfully');
    }

    /**
     * function to update service
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {

        $service = Service::findOrFail($request->input('ServiceId'));
        $service-> name_kn = $request->name_kn;
        $service-> name = $request->name;
//        dd($request->all());
        $service->save();

        return redirect()->back()->with('success', 'Service updated successfully');
    }

    /**
     * function to delete service
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {

        $service = Service::find($id);
        $service->delete();

        return redirect()->back()->with('success', 'Service deleted successfully');
    }
}
