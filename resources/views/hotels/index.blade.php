@extends('master-tour')

@section('head')
    <link id="main-style" rel="stylesheet" href="{{ asset('css/style-light-blue.css') }}">
    <?php $class = "style2" ?>
@endsection

@section('slider')
    @include('hotels.template.home.slideshow')
@endsection

@section('content')
    {{--@include('common.search')--}}

    <div class="section white-bg">
        <div class="container">
            @include('hotels.widget.feature')

            @include('hotels.widget.hotel-tab')

            {{--@include('hotels.widget.hotel-choice')--}}
        </div>
    </div>
    {{--@include('hotels.widget.global-map')--}}
@endsection


@section('footer')

    <!-- Google Map Api -->
    <script type='text/javascript' src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
    <script type="text/javascript" src="/js/gmap3.min.js"></script>

    <script type="text/javascript" src="/js/scripts.js"></script>

    <script type="text/javascript">
        tjq(document).ready(function() {
            tjq("#price-range").slider({
                range: true,
                min: 0,
                max: 1000,
                values: [ 100, 800 ],
                slide: function( event, ui ) {
                    tjq(".min-price-label").html( "$" + ui.values[ 0 ]);
                    tjq(".max-price-label").html( "$" + ui.values[ 1 ]);
                }
            });
            tjq(".min-price-label").html( "$" + tjq("#price-range").slider( "values", 0 ));
            tjq(".max-price-label").html( "$" + tjq("#price-range").slider( "values", 1 ));

            tjq("#rating").slider({
                range: "min",
                value: 40,
                min: 0,
                max: 50,
                slide: function( event, ui ) {

                }
            });
        });
    </script>

    <script type="text/javascript">
        tjq('.select').on('click', function() {
            tjq(this).parents('form').submit();
        });
    </script>


    <script type="text/javascript">
        tjq("#slideshow .flexslider").flexslider({
            animation: "fade",
            controlNav: false,
            animationLoop: true,
            directionNav: false,
            slideshow: true,
            slideshowSpeed: 5000
        });
    </script>
@endsection