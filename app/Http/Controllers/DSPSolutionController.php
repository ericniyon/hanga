<?php

namespace App\Http\Controllers;

use App\FileManager;
use App\Models\Specialty;
use App\Models\Speciality;
use App\Models\DSPSolution;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\ApplicationSolution;
use Illuminate\Support\Facades\Storage;
use App\DataTables\DSPSolutionDataTable;
use App\Http\Requests\ValidateDSPSolutionForm;
use App\DataTables\ApplicationSolutionDataTable;

class DSPSolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsp_solutions = ApplicationSolution::with(['platformTypes'])->orderBy('created_at', 'desc')->select('application_solutions.*');
        $datatable = new DSPSolutionDataTable($dsp_solutions);
        return $datatable->render('admin.dsp_solutions.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ValidateDSPSolutionForm $request
     * @return RedirectResponse
     */
    public function store(ValidateDSPSolutionForm $request): RedirectResponse
    {
        $input = $request->except(['proengsoft_jsvalidation', '_token', 'logo','platforms','link1','link2','link3','link4','specialties']);
        if ($request->file('logo')) {
            $dir = FileManager::DSP_PRODUCT_LOGO_PATH;
            //            $path = 'webinars' . date('YmdHis') . "." . $logo->getClientOriginalExtension();
            $path = $request->file('logo')->store($dir);
            //            $input['logo'] = "$path";
            $input['logo'] = str_replace("$dir", '', $path);
        }
        $input['type'] = 'Product';
        $solution = ApplicationSolution::create($input);
        // save platform type
        $platforms = $request->input('platforms');
        foreach ($platforms ?? [1] as $item) {
            $input = $request->input("link$item");
            if (!$input) continue;
            $solution->solutionPlatforms()->create([
                'link' => $input,
                'platform_type_id' => $item
            ]);

        }
        $solution->businessSectors()->attach($request->specialties);
        // end
        return redirect()->route('admin.digital-platforms.index')->with('success', 'Digital platform Created Successfully');
    }


    public function update(ValidateDSPSolutionForm $request, $DSPSolution)
    {
        $input = $request->except(['proengsoft_jsvalidation', '_token', 'logo','platforms','link1','link2','link3','link4','specialties']);
        $DSPSolution = ApplicationSolution::find($DSPSolution);

        if ($request->file('logo')) {
            $dir = FileManager::DSP_PRODUCT_LOGO_PATH;
            $path = $request->file('logo')->store($dir);
            $input['logo'] = str_replace("$dir", '', $path);
        }
        $input['type'] = 'Product';
        $DSPSolution->update($input);
                // save platform type
                $platforms = $request->input('platforms');
                if ($platforms) {
                    $DSPSolution->platformTypes()->detach();
                    foreach ($platforms as $item) {
                        $input = $request->input("link$item");
                        if (!$input) continue;
                        $DSPSolution->solutionPlatforms()->create([
                            'link' => $input,
                            'platform_type_id' => $item
                        ]);

                    }
                }

                // end
        $DSPSolution->businessSectors()->sync($request->specialties);
        return redirect()->route('admin.digital-platforms.index')->with('success', 'Digital platform Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\DSPSolution $DSPSolution
     * @return \Illuminate\Http\Response
     */
    // public function destroy(ApplicationSolution $DSPSolution)
    // {
    //     try {
    //         $DSPSolution->delete();
    //         return redirect()->back()->with('success', 'Digital platform deleted successfully');
    //     } catch (\Throwable $th) {
    //         return redirect()->back()->with('error', 'Digital platform cant be deleted!');
    //          logger($th->getMessage());
    //     }
    // }

    public function delete($id)
    {
        try {
            $solution = ApplicationSolution::find($id);
            $solution->solutionPlatforms()->delete();
            if ($solution->logo) {
                $dir = FileManager::DSP_PRODUCT_LOGO_PATH;
                FileManager::deleteFile($dir, $solution->logo);
            }
            $solution->delete();
            return redirect()->back()->with('success', 'Digital platform deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Digital platform cant be deleted!');
            logger($th->getMessage());
        }
    }
    public function disable($id)
    {
        $status ='Disabled';
        try {
            $solution = ApplicationSolution::find($id);
            $status = $solution->solution_enabled == true ? "Disabled" : "Enabled";
            $toggle = $solution->solution_enabled == true ? false : true;
            $solution->update(['solution_enabled'=>$toggle]);
            return redirect()->back()->with('success', 'Digital platform '.$status.' successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Digital platform cant be '.$status.'!');
            logger($th->getMessage());
        }
    }

    public function downloadLogo($webinar)
    {
        $b = ApplicationSolution::query()->find($webinar);
        return Storage::download($b->logo);
    }

    public function show($solution)
    {
        $solution = ApplicationSolution::find($solution);
        return view('admin.dsp_solutions.details', compact('solution'));
    }
    public function platforms($solution)
    {
        $solution = ApplicationSolution::find($solution);
        $platforms = $solution->solutionPlatforms;
        return view('admin.dsp_solutions.platforms', compact('platforms','solution'));
    }

}

