<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;

class ChangePasswordController extends Controller
{

    public function changePasswordForm()
    {
        return view('client.v2.auth.change_password');
    }

}
