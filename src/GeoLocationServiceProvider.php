<?php

namespace Abdullah\UserGeoLocation;

use Illuminate\Support\ServiceProvider;

class GeoLocationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/config/GeoLocation.php','GeoLocation');
        $this->publishes([
            __DIR__.'/config/GeoLocation.php' => config_path('GeoLocation.php')
        ]);
    }

    public function register()
    {
        $this->app->bind('GeoLocation',GeoLocation::class);
    }
}
