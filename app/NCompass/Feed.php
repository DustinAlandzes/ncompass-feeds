<?php

namespace NCompass;

use Cache;

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
        return file_get_contents($this->url());
        return Cache::get($this->url);
    }

}