<?php

namespace Josh996\TmdbApi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Message;

class Tmdb
{
    const ENDPOINT = "https://api.themoviedb.org/";
    const VERSION = "/3";
    const MOVIE = '/movie';
    const TV = '/tv';

    public $isArray = true;

    public function __construct()
    {

    }

    public function getMovie($id, $opt = [])
    {
        return $this->getData("GET", self::MOVIE."/".$id, $opt);
    }

    public function getData($method = "GET", $type, $opt = []) 
    {
        $client = new Client([
            'base_uri' => self::ENDPOINT,
            'timeout'  => 2,
        ]);

        try {
            $request = $client->request($method, self::VERSION.$type, [
                "query" => [
                    "api_key" => config('tmdb.api_key'),
                    'language' => config('tmdb.language'),
                    'append_to_response' => config('tmdb.append_to_response')
                ],
                $opt
            ]);
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