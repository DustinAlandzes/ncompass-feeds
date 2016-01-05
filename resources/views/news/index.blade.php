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
        <div class="row">
            <div style="margin-top: {{$request->margin}}%">
            @foreach($data as $result)
                <p style="font-size:{{$request->font}}px">
                    {{$result->webTitle}}
                </p>
            @endforeach
            </div>
        </div>
    </div>

    <!-- End Document
      –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    </body>
    @stop