@extends('hotels.layout.all-hotels')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Hotel List View'])
@stop

@section('left-sidebar')
    @include('tours.template.tour-view.left-sidebar')
@stop

@section('main-content')

    @include('common.sorting')
    {{--bipon start--}}
    @if($tours != null)
        <div class="hotel-list">
            <div class="row image-box hotel listing-style1">


                @foreach($tours as $tour)

                    <div class="col-sm-6 col-md-4">
                        <article class="box">
                            <figure>
                                <a href="ajax/slideshow-popup.html" class="hover-effect popup-gallery">
                                    <img width="270" height="161" alt="" src="{{  url($tour->images[2]->path .'/'.$tour->images[2]->name ) }}">
                                </a>
                            </figure>
                            <div class="details">
                        <span class="price">
                            <small>Price/person</small>
                            {{ $settings->currency }}
                            {{ $tour->price_per_adult }}
                        </span>
                                <h4 class="box-title">{{ $tour->name }}<small>{{ $tour->city.', '.$tour->country }}</small></h4>
                                <div class="feedback">
                                    <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="4 stars"><span style="width: 80%;" class="five-stars"></span></div>
                                    <span class="review">270 reviews</span>
                                </div>
                                <p class="description">{!! substr($tour->general_information, 0,125) !!}</p>
                                <div class="action">
                                    {!! Form::open(['url' => 'tours/detail/'.$tour->id, 'method' =>'get', 'class'=>'hotelDetail' ,'target' => '_blank']) !!}
                                    {{--{!! Form::hidden('search', 'room') !!}--}}
                                    {!! Form::hidden('date_from', Input::get("date_from")) !!}
                                    {!! Form::hidden('date_to', Input::get("date_to")) !!}
                                    {{--{!! Form::hidden('num_of_room', Input::get('num_of_room') ) !!}--}}
                                    {!! Form::hidden('num_of_adult', Input::get('num_of_adult') ) !!}
                                    {!! Form::hidden('num_of_child', Input::get('num_of_child') ) !!}
                                    {{--<button type="submit" class="button btn-small">SELECT</button>--}}

                                    <a class="button btn-small select">SELECT</a>

                                    <a class="button btn-small yellow popup-map" href="#" data-box="{{ $tour->google_map }}">VIEW ON MAP</a>
                                    {!! Form::close() !!}

                                </div>
                            </div>
                        </article>
                    </div>

                @endforeach


            </div>
            @if($type == 'allTours')
                {!! $tours->appends(Input::only('searchable'))->render(); !!}

            @elseif($type == 'tour')
                {!! $tours->appends(Input::only('searchable',  'placeOrHotel', 'date_from', 'date_to', 'num_of_room', 'num_of_adult', 'num_of_child'))->render(); !!}
            @endif
        </div>
    @endif
        {{--bipon end--}}

    {{--@if($hotels != null)--}}
    {{--<div class="hotel-list">--}}
        {{--<div class="row image-box hotel listing-style1">--}}


            {{--@foreach($hotels as $hotel)--}}
            {{--<div class="col-sm-6 col-md-4">--}}
                {{--<article class="box">--}}
                    {{--<figure>--}}
                        {{--<a href="ajax/slideshow-popup.html" class="hover-effect popup-gallery">--}}
                            {{--<img width="270" height="161" alt="" src="{{  url($hotel->images[2]->path .'/'.$hotel->images[2]->name ) }}">--}}
                        {{--</a>--}}
                    {{--</figure>--}}
                    {{--<div class="details">--}}
                        {{--<span class="price">--}}
                            {{--<small>avg/night</small>--}}
                            {{--{{ $settings->currency }} {{ $hotel->avg }}--}}
                        {{--</span>--}}
                        {{--<h4 class="box-title">{{ $hotel->name }}<small>{{ $hotel->city.', '.$hotel->country }}</small></h4>--}}
                        {{--<div class="feedback">--}}
                            {{--<div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="4 stars"><span style="width: 80%;" class="five-stars"></span></div>--}}
                            {{--<span class="review">270 reviews</span>--}}
                        {{--</div>--}}
                        {{--<p class="description">{!! substr($hotel->general_information, 0,125) !!}</p>--}}
                        {{--<div class="action">--}}
                                {{--{!! Form::open(['url' => 'hotels/detail/'.$hotel->id, 'method' =>'get', 'id'=>'hotelDetail' ,'target' => '_blank']) !!}--}}
                                {{--{!! Form::hidden('search', 'room') !!}--}}
                                {{--{!! Form::hidden('date_from', Input::get("date_from")) !!}--}}
                                {{--{!! Form::hidden('date_to', Input::get("date_to")) !!}--}}
                                {{--{!! Form::hidden('num_of_room', Input::get('num_of_room') ) !!}--}}
                                {{--{!! Form::hidden('num_of_adult', Input::get('num_of_adult') ) !!}--}}
                                {{--{!! Form::hidden('num_of_child', Input::get('num_of_child') ) !!}--}}
                                {{--<button type="submit" class="button btn-small">SELECT</button>--}}
                                {{--{!! Form::close() !!}--}}

                            {{--<a class="button btn-small" id="select">SELECT</a>--}}

                            {{--<a class="button btn-small yellow popup-map" href="#" data-box="{{ $hotel->google_map }}">VIEW ON MAP</a>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</article>--}}
            {{--</div>--}}

            {{--@endforeach--}}


        {{--</div>--}}
    {{--</div>--}}

    {{--<a href="#" class="uppercase full-width button btn-large">load more listing</a>--}}
    {{--@else--}}

                {{--<div class="block white-bg">--}}
                    {{--<h1 style="font-size: 55px; text-align: center; padding: 130px 0;" class="s-title">Hotel Not Found<br> </h1>--}}
                {{--</div>--}}

    {{--@endif--}}
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
//            tjq('#hotelDetail').submit();
        });
    </script>

@endsection