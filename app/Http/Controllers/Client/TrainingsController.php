<?php


namespace App\Http\Controllers\Client;


use App\FileManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateTraining;
use App\Models\ApplicationCompletedProject;
use App\Models\IworkerCertificate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TrainingsController extends Controller
{
    public function store(ValidateTraining $request)
    {
        $request->validated();

        $id = $request->input('id');
        $model = $id > 0 ? IworkerCertificate::find($id) : new IworkerCertificate();
        $model->iworker_registration_id = $request->input('iworker_registration_id');
        $model->name = $request->input('name');
        $model->issuer = $request->input('issuer');
        $model->issuance_date = $request->input('issue_date');

        if ($request->hasFile('supporting_document')) {
            $dir = FileManager::IWORKER_DOCS_PATH;
            if ($model && $rdb_certificate = $model->supporting_document) {
                Storage::delete($dir . $rdb_certificate);
            }

            $uuid = "supporting_training_document_" . $model->id . "_" . Str::slug(Str::uuid(), '_');
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
        $model = IworkerCertificate::find(decryptId($id));
        $path = FileManager::IWORKER_DOCS_PATH . $model->supporting_document;

        if (Storage::exists($path))
            return Storage::download($path);
        return \response('File not found', 404);
    }

    public function destroy($id)
    {
        $project = IworkerCertificate::find(decryptId($id));
        $project->delete();
        session()->flash('success', ' Certificates / Training successfully deleted');
        if (\request()->ajax()) {
            return response()->json(null, 204);
        }
        return back();
    }

}
