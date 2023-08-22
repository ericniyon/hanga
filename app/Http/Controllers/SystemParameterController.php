<?php

namespace App\Http\Controllers;

use App\Models\SysParameter;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SystemParameterController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = SysParameter::query()->select('sys_parameters.*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($item) {
                    return '<a class="btn btn-outline-primary py-2"
                                       data-toggle="modal"
                                       data-target="#edit-settings"
                                       data-value="'.$item->value.'"
                                    data-name="'.$item->name.'"
                                    data-url="'.route('admin.system_parameter.update',$item->id).'"
                                    href="javascript:void(0)"><span class="la la-edit"></span> Edit </a>';
                })->rawColumns(['action','status'])->make(true);
        }
        return view('admin.system_parameters.index');
    }
    public function update(Request $request,SysParameter $parameter)
    {
        $parameter->update(['value'=>$request->value,'name'=>$request->name]);
        return redirect()->back()->with('success','Parameter updated successfully');
    }
}
