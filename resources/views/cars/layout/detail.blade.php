@extends('master')

@section('content')
    <div class="container">
        <div id="main">
            <div class="row">
                <div id="main" class="col-sms-6 col-sm-8 col-md-9">
                    @yield('main-content')
                </div>
                <div class="sidebar col-sms-6 col-sm-4 col-md-3">
                    @yield('right-sidebar')
                </div>
            </div>
        </div>
    </div>

@stop
