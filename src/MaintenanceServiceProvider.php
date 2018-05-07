<?php

namespace Baorv\Maintenance\Providers;

use Illuminate\Support\ServiceProvider;

class MaintenanceServiceProvider extends ServiceProvider
{

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '../resources/lang', 'maintenance');
        $this->loadViewsFrom(__DIR__ . '../resources/views', 'maintenance');
        $this->publishes([
            __DIR__ . '../config/maintenance.php' => config_path('maintenance.php'),
            __DIR__ . '../resources/lang' => resource_path('lang/vendor/maintenance'),
        ]);
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '../config/maintenance.php', 'maintenance'
        );
    }
}