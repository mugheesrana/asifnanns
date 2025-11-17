<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        //
    ];

    public function boot(): void
    {
        // Define Gates for different user types
        Gate::define('admin-access', function ($user) {
            return $user->hasRole('admin');
        });

        Gate::define('dealer-access', function ($user) {
            return $user->hasRole('dealer');
        });

        Gate::define('buyer-access', function ($user) {
            return $user->hasRole('buyer');
        });

        Gate::define('admin-or-dealer', function ($user) {
            return $user->hasAnyRole(['admin', 'dealer']);
        });
    }
}
