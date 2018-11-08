<?php

namespace IntelGUA\Sisteg\Providers;


use Illuminate\Support\Facades\Gate;
// use IntelGUA\Sisteg\Model;
// use IntelGUA\Sisteg\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use JeroenNoten\LaravelAdminLte\Menu\Builder;
use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;
use Caffeinated\Shinobi\Middleware;
use Caffeinated\Shinobi\Middleware\UserHasPermission;
use Caffeinated\Shinobi\Middleware\UserHasRole;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'IntelGUA\Sisteg\Model' => 'IntelGUA\Sisteg\Policies\ModelPolicy',
        // User::class => UserPolicy::class,
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

            if ($user->role === 'administrador') {
                return true;
            }

            return false;

        });

        // Gate::define('registrador', function ($user) {

        //     if ($user->role === 'registrador') {
        //         return true;
        //     }

        //     return false;

        // });

        // Gate::define('finanzas', function ($user) {

        //     if ($user->role === 'finanzas') {
        //         return true;
        //     }

        //     return false;

        // });
    }
}
