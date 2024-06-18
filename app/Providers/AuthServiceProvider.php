<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('front', function(User $user) {
            return $user->hasRole('front');
        });
        Gate::define('scolarite', function(User $user) {
            return $user->hasRole('scolarite');
        });
        Gate::define('s_etude', function(User $user) {
            return $user->hasRole('s_etude');
        });
        Gate::define('g_info', function(User $user) {
            return $user->hasRole('g_info');
        });
        Gate::define('s_energie', function(User $user) {
            return $user->hasRole('s_energie');
        });
        Gate::define('imp', function(User $user) {
            return $user->hasRole('imp');
        });
        Gate::define('cfm', function(User $user) {
            return $user->hasRole('cfm');
        });
        Gate::define('teb', function(User $user) {
            return $user->hasRole('teb');
        });
        Gate::define('t_laboratoire', function(User $user) {
            return $user->hasRole('t_laboratoire');
        });
        Gate::define('etudiant', function(User $user) {
            return $user->hasRole('etudiant');
        });
        Gate::define('enseignant', function(User $user) {
            return $user->hasRole('enseignant');
        });
        Gate::define('comptabilite', function(User $user) {
            return $user->hasRole('comptabilite');
        });
        Gate::define('admin', function(User $user) {
            return $user->hasRole('admin');
        });

    }
}
