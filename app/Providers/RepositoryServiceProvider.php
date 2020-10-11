<?php

namespace App\Providers;

use App\Repositories\{BaseRepository, ProjectRepository};
use App\Repositories\Contracts\{BaseRepositoryInterface, ProjectRepositoryInterface};

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            BaseRepositoryInterface::class,
            BaseRepository::class,
        );

        $this->app->bind(
            ProjectRepositoryInterface::class,
            ProjectRepository::class,
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
