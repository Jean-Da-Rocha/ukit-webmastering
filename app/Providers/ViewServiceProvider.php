<?php

namespace App\Providers;

use App\Http\Views\Composers\HostingComposer;
use App\Http\Views\Composers\ProjectComposer;
use App\Http\Views\Composers\TaskComposer;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Name of the sidebar_content.blade.php blade view.
     *
     * @var string
     */
    private string $sidebarContentView = 'components.layouts.sidebar_content';

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

        view()->composer($this->sidebarContentView, TaskComposer::class);
        view()->composer($this->sidebarContentView, HostingComposer::class);
        view()->composer($this->sidebarContentView, ProjectComposer::class);
    }
}
