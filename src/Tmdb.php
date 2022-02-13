<?php

namespace Josh996\TmdbApi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Message;
use Josh996\TmdbApi\Traits\Movie;
use Josh996\TmdbApi\Traits\Tv;
use Josh996\TmdbApi\Traits\TvEpisode;
use Josh996\TmdbApi\Traits\TvSeasson;

class Tmdb
{
    use Movie, Tv, TvSeasson, TvEpisode;
    
    const ENDPOINT = "https://api.themoviedb.org/";
    const MOVIE = '/movie';
    const VERSION = "/3";
    const TV = '/tv';

    public $isArray = true;

    public function __construct()
    {

    }

    public function getData($method = "GET", $url, $opt = []) 
    {
        $query = [
            "query" => [
                "api_key" => config('tmdb.api_key'),
                'language' => config('tmdb.language')
            ]
        ];

        $url = $url;
        if (is_array($url)) {
            $converUrl = '';
            for ($i=0; $i < count($url); $i++) {
                $converUrl .= $url.'/';
            }
            $url = ltrim($converUrl, '/');
        }

        dump($url);
        
        $client = new Client([
            'base_uri' => self::ENDPOINT,
            'timeout'  => 2,
        ]);

        try {
            $request = $client->request($method, self::VERSION.$url, array_merge_recursive($query, $opt));
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