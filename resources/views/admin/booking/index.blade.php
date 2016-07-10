@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Admin Dashboard'])
@stop

@section('admin-content')

    <div class="tab-container full-width-style arrow-left dashboard">
        <ul class="tabs">
            <li class="active"><a><i class="soap-icon-anchor circle"></i>Dashboard</a></li>
            <li class=""><a href="{{ url('admin/booking/new-booking') }}"><i class="soap-icon-user circle"></i>Create Invoice</a></li>
            {{--<li class=""><a><i class="soap-icon-businessbag circle"></i>Tour Booking</a></li>--}}
            {{--<li class=""><a><i class="soap-icon-wishlist circle"></i>Car Booking</a></li>--}}
        </ul>

        <div class="tab-content">

            <div id="booking" class="tab-pane fade in active">
                @include('common.template.booking', ['url'=>'admin/booking/detail'])
            </div>
            <div id="hotel" class="tab-pane fade booking">
{{--                @include('common.template.hotel_booking')--}}
            </div>
            <div id="tour" class="tab-pane fade booking">
{{--                @include('common.template.tour_booking')--}}
            </div>

        </div>
    </div>
@endsection