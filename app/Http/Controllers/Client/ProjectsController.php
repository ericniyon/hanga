<?php


namespace App\Http\Controllers\Client;


use App\Http\Requests\ValidateProject;
use App\Models\ApplicationCompletedProject;
use Illuminate\Http\Request;

class ProjectsController extends \App\Http\Controllers\Controller
{
    public function store(ValidateProject $request)
    {
        $request->validated();

        $id = $request->input('id');
        $model = $id > 0 ? ApplicationCompletedProject::find($id) : new ApplicationCompletedProject();
        $model->name = $request->input('name');
        $model->client_name = $request->input('client_name');
        $model->start_date = $request->input('start_date');
        $model->end_date = $request->input('end_date');
        $model->description = $request->input('description');
        $model->application_id = $request->input('application_id');

        $model->save();

        if ($request->ajax())
            return $model;
        return back();
    }

    public function destroy($projectId)
    {
        $project = ApplicationCompletedProject::find(decryptId($projectId));
        $project->delete();
        session()->flash('success', 'Project successfully deleted');
        if (\request()->ajax()) {
            return response()->json(null, 204);
        }
        return back();
    }
}
