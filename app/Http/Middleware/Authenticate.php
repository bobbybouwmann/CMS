<?php

namespace I9T\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                notify()->flash('Were do you think you\'re going?', 'success', [
                    'text' => 'You must be logged in to view this page!',
                ]);

                return redirect()->route('auth.signin');
            }
        }

        return $next($request);
    }
}
