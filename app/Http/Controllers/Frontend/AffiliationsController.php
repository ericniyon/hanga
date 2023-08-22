<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateAffiliation;
use App\Models\Affiliation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AffiliationsController extends Controller
{
    public function store(ValidateAffiliation $request)
    {
        $request->validated();

        $id = $request->input('id');

        $model = $id > 0 ? Affiliation::find($id) : new Affiliation();

        $model->employer_id = $request->input('employer_id');
        $model->client_id = auth('client')->id();
        $model->position = $request->input('position');
        $model->description = $request->input('description');
        $model->save();

        if ($request->ajax())
            return $model;
        return back();
    }

    public function destroy($id)
    {
        $model = Affiliation::find(decryptId($id));
        $model->delete();
        if (\request()->ajax())
            return response()->json(null, 204);
        return back();
    }
}
