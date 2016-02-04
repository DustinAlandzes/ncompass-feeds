@extends('app')

@section('title')
    News
@stop
@section('style')
    <style>

        html body
        {
            height: 100%;
            background: url({{$request->bg}}) no-repeat;
            background-size: cover;
            font-size:{{$request->fontsize}}px;
            color: {{$request->fontcolor}};
            overflow: hidden;
        }
    </style>
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
        <div style="color: {{$request->color}};">
            @foreach($feed as $key => $item)
                <p>
                    {{$item}}
                </p>
            @endforeach
        </div>
    </div>

    <!-- End Document
      –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    </body>
@stop