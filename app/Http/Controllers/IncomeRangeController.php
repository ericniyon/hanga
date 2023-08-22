<?php

namespace App\Http\Controllers;

use App\Models\IncomeRange;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;

class IncomeRangeController extends Controller
{
    /**
     *function to display all Income Ranges in backend
     */
    public function index()
    {
        $incomes = IncomeRange::query()->orderBy('id', 'DESC')->get();
        return view('admin.income_ranges.create', compact('incomes'));
    }

    /**
     * function to store Income Range
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {

        $income = new IncomeRange();
        $income->name = $request->name;
        $income->name_kn = $request->name_kn;
        $income->save();
        return redirect()->back()->with('success', 'Income Range created successfully');
    }

    /**
     * function to update Income Range
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {

        $income = IncomeRange::findOrFail($request->input('IncomeId'));
        $income->name = $request->name;
        $income->name_kn = $request->name_kn;
        $income->save();

        return redirect()->back()->with('success', 'Income Range updated successfully');
    }

    /**
     * function to delete Income Range
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {

        $income = IncomeRange::find($id);
        $income->delete();

        return redirect()->back()->with('success', 'Income Range deleted successfully');
    }
}
