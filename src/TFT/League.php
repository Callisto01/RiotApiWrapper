<?php

namespace Callisto\RiotApiWrapper\TFT;

use Callisto\RiotApiWrapper\Exceptions\RequestExceptions;
use Callisto\RiotApiWrapper\Regions;
use Callisto\RiotApiWrapper\Request\RequestHandler;
use Callisto\RiotApiWrapper\TFT\Options\LeagueOPT;

class League
{
    /** @var string $basePath */
    protected string $basePath = '/tft/league/v1';

    /** @var RequestHandler $requestHandler */
    protected RequestHandler $requestHandler;

    /** @var string $platform */
    protected string $platform;

    /**
     * @param RequestHandler $requestHandler
     * @param string $platform
     */
    public function __construct(RequestHandler $requestHandler, string $platform)
    {
        $this->requestHandler = $requestHandler;
        $this->platform = $platform;
    }

    /**
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function challenger(): mixed
    {
        $path = $this->setPath('/challenger');
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @param string $summonerId
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function bySummonerId(string $summonerId): mixed
    {
        $path = $this->setPath('/entries/by-summoner/' . $summonerId);
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @param string $tier
     * @param string $division
     * @param array $options
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function byTierAndDivision(string $tier, string $division, array $options = []): mixed
    {
        $path = $this->setPath('/entries/' . $tier . '/' . $division . LeagueOPT::byTierAndDivision($options));
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function grandmaster(): mixed
    {
        $path = $this->setPath('/grandmaster');
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @param string $leagueId
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function byLeagueId(string $leagueId): mixed
    {
        $path = $this->setPath('/leagues/' . $leagueId);
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function master(): mixed
    {
        $path = $this->setPath('/master');
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @param string $queue
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function topByQueue(string $queue): mixed
    {
        $path = $this->setPath('/rated-ladders/' . $queue . '/top');
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @param string $subPath
     * @return string
     * @throws \Exception
     */
    private function setPath(string $subPath = ''): string
    {
        $baseUri = Regions::getPlatformPath($this->platform);
        return 'https://' . $baseUri . $this->basePath . $subPath;
    }
}