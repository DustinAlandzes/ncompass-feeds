@extends('app')

@section('title')
News
    @stop

@section('body')
    <body style="background: url({{$request->bg}}) no-repeat center center fixed;     -webkit-background-size: cover; !important
            -moz-background-size: cover;!important
            -o-background-size: cover; !important
            background-size: cover; !important">

    <!-- Primary Page Layout
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <div class="container">
        <div class="row" style="margin-top: {{$request->margin}}%; !important">
            <div>
            @if(isset($json))
                @foreach($json as $item)
                    <p style="font-size:{{$request->font}}px">
                        {{$item->webTitle}}
                    </p>
                @endforeach
            @elseif(isset($atom))
                @foreach($atom as $item)
                    <p style="font-size:{{$request->font}}px">
                        {{$item->get_title()}}
                    </p>
                    @endforeach
            @else
                Error
                @endif
            </div>
        </div>
    </div>

    <!-- End Document
      –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    </body>
    @stop