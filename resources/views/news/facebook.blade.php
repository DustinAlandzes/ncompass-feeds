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
            <div class="flexslider">
                <ul class="slides">
                    @foreach($feed as $url)
                    <li>
                        <img src="{{$url}}"/>
                    </li>
                    @endforeach
            </div>
        </div>

    </div>

    <script type="text/javascript" charset="utf-8">
        $(window).load(function() {
            $('.flexslider').flexslider({
                slideshowSpeed: 3000,
                pauseOnAction: false,
                controlNav: false,
                directionNav: false,

            });
        });
    </script>
    <!-- End Document
      –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    </body>
@stop