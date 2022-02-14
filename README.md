# Tmdb-Api
 Laravel Package for TMDB API

# Installing
    composer require "josh996/tmdb-api

# Publish config file
    php artisan vendor:publish --provider="Josh996\TmdbApi\TmdbApiProvider"

# How To Use

## Search movie details:
```
$movie = Tmdb::movie(557);
return $movie->get();
```
or
```
return Tmdb::movie(557)->get();
```