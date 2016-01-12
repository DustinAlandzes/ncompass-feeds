<?php namespace NCompass;

class AtomFeed extends RSSFeed {

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

