@extends('app')

@section('title')
    News
@stop

@section('style')
    <style>
        #carousel
        {
            margin-top:200px;
            height: 460px; !important
            background-size: 100%;
        }

        html body
        {
            height: 100%;
            background: url({{$request->bg}}) no-repeat;
            background-size: cover;
            font-size:{{32*$request->fontsize}}px;
            color: {{$request->fontcolor}}};
        }
    </style>
@stop

@section('body')
    <div id="carousel">
        <
    </div>
    <script type="text/javascript" charset="utf-8">

        function setBackground(url)
        {
            $('#carousel').css('background', 'url('+url+') no-repeat center center');
        }

        function startCarousel(images)
        {
            setBackground(images[0]);

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
            }, {{$request->time*1000}});
        }

        var images =
                [
                @foreach($feed as $url)
                    "{{$url}}",
                @endforeach
                ];

        startCarousel(images);

    </script>
    <!-- End Document
      –––––––––––––––––––––––––––––––––––––––––––––––––– -->
@stop