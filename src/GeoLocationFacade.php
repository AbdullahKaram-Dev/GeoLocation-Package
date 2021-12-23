<?php

namespace Abdullah\UserGeoLocation;

use Illuminate\Support\Facades\Facade;

class GeoLocationFacade extends Facade
{
    protected static function getFacadeAccessor():string
    {
       return 'GeoLocation';
    }

}
