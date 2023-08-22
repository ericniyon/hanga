<?php

namespace App\Http\Controllers\Testing;

use App\Http\Controllers\Controller;
use App\Http\Controllers\v2\Auth\LoginController;
use App\Models\Client;
use Auth;
use Hash;
use Http;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Str;

class TestingController extends Controller
{
    public function __construct()
    {
        $this->middleware('client.guest', ['except' => 'logout']);
    }


    function signUpWithihuzo()
    {
        return view('client.v2.auth.login-with');
    }


    protected function guard(): StatefulGuard
    {
        return Auth::guard('client');
    }

    function testsignup(Request $request)
    {
        $loginController = new LoginController();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Client::where('email', $request->email)->exists()) {
            $response = Http::post('https://bid.rw/api/client-info', [
                'username' => $request->email,
                'password' => $request->password,
            ]);

            $jsonData = $response->json();

            if ($jsonData['message'] == 'Invalid username or password') {
                return redirect()->back()->with('warning', 'Invalid username or password');
            } else {
                $client = Client::where('email', $request->email)->first();

                if ($client->is_active) {
                    Auth::guard('client')->login($client);
                    return redirect()->route('client.home');
                }
            }
        } else {
            $response = Http::post('https://bid.rw/api/client-info', [
                'username' => $request->email,
                'password' => $request->password,
            ]);

            $jsonData = $response->json();

            if ($jsonData['message'] == 'Invalid username or password') {
                return redirect()->back()->with('warning', 'Invalid username or password');
            } else {
                // return $jsonData['data']['name'];
                $slug = Str::of($jsonData['data']['name'] . '-')->slug();
                $id = uniqid();

                $counting_ebids =   Client::where('auth_type', 'ebid')->count();
                // return $counting_ebids;

                $client =   Client::create([
                    'first_name' => $jsonData['data']['name'],
                    'last_name' => '-',
                    'email' => $jsonData['data']['email'],
                    'phone' => $jsonData['data']['telephone'],
                    'name_slug' => "$slug-$id",
                    'auth_type' => 'ebid',
                    'auth_type_id' => $id . '-' . $counting_ebids,
                    'otp' => $this->getOtp(),
                    'password' => Hash::make($slug),
                    'verified_at' => now(),
                    'expires_at' => $this->getAddMinutes()
                ]);

                Auth::guard('client')->login($client);
                return redirect()->route('client.home');

                // return $client->verified_at;


                // if (is_null($client->verified_at) && $client->is_active) {
                //     return redirect()->route('client.otp.form')->with(['phone' => encrypt($client->phone)]);
                // } else {
                //     return 'hello';
                // }
                // // $loginController->login($client);

                // return redirect()->route('v2.login');
            }
        }
    }
}
