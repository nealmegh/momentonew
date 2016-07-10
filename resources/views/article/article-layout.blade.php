@extends('master')

@section('head')
    <?php $bodyClass = 'single single-pos'; ?>
@endsection



@section('content')

    <section id="content">
        <div class="container">
            <div class="row">
                <div id="main" class="col-sm-8 col-md-9">
                    @yield('article-content')
                </div>
                <div class="sidebar col-sm-4 col-md-3">
                    @include('article._sidebar')
                </div>
            </div>
        </div>
    </section>

@stop