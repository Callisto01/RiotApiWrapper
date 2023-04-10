<?php

namespace Callisto\RiotApiWrapper\LOL;

use Callisto\RiotApiWrapper\LOL\ChampionMastery;
use Callisto\RiotApiWrapper\LOL\Champion;
use Callisto\RiotApiWrapper\LOL\Clash;
use Callisto\RiotApiWrapper\LOL\LeagueExp;
use Callisto\RiotApiWrapper\LOL\League;
use Callisto\RiotApiWrapper\LOL\Challenges;
use Callisto\RiotApiWrapper\LOL\Status;
use Callisto\RiotApiWrapper\LOL\Matches;
use Callisto\RiotApiWrapper\LOL\Spectator;
use Callisto\RiotApiWrapper\LOL\Summoner;
use Callisto\RiotApiWrapper\Request\RequestHandler;

class LOL
{

    protected RequestHandler $requestHandler;

    /**
     * @param RequestHandler $requestHandler
     */
    public function __construct(RequestHandler $requestHandler){
        $this->requestHandler = $requestHandler;
    }

    /**
     * @param string $platform
     * @return \Callisto\RiotApiWrapper\LOL\ChampionMastery
     */
    public function ChampionMastery(string $platform) :ChampionMastery
    {
        return (new ChampionMastery($this->requestHandler,$platform));
    }

    /**
     * @param string $platform
     * @return \Callisto\RiotApiWrapper\LOL\Champion
     */
    public function Champion(string $platform): Champion
    {
        return (new Champion($this->requestHandler,$platform));
    }

    /**
     * @param string $platform
     * @return \Callisto\RiotApiWrapper\LOL\Clash
     */
    public function Clash(string $platform): Clash
    {
        return (new Clash($this->requestHandler,$platform));
    }

    /**
     * @param string $platform
     * @return \Callisto\RiotApiWrapper\LOL\LeagueExp
     */
    public function LeagueExp(string $platform): LeagueExp
    {
        return (new LeagueExp($this->requestHandler,$platform));
    }

    /**
     * @param string $platform
     * @return \Callisto\RiotApiWrapper\LOL\League
     */
    public function League(string $platform): League
    {
        return (new League($this->requestHandler,$platform));
    }

    /**
     * @param string $platform
     * @return \Callisto\RiotApiWrapper\LOL\Challenges
     */
    public function Challenges(string $platform): Challenges
    {
        return (new Challenges($this->requestHandler,$platform));
    }

    /**
     * @param string $platform
     * @return \Callisto\RiotApiWrapper\LOL\Status
     */
    public function Status(string $platform): Status
    {
        return (new Status($this->requestHandler,$platform));
    }

    /**
     * @param string $region
     * @return \Callisto\RiotApiWrapper\LOL\Matches
     */
    public function Matches(string $region): Matches
    {
        return (new Matches($this->requestHandler,$region));
    }

    /**
     * @param string $platform
     * @return \Callisto\RiotApiWrapper\LOL\Spectator
     */
    public function Spectator(string $platform): Spectator
    {
        return (new Spectator($this->requestHandler,$platform));
    }

    /**
     * @param string $platform
     * @return \Callisto\RiotApiWrapper\LOL\Summoner
     */
    public function Summoner(string $platform): Summoner
    {
        return (new Summoner($this->requestHandler,$platform));
    }

    //TODO Tournament STUB
    //TODO Tournament
}