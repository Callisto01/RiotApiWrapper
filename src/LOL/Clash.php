<?php

namespace Callisto\RiotApiWrapper\LOL;

use Callisto\RiotApiWrapper\Exceptions\RequestExceptions;
use Callisto\RiotApiWrapper\Regions;
use Callisto\RiotApiWrapper\Request\RequestHandler;

class Clash
{
    /** @var string $basePath */
    protected string $basePath = '/lol/clash/v1';

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
     * @param string $puuid
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function byPuuid(string $puuid): mixed
    {
        $path = $this->setPath('/players/by-puuid/' . $puuid);
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @param string $summonerId
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function bySummoner(string $summonerId): mixed
    {
        $path = $this->setPath('/players/by-summoner/' . $summonerId);
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @param string $teamId
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function team(string $teamId): mixed
    {
        $path = $this->setPath('/teams/' . $teamId);
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function tournaments(): mixed
    {
        $path = $this->setPath('/tournaments');
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @param string $teamId
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function tournamentsByTeam(string $teamId): mixed
    {
        $path = $this->setPath('/tournaments/by-team/' . $teamId);
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @param string $tournamentId
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function tournamentsById(string $tournamentId): mixed
    {
        $path = $this->setPath('/tournaments/' . $tournamentId);
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