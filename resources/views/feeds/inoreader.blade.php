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
            background-color: #e9ebee;
            font-family: "San Francisco", -apple-system, BlinkMacSystemFont, ".SFNSText-Regular", sans-serif;
            font-size:{{$request->fontsize}}px;
            color: {{$request->fontcolor}};
            overflow: hidden;
        }

        #container {
          min-height:100%;
          min-width:100%;
          background-color: rgba(0, 0, 0, .9)
        }

        #header {
          background-color:#3b5998;
          height:42px;
          width:100%;
        }

        #post {
          background-color:#f6f7f9;
          text-align: center;
          width:75%;
          display: table;
          margin: 0 auto;
        }

        #carousel
        {
            min-height: 600px;
        }

        #description
        {
            @if(!$request->description)
                visibility: hidden;
            @endif
            width: 100%;
            margin:10px;
            text-align: center;
            font-size: 30px;
        }

        .image {
          width: 100%;
        }
    </style>
@stop

@section('body')
    <div id="header"></div>
    <div id="container">
    <div id="post">
      <div id="carousel">
          @foreach($feed as $item)
              <div class="image" data-url="{{$item['url']}}" data-description="{{$item['description']}}">
              </div>
          @endforeach
      </div>
    </div>
  </div>
    <div id="description">
    </div>
    <!--
    <script type="text/javascript" src="https://getfirebug.com/firebug-lite-debug.js"></script>
    -->
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
            alert("script started");
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
@stop
