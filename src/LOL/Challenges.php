<?php

namespace Callisto\RiotApiWrapper\LOL;

use Callisto\RiotApiWrapper\Exceptions\RequestExceptions;
use Callisto\RiotApiWrapper\Regions;
use Callisto\RiotApiWrapper\Request\RequestHandler;

class Challenges
{
    /** @var string $basePath */
    protected string $basePath = '/lol/challenges/v1';

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
    public function challenges(): mixed
    {
        $path = $this->setPath('/challenges/config');
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function percentiles(): mixed
    {
        $path = $this->setPath('/challenges/percentiles');
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @param string $challengeId
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function challengeIdConfig(string $challengeId): mixed
    {
        $path = $this->setPath('/challenges/' . $challengeId . '/config');
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @param string $challengeId
     * @param string $level
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function leaderboardByLevel(string $challengeId, string $level): mixed
    {
        $path = $this->setPath('/challenges/' . $challengeId . '/leaderboards/by-level/' . $level);
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @param string $challengeId
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function percentilesByChallengeId(string $challengeId): mixed
    {
        $path = $this->setPath('/challenges/' . $challengeId . '/percentiles');
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @param string $puuid
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function playerData(string $puuid): mixed
    {
        $path = $this->setPath('/player-data/' . $puuid);
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