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
            {{--<h1 class="big-caption">Thank's for your booking  <em>Submission!</em></h1>--}}
            {{--<h2 class="med-caption">We're bringing you a modern, comfortable,--}}
            {{--<br>and connected flight experience</h2>--}}
        </div>
    </div>

    <div class="container">
        <div id="main" class="md-section">
            <div id="main" class="col-sms-6 col-sm-8 col-md-12">
                @if( isset($booking) && $booking != null )
                <div class="booking-section travelo-box">

                    {!! Form::model($booking) !!}

                        <div class="person-information">
                            <h2>Your Personal Information</h2>

                            <h4>Hello, <span style="color: #01b7f2;">{{ $booking->guest->first_name.' '.$booking->guest->last_name }}</span></h4>
                            <p>Your Booking No: {{ $booking->booking_no }}</p>
                            {{--<p>Total: {{ $settings->currency }} {{ $booking->total_price }}</p>--}}

                        </div>

                        <hr>
                        <div class="card-information">
                            <h2>Your Payment Information</h2>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">
                                    <label for="payment_method">Payment Method</label>
                                    <div class="selector">
                                        {!! Form::select('payment_method', $paymentMethod, null, ['class'=>'full-width']) !!}
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-5">
                                    {{--<label>Card holder name</label>--}}
                                    {{--<input type="text" class="input-text full-width" value="" placeholder="">--}}
                                </div>
                            </div>
                            @if(Input::has('payment_method') == 'bKash')
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">
                                    <label>bKash Phone Number</label>
                                    <input type="text" name="no" class="input-text full-width" value="" placeholder="(880) 1XXX XXX XXX">
                                </div>
                                <div class="col-sm-6 col-md-5">
                                    <label>bKash Transaction Number</label>
                                    <input type="text" name="transaction_no" class="input-text full-width" value="" placeholder="">
                                </div>
                            </div>
                            @endif

                            @if(Input::has('payment_method') == 'card')
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <label>bKash Phone Number</label>
                                        <input type="text" name="no" class="input-text full-width" value="" placeholder="(880) 1XXX XXX XXX">
                                    </div>
                                    <div class="col-sm-6 col-md-5">
                                        <label>bKash Transaction Number</label>
                                        <input type="text" name="transaction_no"  class="input-text full-width" value="" placeholder="">
                                    </div>
                                </div>
                            @endif

                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> By continuing, you agree to the <a href="{{ url('policy') }}"><span class="skin-color">Terms and Conditions</span></a>.
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 col-md-5">
                                <button type="submit" class="full-width btn-large">CONFIRM BOOKING</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
                @else
                    <div class="booking-section travelo-box">
                       @if(Input::has('pin') && Input::get('pin') != null)
                            <div class="alert alert-danger">
                                <strong>Error!</strong> Your Pin no is not valid.
                            </div>
                       @endif
                        <h1 class="text-center">Please Enter Your Pin Code</h1>
                        {!! Form::open( ['method'=>'get', 'style'=>'width: 500px; margin: 0 auto;']) !!}
                        <div class="row form-group">
                        {!! Form::text('pin', null, ['class'=>'input-text col-md-10', 'placeholder'=>'Please Enter Your 6 Digit No']) !!}
                        <button type="submit" class="btn-primary">Submit</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                @endif



            </div>

{{--            @include('booking.template._right-sidebar')--}}
        </div>
    </div>

@endsection
