<?php

namespace App\Providers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrapFour();

        Gate::define('rtrw', function (User $user) {
            return $user->level === 'rt' || $user->level === 'rw';
        });

        Gate::define('rt', function (User $user) {
            return $user->level === 'rt';
        });

        Gate::define('rw', function (User $user) {
            return $user->level === 'rw';
        });

        Gate::define('warga', function (User $user) {
            return $user->level === 'warga';
        });

    }
}
