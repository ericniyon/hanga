<?php

namespace App\Http\Middleware\v2;

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
        if ($auth->check()) {
            if (is_null($auth->user()->registration_type_id)) {
                return redirect()->to(route('v2.join.as'));
            }
//            return redirect()->route('v2.login');
        }


        return $next($request);
    }
}
