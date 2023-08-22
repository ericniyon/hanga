<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     *function to display all Payment Methods in backend
     */
    public function index()
    {
        $methods = PaymentMethod::query()->orderBy('id', 'DESC')->get();
        return view('admin.payment_methods.create', compact('methods'));
    }

    /**
     * function to store Payment Method
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {

        $method = new PaymentMethod();
        $method->name = $request->name;
        $method->name_kn = $request->name_kn;
        $method->save();
        return redirect()->back()->with('success', 'Payment Method created successfully');
    }

    /**
     * function to update Payment Method
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {

        $method = PaymentMethod::findOrFail($request->input('MethodId'));
        $method->name = $request->name;
        $method->name_kn = $request->name_kn;
        $method->save();

        return redirect()->back()->with('success', 'Payment Method updated successfully');
    }

    /**
     * function to delete Payment Method
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {

        $method = PaymentMethod::find($id);
        $method->delete();

        return redirect()->back()->with('success', 'Payment Method deleted successfully');
    }
}
