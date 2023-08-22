<?php


namespace App\Http\Controllers\Client\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateInformationController extends Controller
{
    public function updateProfile(Request $request)
    {

        
        $request->validate([
            'first_name' => ['required', 'min:2', 'max:50'],
            'profile_photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024']
        ]);
        $user = auth('client')->user();

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        if ($request->hasFile('profile_photo')) {
            $user->updateProfilePhoto($request['profile_photo']);
        }
        $user->save();

        session()->flash('success', "Profile updated successfully");
        if ($request->ajax())
            return $user;
        return back();
    }

}
