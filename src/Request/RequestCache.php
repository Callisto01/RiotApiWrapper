<?php

namespace Callisto\RiotApiWrapper\Request;

use Symfony\Component\HttpClient\CachingHttpClient;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpClient\NativeHttpClient;
use Symfony\Component\HttpKernel\HttpCache\Store;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class RequestCache
{

    protected HttpClient|CachingHttpClient|NativeHttpClient $client;

    private Store $store;

    public function __construct(HttpClient|HttpClientInterface|NativeHttpClient $client){
        $this->client = $client;

        $this->setStore();

        $this->setCache();
    }

    public function getClient(): CachingHttpClient
    {
        return $this->client;
    }

    /**
     * @param string $path
     * @return void
     */
    public function setStore(string $path = '/cache'): void
    {
        $this->store = new Store($path);
    }

    public function cleanUp(): void
    {
        $this->store->cleanup();
    }

    protected function setCache(): void
    {
        $this->client = new CachingHttpClient($this->client,$this->store,);
    }
}