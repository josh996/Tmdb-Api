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

# Usage for movie
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

# Usage for TV, Season & Episode
```php
use Josh996\TmdbApi\Facades\Tmdb;

$tv = Tmdb::tv($id)->get();
$season = Tmdb::tv($id)->season($season)->get();
$episode = Tmdb::tv($id)->season($season)->episode($episode)->get();
```