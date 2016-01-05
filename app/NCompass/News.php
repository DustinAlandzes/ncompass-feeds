<?php

namespace NCompass;

class News
{

    public function parse($url)
    {
        $json = file_get_contents($url);
        return json_decode($json);
    }
}
