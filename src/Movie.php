<?php

namespace Josh996\TmdbApi;

class Movie extends GetData
{
    public $id;

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

        $data = $this->request(
            'GET', 
            '/3/movie/'.$this->id, 
            array_merge_recursive($append, $options)
        );

        return json_decode($data, $this->isArray);
    }

    public function getAlternativeTitles($options = [])
    {
        $data = $this->request(
            'GET', 
            '/3/movie/'.$this->id.'/alternative_titles', 
            array_merge_recursive($options)
        );
        return json_decode($data, $this->isArray);
    }

    public function getCredits($options =[])
    {
        $data = $this->request(
            'GET', 
            '/3/movie/'.$this->id.'/credits', 
            array_merge_recursive($options)
        );
        return json_decode($data, $this->isArray);
    }

    public function getExternalID($options =[])
    {
        $data = $this->request(
            'GET', 
            '/3/movie/'.$this->id.'/external_ids', 
            array_merge_recursive($options)
        );
        return json_decode($data, $this->isArray);
    }

    public function getImages($options =[])
    {
        $data = $this->request(
            'GET', 
            '/3/movie/'.$this->id.'/images', 
            array_merge_recursive($options)
        );
        return json_decode($data, $this->isArray);
    }

    public function getKeywords($options =[])
    {
        $data = $this->request(
            'GET', 
            '/3/movie/'.$this->id.'/keywords', 
            array_merge_recursive($options)
        );
        return json_decode($data, $this->isArray);
    }

    public function getList($options =[])
    {
        $data = $this->request(
            'GET', 
            '/3/movie/'.$this->id.'/lists', 
            array_merge_recursive($options)
        );
        return json_decode($data, $this->isArray);
    }
}