<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use NCompass\FeedFactory;
use NCompass\JSONFeed as JSONFeed;
use NCompass\RSSFeed as RSSFeed;
use NCompass\AtomFeed as AtomFeed;
use NCompass\FacebookFeed as FacebookFeed;

class RSSController extends Controller
{

    public function view(Request $request)
    {
        $feed = FeedFactory::create($request->url, $request->type);
        $array = array_slice($feed->toArray(), 0, $request->limit);
        return view($feed->view())->with(['feed' => $array, 'request' => $request]);
    }

}
