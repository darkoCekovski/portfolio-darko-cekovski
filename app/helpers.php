<?php

use Illuminate\Support\Facades\Route;

function localized_route($name, $params = [], $absolute = true)
{
    if (!is_array($params)) {
        $params = ['id' => $params]; // or throw a custom exception
    }

    return route($name, array_merge(['locale' => app()->getLocale()], $params), $absolute);
}

