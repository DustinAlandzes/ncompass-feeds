<?php namespace NCompass;

use Cache;
use Feeds;

class RSSFeed extends Feed {

    protected $view;
    protected $data;

    /**
     * RSSFeed constructor.
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

    public function download()
    {
        if (!Cache::has($this->url)) {
            $data = Feeds::make($this->url)->get_items();
            Cache::put($this->url, $data, 3600);
        }

        return Cache::get($this->url);
    }

    public function toArray()
    {
        $arr = [];

        foreach($this->data() as $item){
            $arr[] = $item->get_title();
        }

        return $arr;
    }

}