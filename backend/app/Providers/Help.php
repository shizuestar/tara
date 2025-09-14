<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class Help extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        require_once app_path('Helpers/project_helpers.php');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
