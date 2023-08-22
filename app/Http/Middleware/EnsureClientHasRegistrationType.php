<?php

namespace App\Http\Middleware;

use App\Models\RegistrationType;
use Closure;
use Illuminate\Http\Request;

class EnsureClientHasRegistrationType
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $auth = auth()->guard('client');
        if (!$auth->check()) {
            return redirect()->to('/client/login');
        }
        if (is_null($auth->user()->registration_type_id)) {
            return redirect()->to(route('v2.join.as'));
        }


//        if ($auth->user()->registrationType->name == RegistrationType::DSP) {
//            return redirect()->to(route('client.dsp.application.form'));
//        }

        return $next($request);
    }
}
