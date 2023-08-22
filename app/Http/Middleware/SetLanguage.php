<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLanguage
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
        if ($request->session()->has('lang')) {
            $lang = $request->session()->get('lang');
            App::setLocale($lang);
        } else {
            App::setLocale('en');
        }

        return $next($request);
    }
}
