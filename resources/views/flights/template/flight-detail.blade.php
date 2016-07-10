@extends('flights.layout.detail')

@section('head')
{{--    <link rel="stylesheet" href="{{ asset('css/style-light-blue.css') }}">--}}
@endsection

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Flight Detail'])
@stop

@section('main-content')

    <div class="tab-container style1 box" id="flight-main-content">
        @include('flights.template.flight-detail.flight-images')
    </div>

    <div id="tour-details" class="tab-container">
        @include('flights.template.flight-detail.flight-main-content')
    </div>
@stop

@section('right-sidebar')
    <article class="detailed-logo">
        <figure>
            <img width="87" height="57" src="{{ url($logo->path.'/'.$logo->name) }}" alt="">
        </figure>
        <div class="details">
            <h2 class="box-title">{{ $flight->company_name }}<small>{{ $flight->direction }} flight</small></h2>
                                <span class="price clearfix">
                                    <small class="pull-left">avg/person</small>
                                    <span class="pull-right">{{ $settings->currency.$flight->base_fare.'.00' }}</span>
                                </span>

            <div class="duration">
                <i class="soap-icon-clock"></i>
                <dl>
                    <dt class="skin-color">Total Time:</dt>
                    <dd>{{ $flight->duration }}</dd>
                </dl>
            </div>

            <p class="description">{!! $flight->short_description !!}</p>
            <a href="#" class="button green full-width uppercase btn-medium">book flight now</a>
        </div>
    </article>
    @include('common.widget.need-help')
    @include('common.widget.why-us')

@stop

