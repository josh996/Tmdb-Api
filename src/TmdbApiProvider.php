<?php

namespace Josh996\TmdbApi;

use Illuminate\Support\ServiceProvider;

class TmdbApiProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/tmdb.php' => config_path('tmdb.php'),
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/tmdb.php', 'tmdb'
        );
    }
}