<?php

namespace Josh996\TmdbApi;

class Tmdb
{
    public function __construct()
    {

    }

    public function movie($id)
    {
        return new Movie($id);
    }
}