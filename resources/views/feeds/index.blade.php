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
    @foreach($feed as $item)
        <div class="image" data-content="{{$item}}">
        </div>
    @endforeach
    <div id="carousel">
    </div>
    <script type="text/javascript" charset="utf-8">

        function setContent(content)
        {
            $('#carousel').hide();
            $('#carousel').text(content);
            $('#carousel').show();
        }

        function startCarousel(items)
        {

            setContent(items[0]);

            var current = 0;
            setInterval(function(){
                if(current < items.length)
                {
                    setContent(items[current]);
                    current++;
                }
                else
                {
                    current = 0;
                }
            }, {{$request->time*1000}});
        }

        $(document).ready(function() {
            var items = [];

            $( ".image" ).each(function( index ) {
                var content = $(this).attr('data-content');
                items.push(content);
            });

            startCarousel(items);
        });

    </script>
    <!-- End Document
      –––––––––––––––––––––––––––––––––––––––––––––––––– -->
@stop