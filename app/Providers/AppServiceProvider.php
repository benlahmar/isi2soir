<?php

namespace App\Providers;

use App\Repository\IinvitationRepository;
use App\Repository\InvitationRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Services\UtilisateurService;
use App\Repository\IUtilisateurRepository;
use App\Repository\UtilisateurRepository;
use App\Services\IUtilisateurService;
use UtilisateurRepository as GlobalUtilisateurRepository;

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

          $this->app->bind(IinvitationRepository::class, InvitationRepository::class);
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
