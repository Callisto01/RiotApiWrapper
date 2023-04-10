<?php

namespace Callisto\RiotApiWrapper\LOL;

use Callisto\RiotApiWrapper\Exceptions\RequestExceptions;
use Callisto\RiotApiWrapper\Regions;
use Callisto\RiotApiWrapper\Request\RequestHandler;

class Summoner
{
    /** @var string $basePath */
    protected string $basePath = '/lol/summoner/v4';

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
     * @param string $accountId
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function byAccount(string $accountId): mixed
    {
        $path = $this->setPath('/summoners/by-account/' . $accountId);
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @param string $summonerName
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function byName(string $summonerName): mixed
    {
        $path = $this->setPath('/summoners/by-name/' . $summonerName);
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @param string $puuid
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function byPuuid(string $puuid): mixed
    {
        $path = $this->setPath('/summoners/by-puuid/' . $puuid);
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
        $path = $this->setPath('/summoners/' . $summonerId);
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