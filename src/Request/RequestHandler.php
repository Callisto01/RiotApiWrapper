<?php

namespace Callisto\RiotApiWrapper\Request;

use Callisto\RiotApiWrapper\Exceptions\RequestExceptions;
use Symfony\Component\HttpClient\CachingHttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class RequestHandler
{
    private HttpClientInterface|CachingHttpClient $client;

    private $request;

    private string $apiKey;

    public function __construct(HttpClientInterface|CachingHttpClient $client,string $apiKey){
        $this->client = $client;
        $this->apiKey = $apiKey;
    }

    public function getResponse(string $path, string $method = 'GET',bool $array = true){
        $request = $this->setRequest($path,$method);

        $content = $request->getArrayContent();

        $status = $request->getStatusCode();
        if($status!==200){
            throw new RequestExceptions($content['status']['message'],$content['status']['status_code']);
        }

        if($array){
            return $this->getArrayContent();
        }

        return $this->getContent();
    }

    private function setRequest(string $path, string $method = 'GET'): self
    {
        $this->request = $this->client->request($method,$path,[
           'headers' => [
               'X-Riot-Token' => $this->apiKey
           ]
        ]);

        return $this;
    }

    private function getStatusCode(){
        return $this->request->getStatusCode();
    }

    private function getContentType(){
        return $this->request->getHeaders()['content-type'][0];
    }

    public function getContent(){
        return $this->request->getContent();
    }

    public function getArrayContent(){
        return $this->request->toArray();
    }
}