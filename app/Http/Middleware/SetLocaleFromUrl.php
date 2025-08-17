<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocaleFromUrl
{
    public function handle($request, Closure $next)
    {
        $locale = $request->route('locale');

        if (in_array($locale, ['en', 'de'], true)) {
            App::setLocale($locale);
            // optional: keep session in sync
            session(['locale' => $locale]);
        }

        return $next($request);
    }
}
