@extends('master-tour')

@section('head')
    <link id="main-style" rel="stylesheet" href="{{ asset('css/tours/style.css') }}">
    <?php $class = 'style3'; $bodyClass = 'tour'; ?>
@endsection

@section('slider')
    @include('tours.template.home.slideshow')
@endsection

@section('content')

        @include('tours.template.home.popular')
{{--        @include('tours.template.home.latest')--}}
{{--        @include('tours.template.home.tips')--}}


@stop



