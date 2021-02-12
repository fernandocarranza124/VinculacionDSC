<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            switch ($guard) {
                case 'profesor':
                    if(Auth::guard($guard)->check()){
                        return redirect()->route('profesor.home');
                    }
                    break;
                case 'jefeoficina':                
                    if(Auth::guard($guard)->check()){
                        //dd($guard);
                        return redirect()->route('jefeoficina.home');
                    }
                    break;
                case 'alumno':                
                    if(Auth::guard($guard)->check()){
                        //dd($guard);
                        return redirect()->route('home');
                    }
                    break;
                
                default:
                    if(Auth::guard($guard)->check()){
                        return redirect()->route('home');
                    }
                    break;
            }
        }
//dd('$guards');
        return $next($request);
    }
}
