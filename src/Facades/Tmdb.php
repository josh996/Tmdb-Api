<?php

namespace Josh996\TmdbApi\Facades;

use Illuminate\Support\Facades\Facade;

class Tmdb extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'josh996.tmdb';
    }
}