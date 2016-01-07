<?php namespace NCompass;

use Cache;
use Feeds;

class AtomFeed extends Feed {

    /**
     * AtomFeed constructor.
     * @param $type
     * @param $view
     */
    public function __construct($url)
    {
        $this->url = $url;
        $this->view = 'news.index';
        $this->data = $this->download();
    }
}

