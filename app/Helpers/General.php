<?php

use Illuminate\Database\Eloquent\Model;
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
    function has_route(string $routeName, int $id = null)
    {
        if (Route::has($routeName)) {
            return route($routeName, $id ?? []);
        }

        return '#';
    }
}

if (! function_exists('get_role_color')) {
    /**
     * Get the UIKit text color for the corresponding role.
     *
     * @param  int  $roleId
     * @return string
     */
    function get_role_color(int $roleId)
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

if (! function_exists('format_time')) {
    /**
     * Format a time string for better readability.
     *
     * @param  string  $time
     * @return string
     */
    function format_time(string $time)
    {
        if ($time === '00:00:00') {
            return '00 h 00 min';
        }

        $collection = Str::of($time)->explode(':');

        return $collection->first() . ' h ' . $collection[1] . ' min';
    }
}

if (! function_exists('model_name')) {
    /**
     * Return the model's name in lowercase and singular format.
     *
     * @param  mixed  $model
     * @return void
     */
    function model_name($model)
    {
        if ($model instanceof Model) {
            return Str::singular($model->getTable());
        }

        return lcfirst($model);
    }
}
