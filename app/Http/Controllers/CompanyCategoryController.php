<?php

namespace App\Http\Controllers;

use App\Models\CompanyCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CompanyCategoryController extends Controller
{
    /**
     *function to display all Company Categories in backend
     */
    public function index()
    {
        $companies = CompanyCategory::query()->orderBy('id', 'DESC')->get();
        return view('admin.company_categories.create', compact('companies'));
    }

    /**
     * function to store Company Category
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {

        $company = new CompanyCategory();
        $company->name = $request->name;
        $company-> name_kn = $request->name_kn;
        $company->save();
        return redirect()->back()->with('success', 'Company Category created successfully');
    }

    /**
     * function to update Company Category
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {

        $company = CompanyCategory::findOrFail($request->input('CompanyId'));
        $company->name = $request->name;
        $company-> name_kn = $request->name_kn;
        $company->save();

        return redirect()->back()->with('success', 'Company Category updated successfully');
    }

    /**
     * function to delete Company Category
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {

        $company = CompanyCategory::find($id);
        $company->delete();

        return redirect()->back()->with('success', 'Company Category deleted successfully');
    }
}
