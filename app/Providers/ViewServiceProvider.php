<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $view->with('currentUser', auth()->user());
        });

        view()->composer('components.layouts.sidebar_content', function ($view) {
            $view->with('newProjects', Cache::remember('newProjects', 60, function () {
                return app(\App\Actions\ProgressBar::class)->getCount('project');
            }));

            $view->with('newProjectsPercentage', Cache::remember('newProjectsPercentage', 60, function () {
                return app(\App\Actions\ProgressBar::class)->getPercentage('project');
            }));

            $view->with('newTasks', Cache::remember('newTasks', 60, function () {
                return app(\App\Actions\ProgressBar::class)->getCount('task');
            }));

            $view->with('newTasksPercentage', Cache::remember('newTasksPercentage', 60, function () {
                return app(\App\Actions\ProgressBar::class)->getPercentage('task');
            }));

            $view->with('newHostings', Cache::remember('newHostings', 60, function () {
                return app(\App\Actions\ProgressBar::class)->getCount('hosting');
            }));

            $view->with('newHostingsPercentage', Cache::remember('newHostingsPercentage', 60, function () {
                return app(\App\Actions\ProgressBar::class)->getPercentage('hosting');
            }));
        });
    }
}
