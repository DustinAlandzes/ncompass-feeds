@extends('app')

@section('title')
    News
@stop

@section('style')
<style>
    html body {
        height: 100%;
        background: url({{ $request->bg }}) no-repeat;
        background-size: cover;
        font-size:{{32*$request->fontsize}}px;
        color: {{$request->fontcolor}}};
    }

    .slider {
        margin-top: 125px;
        height: 640px;
    }
</style>
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
@stop
@section('body')

    <!-- Primary Page Layout
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <div class="container">
        <div class="slider">
            <ul class="slides">
                @foreach($feed as $url)
                    <li>
                        <img src="{{$url}}"> <!-- random image -->
                        <div class="caption center-align">
                            <h3>This is our big Tagline!</h3>
                            <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                        </div>
                    </li>
                    "{{$url}}",
                @endforeach
            </ul>
        </div>
    </div>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function () {
            $('.slider').slider({full_width: false, indicators: false, height: 480px});
        });
        function setBackground(url)
        {
            $('#carousel').css('background', 'url('+url+') no-repeat center center');
        }

        var images =
                [
                    @foreach($feed as $url)
                            "{{$url}}",
                    @endforeach
                ];
        var current = 0;

        setInterval(function(){
            if(current < images.length)
            {
                setBackground(images[current]);
                current++;
            }
            else
            {
                current = 0;
            }
        }, 1000);

    </script>
@stop