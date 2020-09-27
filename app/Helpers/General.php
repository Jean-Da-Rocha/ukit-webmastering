<?php

use Illuminate\Support\Facades\Route;

if (! function_exists('is_active_route')) {
    /**
     * Check if the current route is active.
     *
     * @param  string  $routeName
     * @return string
     */
    function is_route_active(string $routeName)
    {
        if (Route::currentRouteName() === $routeName) {
            return 'uk-active';
        }

        return '';
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
