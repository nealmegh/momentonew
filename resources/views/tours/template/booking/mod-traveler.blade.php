@extends('master')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Booking Confirm'])
@stop

@section('head')
    <style>
        section#content {
            padding: 0;
        }
    </style>
@endsection

@section('content')


    <div class="banner imagebg-container" style="height: 350px; background-image: url('/images/tours/tour-banner.png');">
        <div class="container">
            <h1 class="big-caption">Thank's for your booking  <em>Submission!</em></h1>
            <h2 class="med-caption">We're bringing you a modern, comfortable,
                <br>and connected flight experience</h2>
        </div>
    </div>
    <div class="tab-wrapper">
        <div class="tab-container container trans-style">
            <ul class="tabs no-padding">
                <li><a  href="{{ url('tours/booking/confirm/'.$booking->booking_no.'/print-preview') }}"><i class="soap-icon-stories"></i>Print Reservation</a></li>
                @if( $booking->status == 2 )
                    <li><a  href="{{ url('tours/booking/complete/'.$booking->booking_no) }}"><i class="soap-icon-shopping-3"></i>Complete Reservation</a></li>
                @endif
                <li><a  href="{{ url('tours/booking/cancel/'.$booking->booking_no) }}"><i class="soap-icon-liability"></i>Cancel Booking</a></li>
                <li><a  href="{{ url('tours/booking/edit/'.$booking->booking_no) }}"><i class="soap-icon-passenger"></i>Modify Traveller Info</a></li>
                <li><a  href="{{ url('contact-us')}}"><i class="soap-icon-support"></i>Need Help</a></li>
            </ul>
            <div class="tab-content">
                <div id="emergency-ready" class="tab-pane fade">
                    <div class="sm-section">
                        <h2>Emergency ready</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div id="main" class="md-section">
            <div id="main" class="col-sms-6 col-sm-8 col-md-8">

                <div class="booking-information travelo-box">
                    <h2>Edit Travelers Information</h2>
                    <hr>
                    {{--<div class="booking-confirmation clearfix">--}}
                        {{--<i class="soap-icon-recommend icon circle"></i>--}}
                        {{--<div class="message">--}}
                            {{--<h4 class="main-message">Thank You. Your Booking Order is Taken.</h4>--}}
                            {{--<p>A confirmation email has been sent to your provided email address.</p>--}}
                        {{--</div>--}}
                        {{--@if( $booking->status == 3 )--}}
                            {{--<div class="button btn-small print-button uppercase">Complete Reservation</div>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                    {{--<hr>--}}
                    {{--<h2>Traveler Information</h2>--}}
                    <dl class="term-description">
                        <dt>Booking number:</dt><dd>{{ $booking->booking_no }}</dd>
                        <dt>First name:</dt><dd>{{ $booking->guest->first_name }}</dd>
                        <dt>Last name:</dt><dd>{{ $booking->guest->last_name }}</dd>
                        <dt>E-mail address:</dt><dd>{{ $booking->guest->email }}</dd>
                        <dt>Street Address and number:</dt><dd>{{ $booking->guest->address }}</dd>
                        <dt>Town / City:</dt><dd>{{ $booking->guest->city }}</dd>
                        <dt>ZIP code:</dt><dd>{{ $booking->guest->zip }}</dd>
                        <dt>Country:</dt><dd>{{ $booking->guest->country }}</dd>
                    </dl>
{{--{{dd($booking->guest->id)}}--}}

                        {!! Form::open(['method' => 'POST', 'url'=>'tours/booking/update/'.$booking->booking_no.'', 'class' => 'booking-form']) !!}
                    <div class="form-group row">
                        <div class="col-sm-6 col-md-5">
                            <label>first name</label>
                            <input type="text" name="first_name" class="input-text full-width" value="{{$booking->guest->first_name}}" placeholder="Enter your first name">
                        </div>
                        <div class="col-sm-6 col-md-5">
                            <label>last name</label>
                            <input type="text" name="last_name" class="input-text full-width" value="{{$booking->guest->last_name}}" placeholder="Enter your last name">
                        </div>

                            <div class="col-sm-6 col-md-5">
                                <label>email address</label>
                                <input type="text" name="email" class="input-text full-width" value="{{ $booking->guest->email }}" placeholder="Enter your email Address">
                            </div>
                            <div class="col-sm-6 col-md-5">
                                <label>Phone number</label>
                                <input type="text" name="phone_no" class="input-text full-width" value="{{$booking->guest->phone_no}}" placeholder="">
                            </div>

                            <div class="col-sm-6 col-md-5">
                                <label>address</label>
                                <input type="text" name="address" class="input-text full-width" value="{{ $booking->guest->address }}" placeholder="">
                            </div>
                            <div class="col-sm-6 col-md-5">
                                <label>city</label>
                                <input type="text" name="city" class="input-text full-width" value="{{ $booking->guest->city }}" placeholder="">
                            </div>

                            <div class="col-sm-6 col-md-5">
                                <label>Country</label>
                                <div class="selector">
                                    <select class="full-width" name="country">
                                        @include('common.country-list')
                                    </select>
                                </div>
                            </div>


                            <div class="col-sm-12 col-md-10">
                                <label>Special requirements</label>
                                <textarea name="customer_note" class="full-width" rows="4"></textarea>
                            </div>
                        <input type="hidden" name="guest_id" value="{{ $booking->guest->id }}">

                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    {!! Form::close() !!}
                    {{--<hr>--}}
                    {{--<h2>Payment:</h2>--}}
                    {{--<p>{!! $booking->paymentMethod->terms !!}</p>--}}
                    {{--<br>--}}
                    {{--<p class="red-color">Payment Method: {!! $booking->paymentMethod->name !!}.</p>--}}
                    {{--<hr>--}}
                    {{--<h2>Cancellation Policy:</h2>--}}
                    {{--{!! $booking->bookable->service->cancellation !!}--}}
                    {{--<br>--}}
                    {{--<a href="#" class="red-color underline view-link">https://www.travelo.com/booking-details/?=f4acb19f-9542-4a5c-b8ee</a>--}}
                </div>
            </div>
            @include('tours.template.booking._right-sidebar')
        </div>
    </div>

@endsection
