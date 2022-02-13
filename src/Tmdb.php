<?php

namespace Josh996\TmdbApi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Message;

class Tmdb
{
    public $isArray = true;

    public function __construct()
    {

    }

    public function movie($id)
    {
        return new Movie($id);
    }

    public function toObject () {
        $this->isArray = false;
        return $this;
    }
}