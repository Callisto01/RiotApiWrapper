
# RAW (RiotApiWrapper)



RAW (RiotApiWrapper) is a PHP project designed to provide a wrapper for the Riot Games API, allowing developers to easily access the data and services offered by the API. With this wrapper, users can access the API through simple and intuitive PHP code, without needing to worry about the underlying technical details of the API.

Our goal is to make the Riot Games API accessible to as many people as possible, regardless of their technical background or level of expertise. By simplifying the interface and providing clear documentation, RAW enables a wider range of developers to take advantage of the wealth of data and services available through the Riot Games API.

Using Composer to manage dependencies, RAW is designed to be easy to install and integrate into any PHP project. Whether you're building a new application from scratch or adding new features to an existing project, RAW will make it easy to incorporate the Riot Games API into your code.

So if you're looking for a simple and reliable way to work with the Riot Games API, look no further than RAW. With clear documentation, intuitive code, and support for Composer, RAW is the perfect choice for anyone looking to get the most out of the Riot Games API.

| Riot API    | LoL API     | TFT API             | LORT API            | Valorant API        |
|:------------|:------------|:--------------------|:--------------------|:--------------------|
| ✅ Available | ✅ Available | 🚧 Work in Progress | 🚧 Work in progress | 🚧 Work in progress |    

Vote for next update priority : [https://strawpoll.com/polls/poy9W4MrJgJ](https://strawpoll.com/polls/poy9W4MrJgJ)

## Deployment

To install this project run

```bash
  composer require callisto/riot-api-wrapper
```

**RAW requires Symfony 6.2 or later and php 8.0 or later**
## Usage

```php
$raw = new \Callisto\RiotApiWrapper\RiotApiWrapper('YOUR_API_KEY');
```
To get your api key, create an account on Riot's developer portal. Then, go to the dashboard and click on the button to generate a development key.
To get a permanent key, register your application on the Riot Games developer site and wait for approval. Once approved, you can access Riot's API with your permanent API key.

[https://developer.riotgames.com/](https://developer.riotgames.com/)

```php
$summoner = $raw->LOL('EUW1')->Summoner()->byName('NAME');
```

## References

You can see the original Riot api documentation here : [https://developer.riotgames.com/apis](https://developer.riotgames.com/apis)

### Platforms and regions list
Platforms list
```php
['BR1','EUN1','EUW1','JP1','KR','LA1','LA2','NA1','OC1','TR1','RU','PH2','SG2','TH2','TW2','VN2']
```
Regions list
```php
['AMERICAS','ASIA','EUROPE','SEA']
```

### Wrapper References
### Riot

```php
// Riot/Account

- Riot()->Account(string $region)->byPuuid(string $puuid)
- Riot()->Account(string $region)->byGame(string $game, string $puuid)
```

### LOL
```php
// LOL/ChampionMastery

- LOL()->ChampionMastery(string $platform)->bySummoner(string $encryptedSummonerId)
- LOL()->ChampionMastery(string $platform)->byChampion(string $encryptedSummonerId, string $championId)
- LOL()->ChampionMastery(string $platform)->top(string $encryptedSummonerId)
- LOL()->ChampionMastery(string $platform)->scores(string $encryptedSummonerId)
```
```php
// LOL/ChampionMastery

- LOL()->Champion(string $platform)->rotations()
```
```php
// LOL/Clash

- LOL()->Clash(string $platform)->byPuuid(string $puuid)
- LOL()->Clash(string $platform)->bySummoner(string $summonerId)
- LOL()->Clash(string $platform)->team(string $teamId)
- LOL()->Clash(string $platform)->tournaments()
- LOL()->Clash(string $platform)->tournamentsByTeam(string $teamId)
- LOL()->Clash(string $platform)->tournamentsById(string $tournamentId)
```
```php
// LOL/LeagueExp

- LOL()->LeagueExp(string $platform)->exp(string $queue, string $tier, string $division)
```
```php
// LOL/League

- LOL()->League(string $platform)->byQueue(string $queue)
- LOL()->League(string $platform)->bySummonerId(string $summonerId)
- LOL()->League(string $platform)->byQueueTierDivisionstring $queue, string $tier, string $division)
- LOL()->League(string $platform)->grandMasterLeagues(string $queue)
- LOL()->League(string $platform)->leagueId(string $leagueId)
- LOL()->League(string $platform)->masterLeagues(string $queue)
```
```php
// LOL/Challenges

- LOL()->Challenges(string $platform)->challenges()
- LOL()->Challenges(string $platform)->percentiles()
- LOL()->Challenges(string $platform)->challengeIdConfig(string $challengeId)
- LOL()->Challenges(string $platform)->leaderboardByLevel(string $challengeId, string $level)
- LOL()->Challenges(string $platform)->percentilesByChallengeId(string $challengeId)
- LOL()->Challenges(string $platform)->playerData(string $puuid)
```
```php
// LOL/Status

- LOL()->Status(string $platform)->status()
```
```php
// LOL/Matches

- LOL()->Status(string $region)->ids(string $puuid, array $options = [])
- LOL()->Status(string $region)->match(string $matchId)
- LOL()->Status(string $region)->timeline(string $matchId)
```
```php
// LOL/Spectator

- LOL()->Spectator(string $platform)->activeGames(string $summonerId)
- LOL()->Spectator(string $platform)->featuredGames()
```
```php
// LOL/Summoner

- LOL()->Summoner(string $platform)->byAccount(string $accountId)
- LOL()->Summoner(string $platform)->byName(string $summonerName)
- LOL()->Summoner(string $platform)->byPuuid(string $puuid)
- LOL()->Summoner(string $platform)->bySummonerId(string $summonerId)
```
#### TFT
🚧 Work in Progress
#### LORT
🚧 Work in Progress
#### Valorant
🚧 Work in Progress

## Exemples

```php

// Get recent LoL matches exemple

require __DIR__ . '/../../vendor/autoload.php';

$raw = new \Callisto\RiotApiWrapper\RiotApiWrapper('YOUR_API_KEY'); // Init RiotApiWrapper
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
```

```php
// Search summoner

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
```

## Contributing

Contributions are welcome! If you find a bug or have a feature request, please open an issue.
## License

RAW is open-source software licensed under the [MIT](https://choosealicense.com/licenses/mit/) license. 

