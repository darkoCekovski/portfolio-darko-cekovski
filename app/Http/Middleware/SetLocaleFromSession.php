<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocaleFromSession
{
    public function handle($request, Closure $next)
    {
        $routeLocale = $request->route('locale');

        if ($routeLocale && in_array($routeLocale, ['en', 'de'])) {
            App::setLocale($routeLocale);
            session(['locale' => $routeLocale]);
        } else {
            App::setLocale(session('locale', config('app.locale')));
        }

        return $next($request);
    }
}





