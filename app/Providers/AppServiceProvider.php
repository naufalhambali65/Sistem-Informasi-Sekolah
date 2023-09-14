<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
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
        Paginator::useBootstrapFive();

        Gate::define('staff', function(User $user){
            if($user->authenticate == 1 || $user->authenticate == 2){
                return true;
            }
            return false;
        });
        Gate::define('admin', function(User $user){
            return $user->authenticate == 2;
        });
    }
}
