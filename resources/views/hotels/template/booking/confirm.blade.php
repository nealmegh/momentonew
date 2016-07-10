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


        <div class="banner imagebg-container" style="height: 350px; background-image: url(/images/pages/extra/inflight-experience-banner1.jpg);">
            <div class="container">
            </div>
        </div>
        <div class="tab-wrapper">
            <div class="tab-container container trans-style">
                <ul class="tabs no-padding">
                    <li><a  href="{{ url('hotels/booking/confirm/'.$booking->booking_no.'/print-preview') }}"><i class="soap-icon-stories"></i>Print Reservation</a></li>
                    @if( $booking->status == 2 )
                    <li><a  href="{{ url('hotels/booking/complete/'.$booking->booking_no) }}"><i class="soap-icon-shopping-3"></i>Complete Reservation</a></li>
                    @endif
                    <li><a  href="{{ url('hotels/booking/cancel/'.$booking->booking_no) }}"><i class="soap-icon-liability"></i>Cancel Booking</a></li>
                    <li><a  href="{{ url('hotels/booking/edit/'.$booking->booking_no.'') }}"><i class="soap-icon-passenger"></i>Modify Traveller Info</a></li>
                    <li><a  href="#emergency-ready"><i class="soap-icon-support"></i>Need Help</a></li>
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
                        <h2>Booking Confirmation</h2>
                        <hr>
                        <div class="booking-confirmation clearfix">
                            <i class="soap-icon-recommend icon circle"></i>
                            <div class="message">
                                <h4 class="main-message">Thank You. Your Booking Order is Taken.</h4>
                                <p>A confirmation email has been sent to your provided email address.</p>
                            </div>
                            @if( $booking->status == 3 )
                            <div class="button btn-small print-button uppercase">Complete Reservation</div>
                            @endif
                        </div>
                        <hr>
                        <h2>Traveler Information</h2>
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
                        <hr>
                        <h2>Payment:</h2>
                        <p>{!! $booking->paymentMethod->terms !!}</p>
                        <br>
                        <p class="red-color">Payment Method: {!! $booking->paymentMethod->name !!}.</p>
                        <hr>
                        <h2>Cancellation Policy:</h2>
                        {!! $booking->bookable->service->cancellation !!}
                        <br>
                        {{--<a href="#" class="red-color underline view-link">https://www.travelo.com/booking-details/?=f4acb19f-9542-4a5c-b8ee</a>--}}
                    </div>
                </div>
                @include('hotels.template.booking._right-sidebar')
            </div>
        </div>

@endsection
