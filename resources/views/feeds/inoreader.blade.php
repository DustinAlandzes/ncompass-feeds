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

        #description
        {
            @if(!$request->description)
                visibility: hidden;
            @endif
            min-height: 200px;
            max-height: 200px;
            max-width: 640px;
            margin: 0 auto;
            overflow: hidden;
        }

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
    <div id="carousel">
        @foreach($feed as $item)
            <div class="image" data-url="{{$item['url']}}" data-description="{{$item['description']}}">
            </div>
        @endforeach
    </div>
    <div id="description">
    </div>
    <script type="text/javascript" charset="utf-8">

        function setBackground(url)
        {
            $('#carousel').hide();
            $('#carousel').css('background', 'url('+url+') no-repeat center center');
            $('#carousel').show();
        }

        function setDescription(description)
        {
            $('#description').text(description)
        }

        function startCarousel(imageUrls, imageDescriptions)
        {
            console.log(imageUrls);
            console.log(imageDescriptions);

            setBackground(imageUrls[0]);
            setDescription(imageDescriptions[0]);

            var current = 0;
            setInterval(function(){
                if(current < imageUrls.length)
                {
                    setBackground(imageUrls[current]);
                    setDescription(imageDescriptions[current]);
                    current++;
                }
                else
                {
                    current = 0;
                }
            }, {{$request->time*1000}});
        }

        $(document).ready(function() {
            var urls = [], descriptions = [];

            $( ".image" ).each(function( index ) {
                var url = $(this).attr('data-url');
                var description = $(this).attr('data-description');
                urls.push(url);
                descriptions.push(description);
            });

            startCarousel(urls, descriptions);
        });

    </script>
    <!-- End Document
      –––––––––––––––––––––––––––––––––––––––––––––––––– -->
@stop