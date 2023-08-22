<?php

namespace App\Http\Controllers\v2\Auth;

use App\Client;
use App\Http\Controllers\Controller;
use Hesto\MultiAuth\Traits\LogsoutGuard;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function back;
use function encrypt;
use function redirect;
use function view;

class LoginController extends Controller
{
    use AuthenticatesUsers, LogsoutGuard {
        LogsoutGuard::logout insteadof AuthenticatesUsers;
    }

    public string $redirectTo = '/client/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('client.guest', ['except' => 'logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return Application|Factory|View
     */
    public function showLoginForm()
    {
        return view('client.v2.auth.login');
    }


    /**
     * Get the guard to be used during authentication.
     *
     * @return StatefulGuard
     */
    protected function guard(): StatefulGuard
    {
        return Auth::guard('client');
    }

    public function username(): string
    {
        return 'username';
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') && $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            $this->sendLockoutResponse($request);
        }

        $username = $request->input('username');
        $password = $request->input('password');
        $remember = $request->input('remember');

        $client = Client::whereNotNull('password')
            ->where(function (Builder $builder) use ($username) {
                $builder->where('phone', '=', $username)
                    ->orWhere('email', '=', $username);
            })->first();


        if ($client) {

            if (is_null($client->verified_at) && $client->is_active) {
                return redirect()->route('client.otp.form')->with(['phone' => encrypt($client->phone_number)]);
            }

            if (Hash::check($password, $client->password)) {

                if (!$client->is_active) {
                    return back()->withInput($request->only('username'))
                        ->withErrors(['username' => 'This account is not active. please contact iHuzo admin']);
                }

                if ($this->guard()->loginUsingId($client->id, $remember == 'on')) {
                    return $this->sendLoginResponse($request);
                }
            }
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }


    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }


    public function password()
    {
        return view('client.auth.passwords.email');
    }

    public function sendPasswordReset(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => 'required'
        ]);
        $username = $request->input('username');
        $client = Client::query()
            ->where('phone', '=', $username)
            ->orWhere('email', '=', $username)
            ->first();
        if (is_null($client)) {
            return back()->withErrors(['username' => "We didn't find a user with this phone number or email"])
                ->withInput($request->only('username'));
        }

        $otp = $this->getOtp();
        $client->otp = $otp;
        $client->expires_at = $this->getAddMinutes();
        $client->update();


        $message = "You request to reset your password, please use this OTP(One Time Password) : $client->otp to verify your account to change your password.";
        $this->sendOtp($client, $message);
        return redirect()->route('v2.otp.form', ['phone' => encrypt($client->phone)]);
    }

    public function reset($token)
    {
        return view('client.v2.auth.otp_page', compact('token'));
    }


    public function otp(): RedirectResponse
    {
        return redirect()->route('v2.otp.form');
    }

    public function otpForm()
    {
        return view('client.v2.auth.otp_page');
    }

}
