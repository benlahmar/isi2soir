<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use IUtilisateurRepository;
use IUtilisateurService;
use UtilisateurRepository;
use UtilisateurService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        // Register any application services here
        // For example, you can bind interfaces to implementations
         $this->app->bind(IUtilisateurService::class, UtilisateurService::class);
         $this->app->bind(IUtilisateurRepository::class, UtilisateurRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Schema::defaultStringLength(191); //Update defaultStringLength
    }
}
