@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Admin Dashboard'])
@stop

@section('admin-content')

    <div class="tab-container full-width-style arrow-left dashboard">
        <ul class="tabs">
            <li class=""><a href="{{ url('admin/booking') }}"><i class="soap-icon-anchor circle"></i>Dashboard</a></li>
            <li class="active"><a><i class="soap-icon-user circle"></i>Create Invoice</a></li>
            {{--<li class=""><a><i class="soap-icon-businessbag circle"></i>Tour Booking</a></li>--}}
            {{--<li class=""><a><i class="soap-icon-wishlist circle"></i>Car Booking</a></li>--}}
        </ul>
        <div class="tab-content">

            <div class="row block">

                <div class="tab-pane fade active in" id="hotels-tab">
                    <h1 class="no-margin skin-color">Hi {{ Auth::user()->first_name }}, Welcome to Momento</h1>
                    <p>All your trips booking with us will appear here and you’ll be able to manage everything!</p>
                    <hr>

                    @include('flash::message')
                    @include('agents.hotels.hotel-search', ['url'=>'admin/booking/new-booking'])
                    @if(isset($hotels))
                        @include('admin.agents._list')
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection