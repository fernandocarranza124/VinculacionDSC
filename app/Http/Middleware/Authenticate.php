<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
             //$errors = new MessageBag(['password' => ['No Control o contraseña incorrecta.']]);
             
            //return view('index')->withErrors($errors);
            return view('index');
        }
    }
}
