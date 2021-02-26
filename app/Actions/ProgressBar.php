<?php

namespace App\Actions;

use Illuminate\Support\Str;

/**
 * @see \App\Providers\ViewServiceProviders.
 */
class ProgressBar
{
    /**
     * Count the number of newly created entity ($modelName)
     * for the current month.
     *
     * @param  string  $modelName
     * @return int
     */
    public function getCount(string $modelName)
    {
        return get_model($modelName)::whereBetween('created_at', [
            now()->startOfMonth(), now()->endOfMonth(),
        ])->count();
    }

    /**
     * Get the progress bar percentage as integer.
     *
     * @param  string  $modelName
     * @return float
     */
    public function getPercentage(string $modelName)
    {
        $model = get_model($modelName);

        $cacheKey = 'new'.ucfirst(Str::plural($modelName));

        return ceil(
            (cache($cacheKey) * $model::count()) / 100
        );
    }
}
