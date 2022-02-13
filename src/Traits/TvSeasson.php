<?php

namespace Josh996\TmdbApi\Traits;

trait TvSeasson
{
    public function getTvSeasson($id, $seasson, $opt = [])
    {
        $append = [
            "query" => [
                'append_to_response' => config('tmdb.append_to_response')
            ]
        ];

        return $this->getData("GET", self::TV."/".$id."/season/".$seasson, array_merge_recursive($append, $opt));
    }
}
