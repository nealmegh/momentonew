@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Articles Manager'])
@stop

@section('admin-content')
<div class="tab-container full-width-style arrow-left dashboard">

    <ul class="tabs">
        <li class="active"><a href="{{ URL::previous() }}"><i class="soap-icon-arrow-left circle"></i>BACK</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active ">
            <div class="row block">

                <div class="tab-pane fade active in" id="hotels-tab">
                    <h1 class="no-margin skin-color">Hi {{ Auth::user()->first_name }}, Welcome to Momento</h1>
                    <p>All your trips booking with us will appear here and you’ll be able to manage everything!</p>
                    <hr>



    {!! Form::open(['method' => 'POST', 'url'=>'admin/booking/new-booking', 'class' => 'booking-form']) !!}

    <input type="hidden" name="booking_no" value="{{ uniqid() }}">
    <input type="hidden" name="redirect" value="admin">
    <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
    <input type="hidden" name="hotel_room_group_id" value="{{ $bookingInfo['room_type'] }}">
    <input type="hidden" name="rooms" value="{{ $bookingInfo['totalRoom'] }}">
    <input type="hidden" name="adults" value="{{ $bookingInfo['adult'] }}">
    <input type="hidden" name="kids" value="{{ $bookingInfo['kids'] }}">
    <input type="hidden" name="child_ages" value="{{ '10'}}">
    <input type="hidden" name="room_price" value="{{ $bookingInfo['price'] }}">
    <input type="hidden" name="tax" value="{{ '5' }}">
    <input type="hidden" name="total_price" value="{{ ($bookingInfo['price']*0.05)+$bookingInfo['price'] }}">
    <input type="hidden" name="currency_code" value="{{ 'BDT' }}">
    <input type="hidden" name="deposit_price" value="{{ '0.00' }}">
    <input type="hidden" name="date_from" value="{{ $bookingInfo['checkIn'] }}">
    <input type="hidden" name="date_to" value="{{ $bookingInfo['checkOut'] }}">
    <input type="hidden" name="user_id" value="{{ '0' }}">
    <input type="hidden" name="pin_code" value="{{ '0' }}">
    <input type="hidden" name="status" value="{{ '3' }}">
    <input type="hidden" name="mail_sent" value="{{ '0' }}">
    <input type="hidden" name="other" value="{{ '0' }}">
    <input type="hidden" name="route" value="hotel">


    <div class="person-information">
        <h2>Your Personal Information</h2>
        <div class="form-group row">
            <div class="col-sm-6 col-md-5">
                <label>first name</label>
                <input type="text" name="first_name" class="input-text full-width" value="" placeholder="">
            </div>
            <div class="col-sm-6 col-md-5">
                <label>last name</label>
                <input type="text" name="last_name" class="input-text full-width" value="" placeholder="">
            </div>
        </div>

        {{--<div class="form-group row">--}}
        {{--<div class="col-sm-6 col-md-5">--}}
        {{--<label>Password</label>--}}
        {{--<input type="password" name="password" class="input-text full-width" placeholder="password">--}}
        {{--</div>--}}
        {{--<div class="col-sm-6 col-md-5">--}}
        {{--<label>Verify Password</label>--}}
        {{--<input type="password"  name="password_confirmation" class="input-text full-width" placeholder="confirm password">--}}
        {{--</div>--}}
        {{--</div>--}}



        <div class="form-group row">
            <div class="col-sm-6 col-md-5">
                <label>email address</label>
                <input type="text" name="email" class="input-text full-width" value="" placeholder="">
            </div>
            <div class="col-sm-6 col-md-5">
                <label>Verify E-mail Address</label>
                <input type="text" name="email2" class="input-text full-width" value="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 col-md-5">
                <label>Country code</label>
                <div class="selector">
                    <select class="full-width" name="country_code">
                        @include('common.country-code')
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-5">
                <label>Phone number</label>
                <input type="text" name="phone_no" class="input-text full-width" value="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 col-md-5">
                <label>address</label>
                <input type="text" name="address" class="input-text full-width" value="" placeholder="">
            </div>
            <div class="col-sm-6 col-md-5">
                <label>city</label>
                <input type="text" name="city" class="input-text full-width" value="" placeholder="">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 col-md-5">
                <label>zip code</label>
                <input type="text" name="zip" class="input-text full-width" value="" placeholder="">
            </div>
            <div class="col-sm-6 col-md-5">
                <label>Country</label>
                <div class="selector">
                    <select class="full-widmmon.country-list" name="country">
                        @include('common.country-list')
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 col-md-10">
                <label>Special requirements</label>
                <textarea name="customer_note" class="full-width" rows="4"></textarea>
            </div>
        </div>
    </div>
    <hr>


    {{--<div class="form-group row">--}}
    {{--<div class="col-sm-12 col-md-12">--}}
    {{--<img src="http://www.soaptheme.net/wordpress/travelo/wp-content/themes/Travelo/captcha.php?width=400&amp;height=100&amp;characters=5" class="col-sm-6 col-md-5" alt="captcha">--}}
    {{--<div class="col-sm-6 col-md-5">--}}
    {{--<label>Security Code</label>--}}
    {{--<input id="security_code" class="input-text" name="security_code" type="text">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

                    <div class="form-group row">
                        <div class="col-sm-6 col-md-5">
                            <label>Payment Method</label>
                            <div class="selector">
                                {!! Form::select('payment_method', $paymentMethods, ['class'=>'input-text full-width']) !!}
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group row confirm-booking-btn">
                        <div class="col-sm-6 col-md-5">
                            <button type="submit" class="full-width btn-large">CONFIRM BOOKING</button>
                        </div>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection


