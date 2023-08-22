<?php


namespace App\Http\Controllers\Client;


use App\FileManager;
use App\Http\Requests\ValidateMsmeProject;
use App\Http\Requests\ValidateProject;
use App\Http\Requests\ValidateSolution;
use App\Models\Application;
use App\Models\ApplicationCompletedProject;
use App\Models\ApplicationSolution;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Throwable;
use function request;

class SolutionsController
{
    /**
     * @throws Throwable
     */
    public function store(ValidateSolution $request)
    {
        $request->validated();

        DB::beginTransaction();

        $id = $request->input('id');
        $model = $id > 0 ? ApplicationSolution::find($id) : new ApplicationSolution();
        $model->name = $request->input('name');
        $model->type = $request->input('solution_type');
        $model->platform_type = $request->input('platform_type');
        $model->mobile_application_type = $request->input('mobile_application_type');
        $model->description = $request->input('description');
        $model->application_id = $request->input('application_id');
        $model->has_api = $request->input('has_api');
        $model->api_name = $request->input('api_name');
        $model->api_description = $request->input('api_description');
        $model->api_link = $request->input('api_link');
        $model->dsp_name = $request->input('dsp_name');
        $model->email = $request->input('email');
        $model->phone = $request->input('phone');

        if ($request->hasFile('logo')) {
            $dir = FileManager::DSP_PRODUCT_LOGO_PATH;
            if ($model && $logo = $model->logo) {
                Storage::delete($dir . $logo);
            }

            $uuid = "logo_" . $model->id . "_" . Str::slug(Str::uuid(), '_');
            $file = $request->file('logo');
            $extension = $file->extension();
            $path = $file->storeAs($dir, "$uuid" . ".$extension");
            $model->logo = str_replace("$dir", '', $path);
        }


        $model->save();

        $platforms = $request->input('platforms');
        $platformTypes = $request->input('platformTypes');
        $model->platformTypes()->detach($platformTypes);

        foreach ($platformTypes as $key=> $item) {
            $input = $platforms[$key];
            if (!$input) continue;

            $model->solutionPlatforms()->create([
                'link' => $input,
                'platform_type_id' => $item
            ]);

        }


        DB::commit();
        if ($request->ajax())
            return $model;
        return back();
    }

    /**
     * @throws Throwable
     */
    public function saveMsme(ValidateMsmeProject $request)
    {
        $request->validated();
        DB::beginTransaction();

        $id = $request->input('id');
        $model = $id > 0 ? ApplicationSolution::find($id) : new ApplicationSolution();
        $model->name = $request->input('name');
        $model->type = $request->input('solution_type');
        $model->description = $request->input('description');
        $model->application_id = $request->input('application_id');
        $model->save();

        DB::commit();
        if ($request->ajax())
            return $model;
        return back();
    }

    /**
     * @throws Throwable
     */
    public function destroy($solutionId)
    {

        DB::beginTransaction();
        $model = ApplicationSolution::find(decryptId($solutionId));
        $model->platformTypes()->detach();
        $model->delete();
        DB::commit();
        session()->flash('success', 'Project successfully deleted');
        if (request()->ajax()) {
            return response()->json(null, 204);
        }
        return back();
    }

    public function edit($solutionId)
    {
        $solution = ApplicationSolution::find(decryptId($solutionId));

//        return $solution['type'];

        return view('partials._edit_product_solution', [
            'solution' => $solution
        ]);

    }
}
