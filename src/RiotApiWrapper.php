<?php

namespace Callisto\RiotApiWrapper;

use Callisto\RiotApiWrapper\LOL\LOL;
use Callisto\RiotApiWrapper\Request\RequestCache;
use Callisto\RiotApiWrapper\Request\RequestHandler;
use Callisto\RiotApiWrapper\Request\RequestInitiator;
use Callisto\RiotApiWrapper\Riot\Riot;
use Callisto\RiotApiWrapper\TFT\TFT;
use Symfony\Component\HttpClient\CachingHttpClient;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class RiotApiWrapper
{

    /** @var string|null $apiKey */
    protected $apiKey = null;

    protected $client;

    /** @var RequestInitiator $handler */
    private RequestInitiator $handler;

    /** @var RequestCache|null $cache */
    private RequestCache|null $cache = null;

    /**
     * @param string $riotKey
     */
    public function __construct(string $riotKey){
        $this->apiKey = $riotKey;
        $this->handler = $this->RequestInitiator();
        $this->client = $this->handler->getClient();
    }

    /**
     * @return RequestCache
     */
    public function Cache(): RequestCache
    {
        $this->cache = $this->RequestCache($this->client);
        return $this->cache;
    }

    /**
     * @return Riot
     */
    public function Riot(): Riot
    {
        return (new Riot(new RequestHandler($this->getClient(),$this->apiKey)));
    }

    /**
     * @return LOL
     */
    public function LOL(): LOL
    {
        return (new LOL(new RequestHandler($this->getClient(),$this->apiKey)));
    }

    /**
     * @return TFT
     */
    public function TFT(): TFT
    {
        return (new TFT(new RequestHandler($this->getClient(),$this->apiKey)));
    }


    /**
     * @return CachingHttpClient|HttpClient|HttpClientInterface
     */
    private function getClient(){
        if($this->cache){
            return $this->cache->getClient();
        }

        return $this->client;
    }

    /**
     * @return RequestInitiator
     */
    private function RequestInitiator(): RequestInitiator
    {
        return (new RequestInitiator());
    }

    /**
     * @param HttpClientInterface|HttpClient $client
     * @return RequestCache
     */
    private function RequestCache(HttpClientInterface|HttpClient $client): RequestCache
    {
        return (new RequestCache($client));
    }


}