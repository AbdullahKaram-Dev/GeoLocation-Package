<?php

namespace Abdullah\UserGeoLocation;

interface GeoLocationInterface
{
    public function __construct(string $user_ip);

    public function getUserInfo():array;

    public function getUserSpecificValue($specificValue);

    public function getUserIP():string;
}
