<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

if (! function_exists('is_active_route')) {
    /**
     * Check if the current route contains the given
     * url param to then return the `uk-active` class.
     *
     * @param  string  $urlParam
     * @return string
     */
    function is_active(string $urlParam)
    {
        $currentRouteName = Route::currentRouteName();

        if (Str::of($currentRouteName)->contains($urlParam)) {
            return 'uk-active';
        }

        return '';
    }
}

if (! function_exists('has_route')) {
    /**
     * Check if the provided route exists and return its URL
     * or a '#' string otherwise.
     *
     * @param  string  $routeName
     * @param  int|null  $id
     * @return string|\Illuminate\Http\RedirectResponse
     */
    function has_route(string $routeName, int $id = null) {
        if (Route::has($routeName)) {
            return route($routeName, $id ?? []);
        }

        return '#';
    }
}

if (! function_exists('getRoleColor')) {
    /**
     * Get the UIKit text color for the corresponding role.
     *
     * @param  int  $roleId
     * @return string
     */
    function getRoleColor(int $roleId)
    {
        switch ($roleId) {
            case config('role.admin'):
                return 'uk-text-danger';
            case config('role.webmaster'):
                return 'uk-text-warning';
            case config('role.developer'):
                return 'uk-text-success';
            default:
                return '';
        }
    }
}

if (! function_exists('formatTime')) {
    /**
     * Format a time string for better readability.
     *
     * @param  string  $time
     * @return string
     */
    function formatTime(string $time) {
        if ($time === '00:00:00') {
            return '00 h 00 min';
        }

        $collection = Str::of($time)->explode(':');

        return $collection->first() . ' h ' . $collection[1] . ' min';
    }
}
