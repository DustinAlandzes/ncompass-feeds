<?php

namespace NCompass;

use Cache;
use Feeds;

class News
{
    private $expiresAt = '3600';

    public function parse_json($url, $limit)
    {
        if (!Cache::has('json'))
        {
            $json = file_get_contents($url);
            Cache::put('json', $json, $this->expiresAt);
        }
        else
        {
            $json = Cache::get('json');
        }

        $data = json_decode($json);
        $limitedData = array_slice($data->response->results, 0, $limit);

        return $limitedData;
    }

    public function parse_rss($url, $limit)
    {
        $rss = Feeds::make($url, $limit);
        $limitedData = array_slice($rss->get_items(), 0, $limit);

        return $limitedData;
    }
}
