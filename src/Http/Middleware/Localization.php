<?php

namespace Novadevs\Simultra\Base\Http\Middleware;

use Closure;
use App;
use Cookie;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->has('locale')) {
            App::setLocale(session()->get('locale'));
        }

        if (Cookie::get('locale')) {
            App::setLocale(Cookie::get('locale'));
        }
        
        return $next($request);
    }
}
