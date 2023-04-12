<?php

$name = 'example'; // Summoner name to search

$raw = new \Callisto\RiotApiWrapper\RiotApiWrapper('YOUR_API_KEY'); // Init RiotApiWrapper
$raw->Cache(); // (Optional) Enable cache.

$searchPlatform =  ['BR1','EUN1','EUW1','JP1','KR','LA1','LA2']; // Select platforms you want to search on

try {

    foreach ($searchPlatform as $platform){
        $results[$platform] = $raw->LOL()->Summoner($platform)->byName($name); // Save result even if empty
    }

}catch (\Callisto\RiotApiWrapper\Exceptions\RequestExceptions $exception){
    exit($exception->getMessage());
} catch (Exception $e) {
    exit($e->getMessage());
}


print_r($results);