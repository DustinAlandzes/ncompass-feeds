<?php

namespace NCompass;

use Cache;
use Feeds;

class JSONFeed extends Feed {

    protected $view;
    protected $data;

    /**
     * JSONFeed constructor.
     * @param $type
     * @param $view
     */
    public function __construct($url)
    {
        $this->url = $url;
        $this->view = 'news.index';
        $this->data = $this->download();
    }

    public function view()
    {
        return $this->view;
    }

    public function data()
    {
        return $this->data;
    }

    public function toArray()
    {
        $arr = [];
        $obj = json_decode($this->data());

        foreach($obj->response->results as $result){
            $arr[] = $result->webTitle;
        }

        return $arr;
    }

}