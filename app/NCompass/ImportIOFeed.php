<?php
/**
 * Created by PhpStorm.
 * User: f00
 * Date: 1/21/16
 * Time: 5:27 PM
 */

namespace NCompass;


class ImportIOFeed extends JSONFeed
{
    protected $view;
    protected $data;

    /**
     * JSONFeed constructor.
     * @param $type
     * @param $view
     */
    public function __construct($url)
    {
        $this->url = 'https://api.import.io/store/connector/4029d854-2a10-46b5-a12b-cbe03b998e51/_query?input=webpage/url:http%3A%2F%2Fwww.toyotaofcleveland.com%2Fused-cars-mcdonald-tn&&_apikey=37f77821fb514ae4b4a394e4fe1cacc245ea170e8c36e75eaa2f7885395de118cf7c8292fe8f7488e59bee84d6137689fe9097807cfb1f8c76a12ed263f08fecbe37ea6eaa527784e8bd318b92b94125';
        $this->view = 'news.facebook';
        $this->data = $this->download();
    }

    public function toArray()
    {
        $arr = [];
        $obj = json_decode($this->data());
        foreach($obj->results as $result){
            $arr[] = $result->{'image_1'};
        }

        return $arr;
    }
}