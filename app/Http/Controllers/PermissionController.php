<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
		$permissions=Permission::orderBy('id','desc')->get();
		return view('admin.user_management.permissions',compact('permissions'));
	}

	public function store(Request $request){
		$permission=new Permission();
		$permission->name=$request->name;
		$permission->description=$request->description;
		$permission->save();
		return redirect()->back()->with('success','permission added successfully');
	}
    public function addPermissionToUser($user_id)
    {
        $id=decryptId($user_id);
        $user = User::find($id);
        $permissions=Permission::all();
        $user->permissions();
    	return view('admin.user_management.permissions_to_users',compact('permissions','user'));
    }
    public function storePermissionToUser(Request $request){
        $id=decryptId(request()->user_id);
        $user = User::find($id);
	    $user->syncPermissions($request->permissions);
    	return redirect()->back()->with("success","permissions for $user->name updated successfully");
    }
}
