<?php

namespace Josh996\TmdbApi;

class Episode extends GetData
{
    public $id, $season, $episode;

    public function __construct($id, $season, $episode)
    {
        parent::__construct();
        $this->id = $id;
        $this->season = $season;
        $this->episode = $episode;
    }

    public function get($options = []) {
        $append = [
            "query" => [
                'append_to_response' => config('tmdb.append_to_response')
            ]
        ];

        $data = $this->request(
            'GET', 
            '/3/tv/' . $this->id . '/season/' . $this->season . '/episode/' . $this->episode, 
            array_merge_recursive($append, $options)
        );

        return json_decode($data, $this->isArray);
    }
}