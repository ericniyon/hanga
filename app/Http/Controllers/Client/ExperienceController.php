<?php


namespace App\Http\Controllers\Client;


use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateExperience;
use App\Models\ApplicationBranch;
use App\Models\IworkerExperience;

class ExperienceController extends Controller
{
    public function store(ValidateExperience $request)
    {
        $request->validated();

        $id = $request->input('id');
        $model = $id > 0 ? IworkerExperience::find($id) : new IworkerExperience();
        $model->iworker_registration_id = $request->input('iworker_registration_id');
        $model->service_offered = $request->input('service_offered');
        $model->description = $request->input('description');
        $model->year_of_completion = $request->input('year_of_completion');
        $model->client = $request->input('client');

        $model->save();
        if ($request->ajax())
            return $model;
        return back();
    }

    public function destroy($id)
    {
        $project = IworkerExperience::find(decryptId($id));
        $project->delete();
        session()->flash('success', 'Experience successfully deleted');
        if (\request()->ajax()) {
            return response()->json(null, 204);
        }
        return back();
    }

}
