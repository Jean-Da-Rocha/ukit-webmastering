<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('performAdminAction', function (User $user) {
            return $user->isAdmin()
                ? Response::allow()
                : Response::deny('You must have administrator role.');
        });

        Gate::define('performWebmasterAction', function (User $user) {
            return ($user->isAdmin() || $user->isWebmaster())
                ? Response::allow()
                : Response::deny('You must have either administrator or webmaster role.');
        });
    }
}
