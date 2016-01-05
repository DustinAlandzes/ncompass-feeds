<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use NCompass\News as rss;

class RSSController extends Controller
{

    public function view(Request $request)
    {
        $rss = new rss();
        $url = $request->url;
        $fontSize = $request->font;

        $arr = $rss->parse($request->url);
        $data = array_slice($arr->response->results, 0, $request->limit);

        return view('news.index', compact('data', 'font'));
    }
}
