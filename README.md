![](https://img.shields.io/github/issues/AbdullahKaram-Dev/GeoLocation-Package)
![](https://img.shields.io/github/stars/AbdullahKaram-Dev/GeoLocation-Package)
![](https://img.shields.io/github/forks/AbdullahKaram-Dev/GeoLocation-Package)
![](https://img.shields.io/github/license/AbdullahKaram-Dev/GeoLocation-Package)
![](https://img.shields.io/twitter/url?url=https%3A%2F%2Fgithub.com%2FAbdullahKaram-Dev%2FGeoLocation-Package)


# GeoLocation in PHP (API) 😍😍😍

## This package helps you to know a lot of information about the current user by his ip address 😍😍😍


This package helps you to know the current language of the user, the country from which he is browsing, the currency of his country, and also whether he is using it vpn

![GeoLocation](https://avatars.githubusercontent.com/u/38139028?v=4)

##Usage

There is no need to additional setup to start using, once you install it via composer you can call the Facade:

```php
<?php

use Abdullah\UserGeoLocation\GeoLocation;

$user_ip = request()->ip();

$userInfo = new GeoLocation($user_ip);

echo $userInfo->getUserIP();
result : 141.201.183.207

you can chain on object 
to get all information about user like this

dd($userInfo->getUserInfo());

result : Abdullah\UserGeoLocation\GeoLocation {#281 ▼
  -Service_url: "http://ip-api.com/php/"
  -USER_IP: "41.46.3.168"
  -Query: "status,message,continent,continentCode,country,countryCode,region,regionName,city,district,zip,lat,lon,timezone,offset,currency,isp,org,as,asname,reverse,mobile,proxy,hosting,query ◀"
  -USER_INFO: array:24 [▼
    "status" => "success"
    "continent" => "Africa"
    "continentCode" => "AF"
    "country" => "Egypt"
    "countryCode" => "EG"
    "region" => "C"
    "regionName" => "Cairo Governorate"
    "city" => "Cairo"
    "district" => ""
    "zip" => ""
    "lat" => 30.0**
    "lon" => 31.28**
    "timezone" => "Africa/Cairo"
    "offset" => 7200
    "currency" => "EGP"
    "isp" => "TE Data"
    "org" => ""
    "as" => "AS8452 TE-AS"
    "asname" => "TE-AS"
    "reverse" => "host-41.4**.3.1**.tedata.net"
    "mobile" => false
    "proxy" => false
    "hosting" => false
    "query" => "4*.4*.3.1**"
  ]
}

you can get spacific value from response 
like this 

dd($userInfo->getUserSpecificValue('country'));

result : "Egypt"

or you can give it array and its work too
like this 

dd($userInfo->getUserSpecificValue(['country','city']));

result : array:2 [▼
  "country" => "Egypt"
  "city" => "Cairo"
]

you can change defult Query info about user to what you need 
as you like you can publish and change Query 
and you can also use it like string or array
first publish config dont forget

and change it from : 

 return [
    'Query' => 'status,message,continent,continentCode,country,countryCode,region,regionName,city,district,zip,lat,lon,timezone,offset,currency,isp,org,as,asname,reverse,mobile,proxy,hosting,query',
    'ServiceUrl' => 'http://ip-api.com/php/',
 ];

to (if you want city only for every user):

 return [
    'Query' => 'city',
    'ServiceUrl' => 'http://ip-api.com/php/',
 ];
 
 or like this array : 
 
  return [
    'Query' => ['status','message'],
    'ServiceUrl' => 'http://ip-api.com/php/',
 ];

to publish : php artisan vendor:publish 
and choose package to publish it

pakcage also auto-discovery

## Contribute!!

You are very welcomed if You want to Contribute 🥳 on that, And this is How :

- Fork The Repo.📂
- Create Your new Solution in a Class with The existing Name + your Name + your email . 🚀

## License
MIT

** its for free usage you can fork it and enjoy **
