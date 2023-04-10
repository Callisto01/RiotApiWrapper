<?php

namespace Callisto\RiotApiWrapper\LOL;

use Callisto\RiotApiWrapper\Exceptions\RequestExceptions;
use Callisto\RiotApiWrapper\Regions;
use Callisto\RiotApiWrapper\Request\RequestHandler;

class League
{
    /** @var string $basePath */
    protected string $basePath = '/lol/league/v4';

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
     * @param string $queue
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function byQueue(string $queue): mixed
    {
        $path = $this->setPath('/challengerleagues/by-queue/' . $queue);
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
     * @param string $queue
     * @param string $tier
     * @param string $division
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function byQueueTierDivision(string $queue, string $tier, string $division): mixed
    {
        $path = $this->setPath('/entries/' . $queue . '/' . $tier . '/' . $division);
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @param string $queue
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function grandMasterLeagues(string $queue): mixed
    {
        $path = $this->setPath('/grandmasterleagues/by-queue/' . $queue);
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @param string $leagueId
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function leagueId(string $leagueId): mixed
    {
        $path = $this->setPath('/leagues/' . $leagueId);
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @param string $queue
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function masterLeagues(string $queue): mixed
    {
        $path = $this->setPath('/masterleagues/by-queue/' . $queue);
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