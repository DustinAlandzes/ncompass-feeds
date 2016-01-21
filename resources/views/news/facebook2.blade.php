@extends('app')

@section('title')
    News
@stop

@section('style')
    <style>
        html {
            height: 100%;
            background-size: cover;
            font-size:64px;
        }
    </style>
@stop

@section('body')
    <script type="text/javascript" charset="utf-8">

        function setBackground(url)
        {
            $('html').css('background', 'url('+url+') no-repeat center center');
        }

        var images =
                [
                @foreach($feed as $url)
                    "{{$url}}",
                @endforeach
                ];
        var current = 0;

        setTimeout(function() {
            var images =
                    [
                        @foreach($feed as $url)
                                "{{$url}}",
                        @endforeach
                    ];

            setBackground(images[current]);
            current++;

            if(current == images.length){
                current = 0;
            }
        }, 1000);

        /*
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
        */

    </script>
    <!-- End Document
      –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    </body>
@stop