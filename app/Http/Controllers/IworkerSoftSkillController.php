<?php

namespace App\Http\Controllers;

use App\Models\IworkerSoftSkill;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class IworkerSoftSkillController extends Controller
{
    /**
     *function to display all I worker Software Skills in backend
     */
    public function index()
    {
        $skills = IworkerSoftSkill::query()->orderBy('id', 'DESC')->get();
        return view('admin.i_worker_software_skills.create', compact('skills'));
    }

    /**
     * function to store I worker Software Skill
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {

        $skill = new IworkerSoftSkill();
        $skill->name = $request->name;
        $skill->name_kn = $request->name_kn;
        $skill->save();
        return redirect()->back()->with('success', 'I worker Software Skill created successfully');
    }

    /**
     * function to update I worker Software Skill
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {

        $skill = IworkerSoftSkill::findOrFail($request->input('SkillId'));
        $skill->name = $request->name;
        $skill->name_kn = $request->name_kn;
        $skill->save();

        return redirect()->back()->with('success', 'I worker Software Skill updated successfully');
    }

    /**
     * function to delete I worker Software Skill
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {

        $skill = IworkerSoftSkill::find($id);
        $skill->delete();

        return redirect()->back()->with('success', 'I worker Software Skill deleted successfully');
    }
}
