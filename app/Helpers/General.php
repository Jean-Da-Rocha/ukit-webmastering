<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

if (! function_exists('is_active')) {
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
        $colorMatches = [
            config('role.admin') => 'uk-text-danger',
            config('role.webmaster') => 'uk-text-warning',
            config('role.developer') => 'uk-text-success',
        ];

        return in_array($roleId, config('role'))
            ? $colorMatches[$roleId]
            : '';
    }
}

if (! function_exists('format_time')) {
    /**
     * Format a time string for better readability.
     *
     * @param  string|null  $time
     * @return string
     */
    function format_time(?string $time)
    {
        if ($time === '00:00:00' || $time === null) {
            return '00 h 00 min';
        }

        $collection = Str::of($time)->explode(':');

        return $collection->first().' h '.$collection[1].' min';
    }
}

if (! function_exists('model_name')) {
    /**
     * Return the model's name in lowercase and singular format.
     *
     * @param  mixed  $model
     * @return string
     */
    function model_name($model)
    {
        if ($model instanceof Model) {
            return Str::singular($model->getTable());
        }

        return lcfirst($model);
    }
}

if (! function_exists('get_model')) {
    /**
     * Get a model instance according to
     * the provided model's name as string.
     *
     * @param  string  $modelName
     * @return Model
     */
    function get_model(string $modelName)
    {
        $modelName = Str::singular($modelName);

        if (ctype_lower($modelName)) {
            $modelName = ucfirst($modelName);
        }

        return app()->make('App\Models\\'.$modelName);
    }
}

if (! function_exists('generate_html_link')) {
    /**
     * Generate a HTML link for a datatable.
     *
     * @param  string  $route
     * @param  string  $modelAttribute
     * @return HtmlString
     */
    function generate_html_link(string $route, string $modelAttribute)
    {
        return new HtmlString(
            "<a href='{$route}' class='uk-text-primary'>
                {$modelAttribute}
            </a>"
        );
    }
}

if (! function_exists('diff_in_days')) {
    /**
     * Check if the date is in the past and returns
     * the difference from current date in days.
     *
     * @param  string  $date
     * @return int
     */
    function diff_in_days(string $date)
    {
        $date = Carbon::parse($date);

        return $date->isPast()
            ? -$date->diffInDays(now())
            : $date->diffInDays(now());
    }
}
