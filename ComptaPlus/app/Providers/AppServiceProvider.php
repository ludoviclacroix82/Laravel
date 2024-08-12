<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\AdminPolicy;
use App\Policies\ProfilPolicy;

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
        Gate::define('admin.index', [AdminPolicy::class, 'index']);
        Gate::define('profil.index', [ProfilPolicy::class, 'index']);
    }
}

