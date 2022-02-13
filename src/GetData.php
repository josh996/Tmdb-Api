<?php

namespace Josh996\TmdbApi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Message;

class GetData
{
    // const MOVIE = '/movie';
    // const VERSION = "/3";
    // const TV = '/tv';

    protected $client, $endpoint;
    public $data;

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
            $data = $request;
        } catch (ClientException $e) {
            $data = Message::bodySummary($e->getResponse());
        }

        $this->data = $data;
        return $this;
    }

    // public function getData($method = "GET", $url, $opt = []) 
    // {
    //     $query = [
    //         "query" => [
    //             "api_key" => config('tmdb.api_key'),
    //             'language' => config('tmdb.language')
    //         ]
    //     ];

    //     $url = $url;
    //     if (is_array($url)) {
    //         $convertUrl = '';
    //         for ($i=0; $i < count($url); $i++) {
    //             $convertUrl .= $url.'/';
    //         }
    //         $url = $convertUrl;
    //     }

    //     dd($url);
        
    //     $client = new Client([
    //         'base_uri' => self::ENDPOINT,
    //         'timeout'  => 2,
    //     ]);

    //     try {
    //         $request = $client->request($method, self::VERSION.$url, array_merge_recursive($query, $opt));
    //         $data = json_decode($request->getBody(), $this->isArray);
    //     } catch (ClientException $e) {
    //         $data = json_decode(), $this->isArray);
    //     }

    //     return $data;
    // }
}