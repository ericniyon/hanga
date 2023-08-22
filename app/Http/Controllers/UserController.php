<?php

namespace App\Http\Controllers;

use App\Imports\ClientImport;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Jobs\MailRegisteredUser;
use App\DataTables\UserDataTable;
use App\Http\Requests\ValidateUser;
use App\Http\Requests\ValidateUpdateUser;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        $user=auth()->user();
        $data = User::with(["permissions"])->orderBy('created_at','desc')->select("users.*");
        $dataTable = new UserDataTable($data);
        return $dataTable->render('admin.user_management.users');
	}


    /**
     * @throws \Throwable
     */
    public function uploadExcel(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        Excel::import(new ClientImport(), $request->file("excel_file"));
        DB::commit();

        return back()->with("success","Clients imported successfully");
    }

	public function store(ValidateUser $request ) {
        $request->validated();
        $ini_pass = Str::random(10);
		$user            = new User();
		$user->name      = $request->name;
		$user->email     = $request->email;
        $user->telephone = $request->telephone;
        $user->job_title = $request->job_title;
		$user->password  = bcrypt($ini_pass);
		$user->is_superadmin  = false;
		$user->save();
        $this->dispatch(new MailRegisteredUser($user->email,$ini_pass,$user->name));
		return redirect()->back()->with('success','User created successfully');
	}

    public function update( ValidateUpdateUser $request,$user_id) {
        $request->validated();
        // $id=decryptId($user_id);
        $user= User::find($user_id);
        $user->name      = $request->name;
        $user->email     = $request->email;
        $user->telephone = $request->telephone;
        $user->is_active = $request->is_active;
        $user->job_title = $request->job_title;
        $user->save();
        return redirect()->back()->with('success','User Updated successfully');
    }

    public function userProfile($user_id){
	    $id=decryptId($user_id);
	    $user=User::find($id);
	    return view("admin.user_management.profile",compact("user"));
    }

}
