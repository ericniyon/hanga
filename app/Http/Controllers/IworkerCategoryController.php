<?php

namespace App\Http\Controllers;

use App\Models\IworkerCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class IworkerCategoryController extends Controller
{
    /**
     *function to display all I Worker Categories in backend
     */
    public function index()
    {
        $categories = IworkerCategory::query()->orderBy('id', 'DESC')->get();
        return view('admin.i_worker_categories.create', compact('categories'));
    }

    /**
     * function to store I Worker Category
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {

        $category = new IworkerCategory();
        $category->name = $request->name;
        $category-> name_kn = $request->name_kn;
        $category->save();
        return redirect()->back()->with('success', 'I Worker Category created successfully');
    }

    /**
     * function to update I Worker Category
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {

        $category = IworkerCategory::findOrFail($request->input('CategoryId'));
        $category->name = $request->name;
        $category-> name_kn = $request->name_kn;
        $category->save();

        return redirect()->back()->with('success', 'I Worker Category updated successfully');
    }

    /**
     * function to delete I Worker Category
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {

        $category = IworkerCategory::find($id);
        $category->delete();

        return redirect()->back()->with('success', 'I Worker Category deleted successfully');
    }
}
