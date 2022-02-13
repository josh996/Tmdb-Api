<?php 

namespace Josh996\TmdbApi;

class Tv extends GetData
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
            '/3/tv/'.$this->id, 
            array_merge_recursive($append, $options)
        );

        return json_decode($data, $this->isArray);
    }

    public function season($season)
    {
        return new Season($this->id, $season);
    }
}