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
        <div class="row">
            @foreach($feed as $url)
            <div class="one-third column">
                    <img src="{{$url}}" width="300px">
            </div>
            @endforeach
        </div>
    </div>

    <!-- End Document
      –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    </body>
@stop