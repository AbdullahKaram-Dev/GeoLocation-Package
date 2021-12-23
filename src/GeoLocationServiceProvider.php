<?php

namespace Abdullah\UserGeoLocation;

use Illuminate\Support\ServiceProvider;

class GeoLocationServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->app->bind('GeoLocation', function()
        {
            return new GeoLocation();
        });

    }
}
