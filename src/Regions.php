<?php

namespace Callisto\RiotApiWrapper;

class Regions
{

    protected static $allowedPlatforms = ['BR1','EUN1','EUW1','JP1','KR','LA1','LA2','NA1','OC1','TR1','RU','PH2','SG2','TH2','TW2','VN2'];

    protected static $allowedRegions = ['AMERICAS','ASIA','EUROPE','SEA'];

    public static function getPlatformPath(string $code): string
    {
        if(!in_array($code,self::$allowedPlatforms)){
            throw new \Exception('Selected platform (' . $code . ') not allowed. Allowed platforms : ' . implode(',', self::$allowedPlatforms));
        }

        return strtolower($code).'.api.riotgames.com';
    }

    public static function getRegionPath(string $code): string
    {
        if(!in_array($code,self::$allowedRegions)){
            throw new \Exception('Selected region (' . $code . ') not allowed. Allowed regions : ' . implode(',', self::$allowedRegions));
        }

        return strtolower($code).'.api.riotgames.com';
    }
}