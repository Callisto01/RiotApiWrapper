<?php

require __DIR__ . '/../../vendor/autoload.php';

$raw = new \Callisto\RiotApiWrapper\RiotApiWrapper('YOUR_API_KEY'); //Init RiotApiWrapper
$raw->Cache(); // (Optional) Enable cache.


// (Optional) Request options
$options = [
    'startTime' => strtotime('01/01/2023'), // (Optional) timestamp (seconds). Before this date, matches won't be included in result.
    'endTime'   => strtotime('now'), // (Optional) timestamp (seconds). After this date, matches won't be included in result.
    'queue'     => 400, // (Optional) queue id.
    'type'      => 'normal', // (Optional) match type
    'start'     => 0, // (Optional) Start index
    'count'     => 20, // (Optional) max results count
];

try {

    $matchesIds = $raw->LOL()->Matches('EUROPE')->ids('PUUID',$options); // Return matches ids list

    foreach ($matchesIds as $matchId){
        $matches[] = $raw->LOL()->Matches('EUROPE')->match($matchId); // Return match datas from match id
    }

    print_r($matches);

}Catch(Exception $exception){
    exit($exception->getMessage());
}Catch(\Callisto\RiotApiWrapper\Exceptions\RequestExceptions $exception){
    exit($exception->getMessage());
}