<?php

namespace NCompass;

class FacebookFeed extends RSSFeed {

    /**
     * FacebookFeed constructor.
     */
    public function __construct($url)
    {
        $this->url = $url;
        $this->view = 'feeds.inoreader';
        $this->data = $this->download();
    } 


    public function toArray()
    {
        $arr = [];

        foreach($this->data() as $item){
            $url = $item->get_link();
            $description = $item->get_title();
            $postId = $this->getPostIdFromPostUrl($url);
            $arr[] = [
                'url' => $this->getImageUrlfromPostId($postId),
                'description' => $description
            ];
        }
        return $arr;
    }

    private function getPostIdFromPostUrl($url)
    {
        $arr = explode('/', $url); // split url
        return $arr[5]; // return the 6th item, which is the id
    }

    private function getImageUrlfromPostId($id)
    {
        return 'https://graph.facebook.com/'.$id.'/picture';
    }
}
