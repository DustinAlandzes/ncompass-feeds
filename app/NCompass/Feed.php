<?php

namespace NCompass;

use Cache;
use Feeds;

class Feed {

    protected $url;

    /**
     * Feed constructor.
     * @param $feed
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    public function url()
    {
        return $this->url;
    }

    public function download()
    {
        if (!Cache::has($this->url)) {
            $data = file_get_contents($this->url());
            Cache::put($this->url, $data);
        }

        return Cache::get($this->url);
    }

}