<?php

namespace Callisto\RiotApiWrapper\TFT;

use Callisto\RiotApiWrapper\TFT\League;
use Callisto\RiotApiWrapper\TFT\Matches;
use Callisto\RiotApiWrapper\TFT\Status;
use Callisto\RiotApiWrapper\TFT\Summoner;
use Callisto\RiotApiWrapper\Request\RequestHandler;

class TFT
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
     * @return \Callisto\RiotApiWrapper\TFT\League
     */
    public function League(string $platform): League
    {
        return (new League($this->requestHandler,$platform));
    }

    /**
     * @param string $region
     * @return \Callisto\RiotApiWrapper\TFT\Matches
     */
    public function Matches(string $region): Matches
    {
        return (new Matches($this->requestHandler,$region));
    }

    /**
     * @param string $platform
     * @return \Callisto\RiotApiWrapper\TFT\Status
     */
    public function Status(string $platform): Status
    {
        return (new Status($this->requestHandler,$platform));
    }

    /**
     * @param string $platform
     * @return \Callisto\RiotApiWrapper\TFT\Summoner
     */
    public function Summoner(string $platform): Summoner
    {
        return (new Summoner($this->requestHandler,$platform));
    }
}