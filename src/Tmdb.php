<?php

namespace Josh996\TmdbApi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Message;
use Josh996\TmdbApi\Traits\Movie;

class Tmdb
{
    use Movie;
    
    const ENDPOINT = "https://api.themoviedb.org/";
    const MOVIE = '/movie';
    const VERSION = "/3";
    const TV = '/tv';

    public $isArray = true;

    public function __construct()
    {

    }

    public function getData($method = "GET", $type, $opt = []) 
    {
        $query = [
            "query" => [
                "api_key" => config('tmdb.api_key'),
                'language' => config('tmdb.language')
            ]
        ];
        $client = new Client([
            'base_uri' => self::ENDPOINT,
            'timeout'  => 2,
        ]);

        try {
            $request = $client->request($method, self::VERSION.$type, array_merge_recursive($query, $opt));
            $data = json_decode($request->getBody(), $this->isArray);
        } catch (ClientException $e) {
            $data = json_decode(Message::bodySummary($e->getResponse()), $this->isArray);
        }

        return $data;
    }

    public function toObject () {
        $this->isArray = false;
        return $this;
    }
}