@extends('cars.layout.detail')

@section('head')
    {{--<link rel="stylesheet" href="{{ asset('css/cars/slider.css') }}">--}}
@endsection

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Car Detail'])
@stop

@section('main-content')

    <div class="featured-image box">
        <img src="{{ url($gallery->path.'/'.$gallery->name) }}" alt="" />
    </div>

    <div id="car-details" class="tab-container">

        @include('cars.template.car-detail.car-main-content')
    </div>
@stop

@section('right-sidebar')
        <article class="detailed-logo">
            <figure>
                <img width="114" height="85" src="{{ url($logo->path.'/'.$logo->name) }}" alt="">
            </figure>
            <div class="details">
                <h2 class="box-title">{{ $car->name }}<small>{{ $car->type }} car</small></h2>
                                <span class="price clearfix">
                                    <small class="pull-left">per day</small>
                                    <span class="pull-right">{{ $settings->currency.number_format($car->whole_day_price, 2) }}</span>
                                </span>
                <div class="mile clearfix">
                    <span class="skin-color">Mileage:</span>
                    <span class="mileage pull-right">{{ $car->millage }} KM/Litter</span>
                </div>
                <p class="description">{{ $car->short_description }}</p>
                <a class="button yellow full-width uppercase btn-small" href="#">add to wishlist</a>
            </div>
        </article>
        @include('common.widget.need-help')
        @include('common.widget.why-us')

@stop

