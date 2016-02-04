<?php
namespace NCompass;

class FeedFactory
{
    public static function create($url, $type = 'json')
    {
        if ($type == 'json')
        {
            return new JSONFeed($url);
        }
        elseif ($type == 'atom')
        {
            return new RSSFeed($url);
        }
        elseif ($type == 'fb')
        {
            return new FacebookFeed($url);
        }
        elseif ($type == 'toyota')
        {
            return new ImportIOFeed($url);
        }


        return new AtomFeed($url);
    }
}
