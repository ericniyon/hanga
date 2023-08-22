<?php

namespace App\Http\Controllers\v2\Auth;

use App\Client;
use App\Http\Requests\ValidateClientRegistration;
use App\Http\Requests\ValidatePasswordRegistration;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected string $redirectTo = '/client/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('client.guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'nullable|max:255',
            'email' => 'required|email|max:255|unique:clients',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return Client
     */
    protected function create(array $data): Client
    {
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];

        $slug = Str::of($first_name . $last_name)->slug();
        $id = uniqid();
        return Client::create([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $data['email'],
            'phone' => $data['phone'],
            'name_slug' => "$slug-$id",
            'otp' => $this->getOtp(),
            'expires_at' => $this->getAddMinutes()
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return Application|Factory|View
     */
    public function showRegistrationForm()
    {
        return view('client.v2.auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param ValidateClientRegistration $request
     * @return RedirectResponse
     */
    public function register(ValidateClientRegistration $request): RedirectResponse
    {
        $request->validated();

        event(new Registered($client = $this->create($request->all())));

//        $this->guard()->login($user);
        // send otp
        $this->sendOtp($client);

        return redirect()->route('v2.otp.form', ['phone' => encrypt($client->phone)]);
    }


    public function otpForm(Request $request)
    {
        $phone_number = decrypt($request->input('phone'));
        $client = Client::getClientByPhoneNumber($phone_number);
        if (is_null($client))
        {
            return back()->with(['error' => 'User not found']);
        }
        $emailExploded = substr(explode('@', $client->email)[0], -2) . '@' . explode('@', $client->email)[1];


        return view('client.v2.auth.otp_page', [
            'client' => $client,
            'email_exploded' => $emailExploded
        ]);
    }

    public function resendOtp(Request $request): RedirectResponse
    {
        $phone = decrypt($request->input('phone'));
        $client = Client::getClientByPhoneNumber($phone);

        if (is_null($client))
        {
            return back()->with(['error' => 'Invalid phone number provided']);
        }

        $otp = $this->getOtp();
        $client->otp = $otp;
        $client->expires_at = $this->getAddMinutes();
        $client->update();

        $this->sendOtp($client);

        return back()->with(['success' => "Enter Your OTP(One Time Password) sent to your phone number ( $phone )"]);
    }

    public function otpVerify(Request $request): RedirectResponse
    {
        $request->validate([
            'phone_number' => 'required',
            'otp' => 'required|exists:clients,otp',
        ], [
            'otp.exists' => __('app.Invalid code provided')
        ]);

        $phone_number = $request->input('phone_number');
        $otp = $request->input('otp');

        $client = Client::query()->where([
            ['phone', '=', $phone_number],
            ['otp', '=', $otp]
        ])->first();
        if (is_null($client))
        {
            session()->flash('error', __('app.Invalid code provided'));
            return back()->withInput()
                ->withErrors(['otp' => __('app.Invalid code provided')]);
        }


        if ($client->expires_at < now())
        {
            session()->flash('error', __("app.The code provided has been expired, you can resend the code to get a new one"));
            return back()->withInput()
                ->withErrors(['otp' => __("app.The code provided has been expired, you can resend the code to get a new one")]);
        }


        $token = str_random(30);
        $client->verify_token = $token;
        $client->verified_at = now();
        $client->update();

        $route = route('v2.change.password', ['token' => $token]);
        return redirect()->to($route)
            ->with(['success' => __("app.Verification successful, you can now change your password")]);
    }


    public function changePassword($token)
    {
        return view('client.v2.auth.change_password', compact('token'));
    }

    public function savePassword(ValidatePasswordRegistration $request): RedirectResponse
    {
        $request->validated();

        $token = $request->input('token');

        $client = Client::query()->where('verify_token', '=', $token)->first();
        if (is_null($client))
        {
            return back()->withErrors($request, ['password' => __("app.Invalid token provided")]);
        }
        $client->password = bcrypt($request->input('password'));
        $client->verify_token = null;
        $client->update();

        \auth()->guard('client')->loginUsingId($client->id);

        return redirect()->intended(route('v2.home'));
    }


    /**
     * Get the guard to be used during registration.
     *
     * @return StatefulGuard
     */
    protected function guard(): StatefulGuard
    {
        return Auth::guard('client');
    }

}
