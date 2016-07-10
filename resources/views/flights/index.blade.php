@extends('master')

@section('current-page-styles')
    <!-- Current Page Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('components/revolution_slider/css/settings.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('components/revolution_slider/css/style.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('components/jquery.bxslider/jquery.bxslider.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('components/flexslider/flexslider.css') }}" media="screen" />
@endsection

@section('slider')
    @include('flights.template.home.slideshow')
@stop
@section('content')
    @include('common.search', ['active'=>'flight'])
    <div class="section">
        <div class="container">
        @include('flights.template.home.popular')
        @include('flights.template.home.latest')
        @include('flights.template.home.tips')
        </div>
    </div>

@stop






@section('footer')
    <script type="text/javascript">
        tjq(document).ready(function() {
            tjq('.revolution-slider').revolution(
                    {
                        dottedOverlay:"none",
                        delay:9000,
                        startwidth:1200,
                        startheight:646,
                        onHoverStop:"on",
                        hideThumbs:10,
                        fullWidth:"on",
                        forceFullWidth:"on",
                        navigationType:"none",
                        shadow:0,
                        spinner:"spinner4",
                        hideTimerBar:"on"
                    });
        });
    </script>

@endsection