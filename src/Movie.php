<?php

namespace Josh996\TmdbApi;

class Movie extends GetData
{
    public $id, $data;

    public function __construct($id)
    {
        parent::__construct();
        $this->id = $id;
    }

    public function get($options = []) {
        $append = [
            "query" => [
                'append_to_response' => config('tmdb.append_to_response')
            ]
        ];

        $data = $this->request('GET', '/3/movie/'.$this->id, array_merge_recursive($append, $options));

        $this->data = $data;

        return json_decode($this->data, true);
    }
    

    // public function getMovie($id, $opt = [])
    // {
    //     $append = [
    //         "query" => [
    //             'append_to_response' => config('tmdb.append_to_response')
    //         ]
    //     ];

    //     return $this->getData("GET", self::MOVIE."/".$id, array_merge_recursive($append, $opt));
    // }

    public function getAlternativeTitles($id, $opt =[])
    {
        //return $this->getData("GET", self::MOVIE."/".$id."/alternative_titles", $opt);
    }

    public function getCredits($id, $opt =[])
    {
        //return $this->getData("GET", self::MOVIE."/".$id."/credits", $opt);
    }

    public function getExternalID($id, $opt =[])
    {
        //return $this->getData("GET", self::MOVIE."/".$id."/external_ids", $opt);
    }

    public function getImages($id, $opt =[])
    {
        //return $this->getData("GET", self::MOVIE."/".$id."/images", $opt);
    }

    public function getKeywords($id, $opt =[])
    {
        //return $this->getData("GET", self::MOVIE."/".$id."/keywords", $opt);
    }

    public function getList($id, $opt =[])
    {
        //return $this->getData("GET", self::MOVIE."/".$id."/lists", $opt);
    }
}