<?php

namespace Josh996\TmdbApi\Traits;

trait Movie
{    
    public function getMovie($id, $opt = [])
    {
        return $this->getData("GET", self::MOVIE."/".$id, $opt);
    }

    public function getAlternativeTitles($id, $opt =[])
    {
        return $this->getData("GET", self::MOVIE."/".$id."/alternative_titles", [
            "query" => [
                'append_to_response' => config('tmdb.append_to_response')
            ]
        ]);
    }

    public function getCredits($id, $opt =[])
    {
        return $this->getData("GET", self::MOVIE."/".$id."/credits", $opt);
    }

    public function getExternalID($id, $opt =[])
    {
        return $this->getData("GET", self::MOVIE."/".$id."/external_ids", $opt);
    }

    public function getImages($id, $opt =[])
    {
        return $this->getData("GET", self::MOVIE."/".$id."/images", $opt);
    }

    public function getKeywords($id, $opt =[])
    {
        return $this->getData("GET", self::MOVIE."/".$id."/keywords", $opt);
    }

    public function getList($id, $opt =[])
    {
        return $this->getData("GET", self::MOVIE."/".$id."/lists", $opt);
    }
    
}