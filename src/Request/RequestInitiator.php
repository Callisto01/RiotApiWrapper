<?php

namespace Callisto\RiotApiWrapper\Request;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class RequestInitiator
{
    /** @var HttpClient|HttpClientInterface $client */
    protected HttpClient|HttpClientInterface $client;

    public function __construct(){
        $this->setClient();
    }

    private function setClient(): void
    {
        $this->client = HttpClient::create();
    }

    public function getClient(): HttpClient|HttpClientInterface
    {
       return $this->client;
    }
}