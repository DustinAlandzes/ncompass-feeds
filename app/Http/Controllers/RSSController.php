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

        if($request->type == 'json')
        {
            $json = $rss->parse_json($request->url, $request->limit);
            return view('news.index', compact('json', 'request'));
        }
        elseif($request->type == 'atom')
        {
            $atom = $rss->parse_rss($request->url, $request->limit);
            return view('news.index', compact('atom', 'request'));
        }
        elseif($request->type == 'fb')
        {
            $fb = $rss->parse_fb($request->url, $request->limit);
            return view('news.facebook', compact('fb', 'request'));
        }
        else
        {
            abort(404, 'No type specified in URL (json or atom)');
        }
    }
}
