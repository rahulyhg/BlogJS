<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;


class AdministradorRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard) {
            if (Auth::guard($guard)->check()) {
                if (Auth::user()->id_rol == 1) {

                    return $next($request);

                } else {

                    return redirect('login');

                }
            }
        } else {

            return $next($request);

        }
    }
}
