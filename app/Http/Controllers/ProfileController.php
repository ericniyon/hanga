<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePasswordRequest;

class ProfileController extends Controller
{
    public function profile()
    {
        return view("admin.user_management.profile");
    }
    public function changePasswordForm(){
        return view("admin.user_management.change_password");
    }
    public function updatePassword(ChangePasswordRequest $request)
    {
        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        return redirect()->back()->with('success', 'Password changed successfully');
    }
    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $this->validate($request, [
            'telephone' => 'required|unique:users,telephone,'.$user->id,
            'email' =>'required|unique:users,email,'.$user->id
        ]);
        // dd($request->all());
        $user->fill($request->input())->save();
        return redirect()->back()->with('success', 'User Profile Updated Successfully');
    }
}
