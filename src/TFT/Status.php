<?php

namespace Callisto\RiotApiWrapper\TFT;

use Callisto\RiotApiWrapper\Exceptions\RequestExceptions;
use Callisto\RiotApiWrapper\Regions;
use Callisto\RiotApiWrapper\Request\RequestHandler;
use Callisto\RiotApiWrapper\TFT\Options\MatchesOPT;

class Status
{
    /** @var string $basePath */
    protected string $basePath = '/tft/status/v1';

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
    public function platformData(): mixed
    {
        $path = $this->setPath('/platform-data');
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