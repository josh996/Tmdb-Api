<?php

namespace Josh996\TmdbApi\Traits;

trait Tv
{
    public function getTv($id, $opt = [])
    {
        $append = [
            "query" => [
                'append_to_response' => config('tmdb.append_to_response')
            ]
        ];

        return $this->getData("GET", self::TV."/".$id, array_merge_recursive($append, $opt));
    }
}