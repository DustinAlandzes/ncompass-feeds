<?php

namespace NCompass;

use Cache;
use Carbon\Carbon;

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
        $expiresAt = Carbon::now()->addHour();

        if (!Cache::has($this->url)) {
            $data = file_get_contents($this->url());
            Cache::put($this->url, $data, $expiresAt);
        }
        //fix pls
        return file_get_contents($this->url());
        return Cache::get($this->url);
    }

}