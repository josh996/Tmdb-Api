# Tmdb-Api
 Laravel Package for TMDB API

# Installing
```bash
composer require "josh996/tmdb-api"
```

# Publish config file
```bash
php artisan vendor:publish --provider="Josh996\TmdbApi\TmdbApiProvider"
```

# How To Use

Search movie details:
```php
use Josh996\TmdbApi\Facades\Tmdb;

$movie = Tmdb::movie(557);
return $movie->get();
```
or
```php
use Josh996\TmdbApi\Facades\Tmdb;

return Tmdb::movie(557)->get();
```