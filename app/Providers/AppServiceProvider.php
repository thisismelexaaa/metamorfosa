<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('RoleAdmin', function (User $user) {
            return $user->role == 'admin';
        });
        Gate::define('RoleSupportTeacher', function (User $user) {
            return $user->role == 2;
        });

        Gate::define('RoleStaff', function (User $user) {
            return $user->role == 3;
        });

        Gate::define('RoleReceptionist', function (User $user) {
            return $user->role == 4;
        });

        Gate::define('RoleOfficial', function (User $user) {
            return $user->role == 5;
        });

    }
}
