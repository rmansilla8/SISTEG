<?php

namespace IntelGUA\Sisteg\Providers;

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
        'IntelGUA\Sisteg\Model' => 'IntelGUA\Sisteg\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        Gate::define('administrador', function ($user) {

            if ($user->role == 'administrador') {
                return true;
            }

            return false;

        });

        Gate::define('registrador', function ($user) {

            if ($user->role == 'registrador') {
                return true;
            }

            return false;

        });

        Gate::define('finanzas', function ($user) {

            if ($user->role == 'finanzas') {
                return true;
            }

            return false;

        });
    }
}
