@extends('hotels.layout.all-hotels')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Hotel List View'])
@stop

@section('left-sidebar')
    @include('hotels.template.hotel-view.left-sidebar')
@stop

@section('main-content')

    @include('common.sorting')

    @if(Session::has('view'))
        @if(Session::get('view') == 'grid')
            @include('hotels.template.hotel-view.hotel-grid-view')
        @elseif(Session::get('view') == 'list')
            @include('hotels.template.hotel-view.hotel-list-view')
        @elseif(Session::get('view') == 'block')
            @include('hotels.template.hotel-view.hotel-block-view')
        @endif
    @else
        @include('hotels.template.hotel-view.hotel-grid-view')
    @endif

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

@endsection