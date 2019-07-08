<?php

namespace Novadevs\Simultra\Base\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if ( $request->user()->role != $role ) {
            // return redirect('home');
            abort(403, 'No tienes autorización para ingresar.');
        }
        return $next($request);
    }
}
