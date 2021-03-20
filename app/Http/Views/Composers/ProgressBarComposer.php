<?php

namespace App\Http\Views\Composers;

use App\Actions\ProgressBarCalculation;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

abstract class ProgressBarComposer
{
    /**
     * ProgressBarCalculation action class.
     *
     * @var ProgressBarCalculation
     */
    protected ProgressBarCalculation $progressBar;

    /**
     * Call a specific method from the progress bar service.
     *
     * @param  string  $method
     * @return mixed
     */
    protected function call(string $method)
    {
        return $this->progressBar->{$method}();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    abstract public function compose(View $view);

    /**
     * Store a cache key => value pair to retrieve the total
     * of new entity created this month and their percentage.
     *
     * @param  View  $view
     * @param  string  $cacheKey
     * @param  string  $method the method to use on ProgressBarCalculation action class.
     * @return void
     */
    protected function putToCache(View $view, string $cacheKey, string $method)
    {
        // We share to 'sidebar_content.blade.php' view a key that has as value
        // a cache instance returning either the percentage or total (projects for instance)
        // that has been created for the current month.
        $view->with(
            $cacheKey,
            Cache::remember($cacheKey, 60, fn () => $this->call($method))
        );
    }
}
