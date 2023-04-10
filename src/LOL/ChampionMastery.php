<?php

namespace Callisto\RiotApiWrapper\LOL;

use Callisto\RiotApiWrapper\Exceptions\RequestExceptions;
use Callisto\RiotApiWrapper\Regions;
use Callisto\RiotApiWrapper\Request\RequestHandler;

class ChampionMastery
{

    /** @var string $basePath */
    protected string $basePath = '/lol/champion-mastery/v4';

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
     * @param string $encryptedSummonerId
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function bySummoner(string $encryptedSummonerId): mixed
    {
        $path = $this->setPath('/champion-masteries/by-summoner/' . $encryptedSummonerId);
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @param string $encryptedSummonerId
     * @param string $championId
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function byChampion(string $encryptedSummonerId, string $championId): mixed
    {
        $path = $this->setPath('/champion-masteries/by-summoner/' . $encryptedSummonerId . '/by-champion/' . $championId);
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @param string $encryptedSummonerId
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function top(string $encryptedSummonerId): mixed
    {
        $path = $this->setPath('/champion-masteries/by-summoner/' . $encryptedSummonerId . '/top');
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @param string $encryptedSummonerId
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function scores(string $encryptedSummonerId): mixed
    {
        $path = $this->setPath('/scores/by-summoner/' . $encryptedSummonerId);
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