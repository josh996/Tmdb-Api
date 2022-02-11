<?php

namespace Josh996\TmdbApi;

use GuzzleHttp\Client;

class Tmdb
{
    const ENDPOINT = "https://api.themoviedb.org/";
    const VERSION = "/3";
    const MOVIE = '/movie';
    const TV = '/tv';

    public function __construct()
    {
        # code...
    }

    public function getData($method = "GET", $type, $opt = []) 
    {
        $client = new Client([
            'base_uri' => self::ENDPOINT,
            'timeout'  => 2,
        ]);

        $request = $client->request($method, self::VERSION.$type, [
            "query" => [
                "api_key" => config('tmdb.api_key'),
                'language' => config('tmdb.language')
            ],
            $opt
        ]);

        return json_decode($request->getBody(), true);
    }
}