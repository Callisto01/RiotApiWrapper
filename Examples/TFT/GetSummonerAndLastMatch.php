<?php

// Get summoner and last match

require __DIR__ . '/../../vendor/autoload.php';

$raw = new \Callisto\RiotApiWrapper\RiotApiWrapper('YOUR_API_KEY'); //Init RiotApiWrapper
$raw->Cache(); // (Optional) Enable cache.

try {

    $summoner = $raw->TFT()->Summoner('EUW1')->byName('NAME'); // Get {NAME} summoner data

    $options = [
        'count' => 1, // (Optional) max results count
    ];

    $lastMatchId = $raw->TFT()->Matches('EUROPE')->ids($summoner['puuid'],$options)[0]; // Get last match id

    $lastMatch = $raw->TFT()->Matches('EUROPE')->match($lastMatchId); // Get $lastMatchId match data

    print_r($lastMatch);

} catch (Exception $exception) {
    exit($exception->getMessage());
} catch (\Callisto\RiotApiWrapper\Exceptions\RequestExceptions $exception) {
    exit($exception->getMessage());
}