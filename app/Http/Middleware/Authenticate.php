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

            if($request->routeIs('admin.*')){
                return redirect()->route('admin.login');
            }
            
            if($request->routeIs('doctor.*')){
                return redirect()->route('doctor.login');
            }
            
            if($request->routeIs('patient.*')){
                return redirect()->route('patient.login');
            }

            return route('login');
        }
    }
}
