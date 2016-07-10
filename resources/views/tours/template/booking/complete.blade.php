@extends('tour.tour-master')

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
            <div id="main" class="col-sms-6 col-sm-8 col-md-9">

                <div class="booking-section travelo-box">


                    {!! Form::open(['url'=>'booking-complete']) !!}

                        <div class="person-information">
                            <h2>Your Personal Information</h2>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">
                                    {!! Form::label('first_name', 'First Name') !!}
                                    {!! Form::text('first_name', $booking->guest, ['class'=>'input-text full-width']) !!}
                                </div>
                                <div class="col-sm-6 col-md-5">
                                    {!! Form::label('last_name', 'Last Name') !!}
                                    {!! Form::text('last_name', $booking->guest->last_name, ['class'=>'input-text full-width']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">
                                    {!! Form::label('email', 'Email Address') !!}
                                    {!! Form::email('email', $booking->guest->email, ['class'=>'input-text full-width']) !!}
                                </div>
                                <div class="col-sm-6 col-md-5">
                                    {!! Form::label('email_confirmation', 'Email Address') !!}
                                    {!! Form::email('email_confirmation', null, ['class'=>'input-text full-width']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">
                                    <div class="selector">
                                        {!! Form::label('country', 'Country Code') !!}
                                        <div class="selector">
                                            {!! Form::select('country', ['+880'=>'Bangladesh (+880)', '+1'=>'United States (+1)'], ['class'=>'full-width']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-5">
                                    {!! Form::label('phone_no', 'Phone Number') !!}
                                    {!! Form::text('phone_no', null, ['class'=>'input-text full-width']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input name="is_receive_promotion" type="checkbox" value="1"> I want to receive <span class="skin-color">Momento</span> promotional offers in the future
                                    </label>
                                </div>
                            </div>
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
                                    <label>Card holder name</label>
                                    <input type="text" class="input-text full-width" value="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">
                                    <label>Card number</label>
                                    <input type="text" class="input-text full-width" value="" placeholder="">
                                </div>
                                <div class="col-sm-6 col-md-5">
                                    <label>Card identification number</label>
                                    <input type="text" class="input-text full-width" value="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-5">
                                    <label>Expiration Date</label>
                                    <div class="constant-column-2">
                                        <div class="selector">
                                            <select class="full-width">
                                                <option>month</option>
                                            </select><span class="custom-select full-width">month</span>
                                        </div>
                                        <div class="selector">
                                            <select class="full-width">
                                                <option>year</option>
                                            </select><span class="custom-select full-width">year</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-2">
                                    <label>billing zip code</label>
                                    <input type="text" class="input-text full-width" value="" placeholder="">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> By continuing, you agree to the <a href="#"><span class="skin-color">Terms and Conditions</span></a>.
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
            </div>
            @include('hotels.template.booking._right-sidebar')
        </div>
    </div>

@endsection
