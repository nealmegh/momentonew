@extends('master')

@section('current-page-styles')
    <!-- Current Page Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('components/revolution_slider/css/settings.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('components/revolution_slider/css/style.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('components/jquery.bxslider/jquery.bxslider.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('components/flexslider/flexslider.css') }}" media="screen" />
@endsection

@section('slider')
    @include('home._slider')
@stop

@section('content')
    @include('common.search', ['active'=>'hotel'])


    <!-- how it works -->
    @include('home.widget._destinations')
    @include('home.widget._did_you_know')

    <!-- Featured Destinations -->
{{--    @include('home.widget._featured-destination')--}}


@stop


@section('footer')

    <script type="text/javascript">
        tjq(document).ready(function() {
            tjq('.revolution-slider').revolution(
                    {
                        dottedOverlay:"none",
                        delay:8000,
                        startwidth:1170,
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