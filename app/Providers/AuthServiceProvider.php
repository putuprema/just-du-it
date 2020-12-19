<?php

namespace App\Providers;

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

        // Gate for Admin user role
        Gate::define("isAdmin", function ($user) {
            return $user->role == "ADMIN";
        });

        // Gate for Member user role
        Gate::define("isMember", function ($user) {
            return $user->role == "MEMBER";
        });
    }
}
