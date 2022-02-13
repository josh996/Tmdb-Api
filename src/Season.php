<?php

namespace Josh996\TmdbApi;

class Season extends GetData
{
    public $id, $season;

    public function __construct($id, $season = 0)
    {
        parent::__construct();
        $this->id = $id;
        $this->season = $season;
    }

    public function get($options = []) {
        $append = [
            "query" => [
                'append_to_response' => config('tmdb.append_to_response')
            ]
        ];

        $data = $this->request(
            'GET', 
            '/3/tv/' . $this->id . '/season/' . $this->season, 
            array_merge_recursive($append, $options)
        );

        return json_decode($data, $this->isArray);
    }
}