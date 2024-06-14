<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
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
        /* Allow https requests in production
        if(env('APP_ENV') == 'production') {
            URL::forceScheme('https');
        }*/
        
        // Prevent any non-administrator from adding employees to an organisation
        Gate::define('add-employees', function (User $user) {

            return strtolower($user -> role) == 'admin' ? Response::allow() : Response::deny('you do not have the permision to add employees');
        });

        Gate::define('add-medical-records', function (User $user) {
            return strtolower($user -> role) == 'admin' || strtolower($user -> role) == 'doctor';
        });

        Gate::define('employees.view', function (User $user, string $email) {
            $viewing_user = User::all() -> where('email', $email) -> first();
            Log::debug($viewing_user -> organisation_id == $user -> organisation_id);

            return $user -> organisation_id == 1;
        });
    }
}
