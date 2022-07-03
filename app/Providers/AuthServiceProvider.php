<?php

namespace App\Providers;

use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('access-officer-dashboard', function($user){
            return $user->role->title === 'officer'
                ? Response::allow()
                : Response::deny('You must be an officer to access this.');
        });

        Gate::define('access-admin-dashboard', function($user){
            return $user->role->title === 'admin'
                ? Response::allow()
                : Response::deny('You must be an admin to access this.');
        });
    }
}