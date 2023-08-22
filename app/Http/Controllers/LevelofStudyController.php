<?php

namespace App\Http\Controllers;

use App\Models\FieldOfStudy;
use App\Models\LevelOfStudy;
use App\Models\StudyLevel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelofStudyController extends Controller
{
    /**
     *function to display all Level Of Studies in backend
     */
    public function index()
    {
        $studies = StudyLevel::query()->orderBy('id', 'DESC')->get();
        return view('admin.level_of_studies.create', compact('studies'));
    }

    /**
     * function to store Level Of Study
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {

        $study = new StudyLevel();
        $study->name = $request->name;
        $study->name_kn = $request->name_kn;
        $study->save();
        return redirect()->back()->with('success', 'Level Of Study created successfully');
    }

    /**
     * function to update Level Of Study
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {

        $study = StudyLevel::findOrFail($request->input('StudyId'));
        $study->name = $request->name;
        $study->name_kn = $request->name_kn;
        $study->save();

        return redirect()->back()->with('success', 'Level Of Study updated successfully');
    }

    /**
     * function to delete Level Of Study
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $level_of_study_id=decryptId($id);
        $study = StudyLevel::find($level_of_study_id);
        FieldOfStudy::query()->where('level_of_study_id','=',$level_of_study_id)->delete();
//        dd($study->id);
        $study->delete();
        return redirect()->back()->with('success', 'Level Of Study deleted successfully!!!');

    }

    public function addFieldsOfStudyToLevelOfStudy($id)
    {

        $level_of_study=StudyLevel::find(decryptId($id));
        return view('admin.assign_fields_of_studies_to_lvl_of_study',compact('level_of_study'));
    }
    public function storeFieldsOfStudyToLevelOfStudy(Request $request){
        $fieldsOfStudy= new FieldOfStudy();
        $level_of_study_id=$request->get('study_level_id');
        $fieldsOfStudy->name=$request->name;
        $fieldsOfStudy->name_kn=$request->name_kn;
        $fieldsOfStudy->level_of_study_id=$level_of_study_id;
        $fieldsOfStudy->save();
        return redirect()->back()->with('success', 'Field Of Study assigned successfully !!!');

    }
    public function updateFieldOfStudyToLevelOfStudy(Request $request)
    {
        $fieldOfStudyId=$request->get('field-of-study-id');
        $fieldOfStudy=FieldOfStudy::find($fieldOfStudyId);
        $fieldOfStudy->name=$request->get('name');
        $fieldOfStudy->name_kn=$request->get('name_kn');
        $fieldOfStudy->save();
        return redirect()->back()->with('success', 'Field Of Study updated successfully !!!');
    }
    public  function destroyFieldOfStudyFromLevelOfStudy($id)
    {
        $fieldOfStudy=FieldOfStudy::find(decryptId($id));
        $fieldOfStudy->delete();
        return redirect()->back()->with('success', 'Field Of Study deleted successfully !!!');
    }
}
