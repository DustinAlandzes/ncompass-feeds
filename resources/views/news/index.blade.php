@extends('app')

@section('title')
News
    @stop

@section('body')
    <body style="
            background: url({{$request->bg}}) no-repeat center center fixed;
            -webkit-background-size: cover; !important
            -moz-background-size: cover;!important
            -o-background-size: cover; !important
            background-size: cover; !important
            ">

    <!-- Primary Page Layout
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <div class="container">
        <div class="row" style="margin-top: {{$request->margin}}%; !important">
            <div style="color: {{$request->color}};">
                @foreach($feed as $item)
                    <p style="font-size:{{$request->font}}px">
                        {{$item}}
                    </p>
                @endforeach
            </div>
        </div>
    </div>

    <!-- End Document
      –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    </body>
    @stop