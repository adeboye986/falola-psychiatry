<?php

namespace App\Providers;

use App\Support\TebraIntegration;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View as ViewInstance;

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
    public function boot(TebraIntegration $tebra): void
    {
        View::composer('components.site.navigation', function (ViewInstance $view) use ($tebra): void {
            $view->with('patientPortalUrl', $tebra->portalUrl());
        });
    }
}
