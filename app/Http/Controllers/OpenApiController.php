<?php

namespace App\Http\Controllers;

use App\FileManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\ApplicationSolution;
use App\DataTables\OpenApiDataTable;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ValidateOpenApiForm;
use Throwable;

class OpenApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $open_apis = ApplicationSolution::where('has_api', true)->orderBy('created_at', 'desc')->select('*');
        $datatable = new OpenApiDataTable($open_apis);
        return $datatable->render('admin.open_apis.index');
    }


    public function store(ValidateOpenApiForm $request): RedirectResponse
    {
        $input = $request->except(['proengsoft_jsvalidation', 'owner_logo', '_token']);

        if ($request->file('owner_logo')) {
            $destinationPath = FileManager::DSP_PRODUCT_LOGO_PATH;
            $path = $request->file('owner_logo')->store($destinationPath);
            $input['owner_logo'] = str_replace($destinationPath, '', $path);
        }
        ApplicationSolution::create([
            "logo" => $input['owner_logo'] ?? null,
            "api_name" => $input['api_name'],
            "api_description" => $input['description'],
            "api_link" => $input['link'],
            "dsp_name" => $input['api_owner'],
            "has_api" => true,
        ]);
        return redirect()->route('admin.open-apis.index')->with('success', 'Open API Created Successfully');
    }


    public function show(ApplicationSolution $openApi)
    {
        return view('admin.open_apis.details', compact('openApi'));
    }


    public function update(ValidateOpenApiForm $request, ApplicationSolution $openApi): RedirectResponse
    {
        $input = $request->except(['proengsoft_jsvalidation', 'owner_logo', '_token', '_method']);
        if ($request->file('owner_logo')) {
            $destinationPath = FileManager::DSP_PRODUCT_LOGO_PATH;
            $path = $request->file('owner_logo')->store($destinationPath);
            $input['logo'] = str_replace($destinationPath, '', $path);
        }
        $input['api_description'] = $input['description'];
        unset($input['description']);
        $input['api_link'] = $input['link'];
        unset($input['link']);
        $input['dsp_name'] = $input['api_owner'];
        unset($input['api_owner']);
        $openApi->update($input);
        return redirect()->route('admin.open-apis.index')->with('success', 'Open API Updated Successfully');
    }

    public function downloadlogo($api)
    {
        $b = ApplicationSolution::query()->find($api);
        return Storage::download($b->logo);
    }

    public function delete($api)
    {
        try {
            $api = ApplicationSolution::find(decryptId($api));
            $api->delete();
            return redirect()->back()->with('success', 'API deleted successfully');
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'API cant be deleted!');
            logger($th->getMessage());
        }
    }
    public function disable($api)
    {
        $status ='Disable';
        try {
            $api = ApplicationSolution::find(decryptId($api));
            $toggle = $api->open_api_enabled == true ? false : true;
            $status = $api->open_api_enabled == true ? "Disabled" : "Enabled";
            $api->update(['open_api_enabled'=>$toggle]);
            return redirect()->back()->with('success', 'API '.$status.' successfully');
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'API cant be '.$status.'!');
            logger($th->getMessage());
        }
    }
}
