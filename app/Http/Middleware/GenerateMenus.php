<?php

namespace App\Http\Middleware;

use Closure;
use Menu;
class GenerateMenus
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
        Menu::make('MyNavBar', function($menu){
		if (session()->get('locale') != "en") {
			$menu->add( __("messages.Account"),     ['route'  => 'publisher']);
			$menu->add(__("messages.Links"),     ['route'  => 'links']);
			$menu->add(__("messages.Home"),     ['route'  => 'home']);
		}
		if (session()->get('locale') == "en")		{
			$menu->add("Account",     ['route'  => 'publisher']);
			$menu->add("Links",     ['route'  => 'links']);
			$menu->add("Home",     ['route'  => 'home']);
		}

});
	return $next($request);
    }
}
