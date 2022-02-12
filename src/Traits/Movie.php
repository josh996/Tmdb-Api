<?php

namespace Josh996\TmdbApi\Traits;

trait Movie
{    
    public function getMovie($id, $opt = [])
    {
        return $this->getData("GET", self::MOVIE."/".$id, $opt);
    }

    public function getAccountStates($id, $opt =[])
    {
        return $this->getData("GET", self::MOVIE."/account_states".$id, $opt);
    }
}