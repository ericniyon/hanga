<?php


namespace App\Http\Controllers\Client;


use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateBranch;
use App\Models\ApplicationBranch;
use App\Models\IworkerCertificate;

class IworkerBranchController extends Controller
{
    public function store(ValidateBranch $request)
    {
        $request->validated();
        $id = $request->input('id');
        $model = $id > 0 ? ApplicationBranch::find($id) : new ApplicationBranch();
        $model->name = $request->input('name');
        $model->province_id = $request->input('province_id');
        $model->district_id = $request->input('district_id');
        $model->sector_id = $request->input('sector_id');
        $model->cell_id = $request->input('cell_id');
        $model->village_id = $request->input('village_id');
        $model->application_id = $request->input('application_id');

        $model->save();

        if ($request->ajax())
            return $model;
        return back();

    }

    public function destroy($id)
    {
        $project = ApplicationBranch::find(decryptId($id));
        $project->delete();
        session()->flash('success', ' Branch successfully deleted');
        if (\request()->ajax()) {
            return response()->json(null, 204);
        }
        return back();
    }

}
