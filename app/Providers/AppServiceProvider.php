<?php

namespace App\Providers;

use App\Resolvers\RouteExportResolver;
use App\Services\IsinExport;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IsinExport::class, function() {
            return RouteExportResolver::resolveExportByRoute();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
