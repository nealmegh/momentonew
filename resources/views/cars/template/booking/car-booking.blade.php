@extends('cars.layout.detail')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Car Detail'])
@stop

@section('main-content')
    <?php

    $datetime1 = date_create($request->date_from);
    $datetime2 = date_create($request->date_to);
    $interval = date_diff($datetime1, $datetime2);
    $interval = $interval->format('%a') + 1;
    $subTotal = $interval*$car->whole_day_price;

    ?>

                    <div class="booking-section travelo-box">

                        {!! Form::open(['method' => 'POST', 'url'=>'cars/booking', 'class' => 'booking-form']) !!}

                        <input type="hidden" name="booking_no" value="{{ uniqid() }}">
                        <input type="hidden" name="car_id" value="{{ $car->id }}">
                        <input type="hidden" name="adults" value="{{ $bookingInfo['adult'] }}">
                        <input type="hidden" name="kids" value="{{ $bookingInfo['kids'] }}">
                        <input type="hidden" name="child_ages" value="{{ '10'}}">
                        <input type="hidden" name="tax" value="{{ $settings->tax }}">
                        <input type="hidden" name="total_price" value="{{ $subTotal }}">
                        <input type="hidden" name="currency_code" value="{{ 'BDT' }}">
                        <input type="hidden" name="deposit_price" value="{{ '0.00' }}">
                        <input type="hidden" name="date_from" value="{{ $car->date_from }}">
                        <input type="hidden" name="date_to" value="{{ $car->date_to }}">
                        <input type="hidden" name="total_days" value=" {{ $interval }}">
                        <input type="hidden" name="user_id" value="{{ '0' }}">
                        <input type="hidden" name="pin_code" value="{{ '0' }}">
                        <input type="hidden" name="status" value="{{ '1' }}">
                        <input type="hidden" name="mail_sent" value="{{ '0' }}">
                        <input type="hidden" name="other" value="{{ '0' }}">
                        <input type="hidden" name="route" value="car">

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

                                {{--<div class="row form-group">--}}
                                    {{--<div class="col-sm-12 col-md-12">--}}
                                       {{--{!! Form::label('date', 'Date of Birth') !!}--}}
                                    {{--</div>--}}
                                    {{--<div class="col-xs-4 col-sm-2">--}}
                                        {{--<div class="selector">--}}
                                            {{--{!! Form::selectRange('date', 01, 31, ['class'=>'full-width']) !!}--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-xs-4 col-sm-2">--}}
                                        {{--<div class="selector">--}}
                                            {{--{!! Form::selectMonth('month', ['class'=>'full-width']) !!}--}}

                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-xs-4 col-sm-2">--}}
                                        {{--<div class="selector">--}}
                                            {{--{!! Form::selectRange('year', Carbon\Carbon::now()->toDateTimeString(), 1955, ['class'=>'full-width']) !!}--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <hr>
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
                                            {!! Form::select('country', ['Bangladesh'=>'Bangladesh'], null, ['class'=>'full-width'] ) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 col-md-10">
                                        <label>Special requirements</label>
                                        <textarea name="special_requirements" class="full-width" rows="4"></textarea>
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
                            {{--<hr>--}}


                            <div class="form-group row confirm-booking-btn">
                                <div class="col-sm-6 col-md-5">
                                    <button type="submit" class="full-width btn-large">CONFIRM BOOKING</button>
                                </div>
                            </div>
                        {!! Form::close() !!}


                    </div>



                    @stop

@section('right-sidebar')

                    <div class="booking-details travelo-box">


                        <h4>Booking Details</h4>
                        <article class="image-box hotel listing-style1">
                            <figure class="clearfix">
                                <a href="#" class="hover-effect middle-block" style="position: relative;">
                                @if(!empty($car->images[0]))
                                    <img width="150" height="150" src="{{ asset($car->images[0]->path.'/'.$car->images[0]->name) }}" class="middle-item wp-post-image" alt="9" style="position: absolute; top: 50%; margin-top: -37.5px; left: 50%; margin-left: -37.5px;">
                                @else
                                <img width="150" height="150" src="/images/no-image.png" class="middle-item wp-post-image" alt="9" style="position: absolute; top: 50%; margin-top: -37.5px; left: 50%; margin-left: -37.5px;">
                                @endif
                                </a>
                                <div class="travel-title">
                                    <h5 class="box-title">
                                        <a href="#">
                                            {{ $car->title }}
                                        </a>
                                        <small>
                                            {{ $car->type }}
                                        </small>
                                    </h5>
                                    <a href="#?date_from=04/30/2015&amp;date_to=05/02/2015&amp;rooms=1&amp;adults=1&amp;kids=0&amp;child_ages%5B0%5D=0" class="button">EDIT</a>
                                </div>
                            </figure>
                            <div class="details">
                                <div class="feedback">
                                    <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="" data-original-title="0 stars"><span style="width: 100%;" class="five-stars"></span></div>
                                    <span class="review">5 reviews</span>
                                </div>
                                <div class="constant-column-3 timing clearfix">
                                    <div class="check-in">
                                        <label>Car Start</label>
                                        <span>
                                            {{  date("M d, Y", strtotime($request->date_from)) }}<br>
                                        </span>
                                    </div>
                                    <div class="duration text-center">
                                        <i class="soap-icon-clock"></i>
							<span>
                                     {{ $interval }} Days
                            </span>
                                    </div>
                                    <div class="check-out">
                                        <label>Car End</label>
                                        <span>
                                            {{  date("M d, Y", strtotime($request->date_to)) }}<br>
                                        </span>
                                    </div>
                                </div>
                                <div class="guest">
                                    <small class="uppercase">
                                            {{ $car->title }} <br/> booking for
                                        <span class="skin-color">
                                            Full Day Booking
                                        </span>
                                    </small>
                                </div>
                            </div>
                        </article>

                        <h4>Other Details</h4>
                        <dl class="other-details">
                            <dt class="feature">Car:</dt>
                                <dd class="value">
                                    {{ $car->title }}
                                </dd>
                            <dt class="feature">Car Rent for {{ $interval }} Days:</dt>
                                <dd class="value">
                                    {{ $settings->currency }} {{ $subTotal  }}
                                </dd>
                            <dt class="feature">taxes and fees:</dt>
                                <dd class="value">
                                    5.00%
                                </dd>
                            <dt class="total-price">Total Price</dt>
                                <dd class="total-price-value">
                                    {{ $settings->currency }} {{ ($subTotal)*0.05+($subTotal)  }}

                                </dd>
                        </dl>
                        {{--<a href="#" class="show-price-detail" data-show-desc="Show Price Detail" data-hide-desc="Hide Price Detail">Show Price Detail</a><br>--}}

                    </div>

                    <div id="travcontactwidget-5" class="contact-box widget travelo-box widget_travcontactwidget">
                        <h4 class="widgettitle">Need Travelo Help?</h4>
                        <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                        <address class="contact-details">
                            <span class="contact-phone"><i class="soap-icon-phone"></i> 1-800-123-HELLO</span>
                            <br><a class="contact-email" href="mailto:contact@travelo.com">contact@travelo.com</a>
                        </address>
                    </div>

    </div>
@endsection

@section('footer')
            <script>
                tjq = jQuery;

                tjq(document).ready(function(){

                    //validation form
                    tjq('.booking-form').validate({
                        rules: {
                            first_name: { required: true},
                            last_name: { required: true},
                            email: { required: true, email: true},
                            email2: { required: true, equalTo: 'input[name="email"]'},
                            phone: { required: true},
                            address: { required: true},
                            city: { required: true},
                            zip: { required: true},
                            security_code: { required: true}
                        },
                        submitHandler: function (form) {
                            var booking_data = tjq('.booking-form').serialize();
                            tjq.ajax({
                                type: "POST",
                                url: ajaxurl,
                                data: booking_data,
                                success: function ( response ) {
                                    if ( response.success == 1 ) {
                                        var confirm_url = tjq('.booking-form').attr('action')
                                        if ( confirm_url.indexOf('?') > -1 ) {
                                            confirm_url = confirm_url + '&';
                                        } else {
                                            confirm_url = confirm_url + '?';
                                        }
                                        confirm_url = confirm_url + 'booking_no=' + response.result.booking_no + '&pin_code=' + response.result.pin_code + '&transaction_id=' + response.result.transaction_id + '&message=1';
                                        if ( response.payment == 'paypal' ) {
                                            tjq('.confirm-booking-btn').before('<div class="alert alert-success">You will be redirected to paypal.<span class="close"></span></div>');
                                        }
                                        tjq('.confirm-booking-btn').hide();
                                        setTimeout( function(){ tjq('.opacity-ajax-overlay').show(); }, 500 );
                                        window.location.href = confirm_url;
                                    } else if ( response.success == -1 ) {
                                        alert( response.result );
                                        setTimeout( function(){ tjq('.opacity-ajax-overlay').show(); }, 500 );
                                        window.location.href = 'http://www.soaptheme.net/wordpress/travelo/accommodation/carnival-palace-hotel/?date_from=04/30/2015&amp;date_to=05/02/2015&amp;rooms=1&amp;adults=1&amp;kids=0&amp;child_ages%5B0%5D=0';
                                    } else {
                                        console.log( response );
                                        trav_show_modal( 0, response.result, '' );
                                    }
                                }
                            });
                            return false;
                        }
                    });

                    tjq('.show-price-detail').click( function(e){
                        e.preventDefault();
                        tjq('.price-details').toggle();
                        if (tjq('.price-details').is(':visible')) {
                            tjq(this).html( tjq(this).data('hide-desc') );
                        } else {
                            tjq(this).html( tjq(this).data('show-desc') );
                        }
                        return false;
                    });
                });
            </script>
@endsection