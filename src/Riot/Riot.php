<?php

namespace Callisto\RiotApiWrapper\Riot;

use Callisto\RiotApiWrapper\Request\RequestHandler;
use Callisto\RiotApiWrapper\RiotApiWrapper;
use Callisto\RiotApiWrapper\Riot\Account;
use Symfony\Component\HttpClient\CachingHttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Riot
{

    protected RequestHandler $requestHandler;

    public function __construct(RequestHandler $requestHandler){
        $this->requestHandler = $requestHandler;
    }

    /**
     * @param string $region
     * @return \Callisto\RiotApiWrapper\Riot\Account
     */
    public function Account(string $region) :Account
    {
        return (new Account($this->requestHandler,$region));
    }
}