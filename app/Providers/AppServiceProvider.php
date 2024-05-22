<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        // Prevent any non-administrator from adding employees to an organisation
        Gate::define('add-employees', function (User $user) {

            return strtolower($user -> role) == 'admin' ? Response::allow() : Response::deny('you do not have the permision to add employees');
        });
    }
}
