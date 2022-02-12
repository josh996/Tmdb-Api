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
        return $this->getData("GET", self::MOVIE."/".$id."/alternative_titles", $opt);
    }

    public function getCredits($id, $opt =[])
    {
        return $this->getData("GET", self::MOVIE."/".$id."/credits", $opt);
    }
}