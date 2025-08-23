<?php

if (!function_exists('localized_route')) {
    /**
     * Generate a route URL and auto-inject the current locale parameter.
     */
    function localized_route(string $name, array $params = [], bool $absolute = true): string
    {
        $params['locale'] = $params['locale'] ?? app()->getLocale();
        return route($name, $params, $absolute);
    }
}

if (!function_exists('switch_locale_url')) {
    /**
     * Build the current pages URL but with a different locale.
     * Useful for language switcher links.
     */
    function switch_locale_url(string $locale): string
    {
        $route = request()->route();

        if ($route && $route->getName()) {
            $params = $route->parameters();
            $params['locale'] = $locale;
            return route($route->getName(), $params);
        }

        // Fallback: swap/prepend the first URL segment
        $path = request()->path(); // e.g. 'en/about'
        $segments = $path === '/' ? [] : explode('/', trim($path, '/'));

        if (!empty($segments) && in_array($segments[0], ['en', 'de'], true)) {
            $segments[0] = $locale;
        } else {
            array_unshift($segments, $locale);
        }

        return url(implode('/', $segments));
    }
}





