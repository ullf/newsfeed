<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class SetLocales
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
		app()->setLocale(Session::get('locale'));
        return $next($request);
    }
}
