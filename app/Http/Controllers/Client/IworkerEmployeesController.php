<?php


namespace App\Http\Controllers\Client;


use App\FileManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateEmployee;
use App\Models\ApplicationBranch;
use App\Models\IworkerCertificate;
use App\Models\IworkerCompanyEmployee;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class IworkerEmployeesController extends Controller
{
    public function store(ValidateEmployee $request)
    {
        $request->validated();
        $id = $request->input('id');
        $model = $id > 0 ? IworkerCompanyEmployee::find($id) : new IworkerCompanyEmployee();
        $model->name = $request->input('name');
        $model->position = $request->input('position');
        $model->recruitment_date = $request->input('recruitment_date');
        $model->level_of_study_id = $request->input('level_of_study_id');
        $model->field_of_study = $request->input('field_of_study');
        $model->iworker_registration_id = $request->input('iworker_registration_id');

        if ($request->hasFile('supporting_document')) {
            $dir = FileManager::IWORKER_DOCS_PATH;
            if ($model && $rdb_certificate = $model->supporting_document) {
                Storage::delete($dir . $rdb_certificate);
            }

            $uuid = "employee_supporting_document_" . str_slug($model->name) . "_" . Str::slug(Str::uuid(), '_');
            $file = $request->file('supporting_document');
            $extension = $file->extension();
            $path = $file->storeAs($dir, "$uuid" . ".$extension");
            $model->supporting_document = str_replace("$dir", '', $path);
        }

        $model->save();
        if ($request->ajax())
            return $model;
        return back();
    }

    public function downloadDocument($id)
    {
        $model = IworkerCompanyEmployee::find(decryptId($id));
        $path = FileManager::IWORKER_DOCS_PATH . $model->supporting_document;

        if (Storage::exists($path))
            return Storage::download($path);
        return \response('File not found', 404);
    }

    public function destroy($id)
    {
        $model = IworkerCompanyEmployee::find(decryptId($id));
        $path = $model->supporting_document;
        $model->delete();
        if ($path) {
            Storage::delete(FileManager::IWORKER_DOCS_PATH . $path);
        }

        session()->flash('success', ' Employee successfully deleted');
        if (\request()->ajax()) {
            return response()->json(null, 204);
        }
        return back();
    }

}
