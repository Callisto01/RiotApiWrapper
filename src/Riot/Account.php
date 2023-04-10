<?php

namespace Callisto\RiotApiWrapper\Riot;

use Callisto\RiotApiWrapper\Exceptions\RequestExceptions;
use Callisto\RiotApiWrapper\Regions;
use Callisto\RiotApiWrapper\Request\RequestHandler;
use http\Encoding\Stream;
use Symfony\Component\HttpClient\CachingHttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Account
{

    /** @var string $basePath */
    protected string $basePath = '/riot/account/v1';

    /** @var RequestHandler $requestHandler */
    protected RequestHandler $requestHandler;

    /** @var string $region */
    protected string $region;

    /**
     * @param RequestHandler $requestHandler
     * @param string $region
     */
    public function __construct(RequestHandler $requestHandler, string $region)
    {
        $this->requestHandler = $requestHandler;
        $this->region = $region;
    }

    /**
     * @param string $puuid
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function byPuuid(string $puuid): mixed
    {
        $path = $this->setPath('/accounts/by-puuid/' . $puuid);
        return $this->requestHandler->getResponse($path);
    }


    /**
     * @param string $game
     * @param string $puuid
     * @return mixed
     * @throws RequestExceptions
     * @throws \Exception
     */
    public function byGame(string $game,string $puuid): mixed
    {
        $path = $this->setPath('/active-shards/by-game/' . $game . '/by-puuid/' . $puuid);
        return $this->requestHandler->getResponse($path);
    }

    /**
     * @param string $subPath
     * @return string
     * @throws \Exception
     */
    private function setPath(string $subPath = ''): string
    {
        $baseUri = Regions::getRegionPath($this->region);
        return 'https://' . $baseUri . $this->basePath . $subPath;
    }
}