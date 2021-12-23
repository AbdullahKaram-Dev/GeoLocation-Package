<?php

namespace Abdullah\UserGeoLocation;

use Abdullah\UserGeoLocation\GeoLocationInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use http\Exception;

class GeoLocation implements GeoLocationInterface
{
    private $Service_url;
    private $USER_IP;
    private $Query;
    private $USER_INFO;

    public function __construct(string $user_ip)
    {
        $this->Service_url = config('GeoLocation.ServiceUrl');
        $this->Query       = config('GeoLocation.Query');
        $this->USER_IP     = $user_ip;
        $this->connectServiceGetInfo();
    }

    public function getUserIP(): string
    {
        return $this->USER_IP;
    }

    public function getUserInfo(): array
    {
        return $this->USER_INFO;
    }

    public function getUserSpecificValue($specificValue)
    {
        if (is_array($specificValue)){
            $this->checkQueryValidArray($specificValue);
            $this->getValues($specificValue);
        }elseif (is_string($specificValue)){
            $this->checkQueryValidString($specificValue);
            return (isset($this->USER_INFO[$specificValue])) ? $this->USER_INFO[$specificValue] : null;
        }
       return $this->USER_INFO;
    }

    public function getValues($specificValue)
    {
        $newValue = [];
        foreach ($specificValue as $value){

            (isset($this->USER_INFO[$value])) ? $newValue[$value] = $this->USER_INFO[$value] : $newValue[$value] = null;
        }
        return $this->USER_INFO = $newValue;
    }

    private function connectServiceGetInfo()
    {
        if (is_string($this->Query) && !empty($this->Query))
            $this->checkQueryValidString($this->Query);
        elseif (is_array($this->Query) && !empty($this->Query))
            $this->checkQueryValidArray($this->Query);

        try {
            $client = new Client(['base_uri' => $this->Service_url]);
            $response = $client->request('GET', $this->USER_IP, [
                'query' => [
                    'fields' => $this->Query,
                ]
            ]);
            $this->USER_INFO = unserialize($response->getBody());
        }catch (GuzzleException $guzzleException){

            throw new \Exception('opps '. $guzzleException->getMessage());
        }

    }

    private function validQuery(): array
    {
        return [
            'status', 'query', 'hosting', 'proxy',
            'mobile', 'reverse', 'asname', 'as',
            'org', 'isp', 'currency', 'offset',
            'timezone', 'lon', 'lat', 'zip',
            'district', 'city', 'regionName', 'region',
            'countryCode', 'country', 'continentCode', 'continent',
            'message'
        ];

    }

    private function checkQueryValidString($Query)
    {
        $itemsQuery = explode(',', $Query);
        foreach ($itemsQuery as $item) {
            if (!in_array($item, $this->validQuery()))
                throw new \Exception('Invalid query item ' . $item);
        }
    }

    private function checkQueryValidArray($Query)
    {
        foreach ($Query as $item) {
            if (!in_array($item, $this->validQuery()))
                throw new \Exception('Invalid query item ' . $item);
        }
        $this->Query = implode(',',$Query);
    }


}
