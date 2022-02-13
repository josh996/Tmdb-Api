<?php

namespace Josh996\TmdbApi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Message;

class GetData
{
    protected $client, $endpoint;
    public $data, $isArray = true;

    public function __construct($verify = true)
    {
        $this->client = new Client([
            'base_uri' => 'https://api.themoviedb.org',
            'timeout'  => 2,
            'verify' => $verify
        ]);
    }

    public function request($method = 'GET', $uri = '', array $options = [])
    {
        $query = [
            "query" => [
                "api_key" => config('tmdb.api_key'),
                'language' => config('tmdb.language')
            ]
        ];

        try {
            $request = $this->client->request($method, $uri, array_merge_recursive($query, $options));
            $data = $request->getBody();
        } catch (ClientException $e) {
            $data = Message::bodySummary($e->getResponse());
        }

        return $data;
    }

    public function toObject()
    {
        $this->isArray = false;
        return $this;
    }
}