<?php


namespace App\Http\Controllers\Client;


use App\Http\Requests\ValidateAward;
use App\Models\ApplicationSolution;
use App\Models\CertificationAward;
use Illuminate\Support\Facades\DB;

class CertificationAwardsController extends \App\Http\Controllers\Controller
{
    public function store(ValidateAward $request)
    {

        $data = $request->validated();
        $id = $request->input('id');
        $model = $id > 0 ? CertificationAward::find($id) : new CertificationAward();
        $model->fill($data)
            ->save();

        if ($request->ajax())
            return $model;
        return back();
    }

    /**
     * @throws \Throwable
     */
    public function destroy($id)
    {
        $model = CertificationAward::find(decryptId($id));
        $model->delete();
        session()->flash('success', 'Record successfully deleted');
        if (request()->ajax()) {
            return response()->json(null, 204);
        }
        return back();
    }
}
