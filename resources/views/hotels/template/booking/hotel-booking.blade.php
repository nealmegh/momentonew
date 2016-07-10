@extends('hotels.layout.detail')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Hotel Detail'])
@stop

@section('main-content')

                    <div class="booking-section travelo-box">

                        {!! Form::open(['method' => 'POST', 'url'=>'hotels/booking', 'class' => 'booking-form']) !!}

                        <input type="hidden" name="booking_no" value="{{ uniqid() }}">
                        <input type="hidden" name="pin_code" value="{{ mt_rand(100000, 999999) }}">
                        <input type="hidden" name="payment_method" value="null">
                        <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
                        <input type="hidden" name="hotel_room_group_id" value="{{ $roomType[0]->id }}">
                        <input type="hidden" name="rooms" value="{{ $bookingInfo['totalRoom'] }}">
                        <input type="hidden" name="adults" value="{{ $bookingInfo['adult'] }}">
                        <input type="hidden" name="kids" value="{{ $bookingInfo['kids'] }}">
                        <input type="hidden" name="child_ages" value="{{ '10'}}">
                        <input type="hidden" name="room_price" value="{{ $bookingInfo['price'] }}">
                        <input type="hidden" name="tax" value="{{ $settings->tax }}">
                        <input type="hidden" name="total_price" value="{{ ($bookingInfo['price']*($settings->tax/100))+$bookingInfo['price'] + $settings->service_charge }}">
                        <input type="hidden" name="currency_code" value="{{ 'BDT' }}">
                        <input type="hidden" name="deposit_price" value="{{ '0.00' }}">
                        <input type="hidden" name="date_from" value="{{ $bookingInfo['checkIn'] }}">
                        <input type="hidden" name="date_to" value="{{ $bookingInfo['checkOut'] }}">
                        <input type="hidden" name="user_id" value="@if(Auth::check()) {{ Auth::user()->id }} @else {{ '0' }} @endif">
                        <input type="hidden" name="pin_code" value="{{ '0' }}">
                        <input type="hidden" name="status" value="{{ '0' }}">
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




                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <label>email address</label>
                                        <input type="text" name="email" class="input-text full-width" value="" placeholder="">
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
                                        <label>Country</label>
                                        <div class="selector">
                                            <select class="full-width" name="country">
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
                                    <img width="150" height="150" src="{{ asset($hotel->images[1]->path.'/thumbnail/'.$hotel->images[1]->name) }}" class="middle-item wp-post-image" alt="9" style="position: absolute; top: 50%; margin-top: -37.5px; left: 50%; margin-left: -37.5px;">					</a>
                                <div class="travel-title">
                                    <h5 class="box-title">
                                        <a href="#">{{ $hotel->name }}</a>
                                        <small>
                                            {{ $hotel->city }}<br>
                                            {{ $hotel->country }}
                                        </small>
                                    </h5>
                                    <a href="#?date_from=04/30/2015&amp;date_to=05/02/2015&amp;rooms=1&amp;adults=1&amp;kids=0&amp;child_ages%5B0%5D=0" class="button">EDIT</a>
                                </div>
                            </figure>
                            <div class="details">
                                <div class="feedback">
                                    <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="" data-original-title="0 stars"><span style="width: {{ $hotel->grade->id*20 }}%;" class="five-stars"></span></div>
                                    <span class="review">0 reviews</span>
                                </div>
                                <div class="constant-column-3 timing clearfix">
                                    <div class="check-in">
                                        <label>Check in</label>
                                        <span>{{  date("M d, Y", strtotime($bookingInfo['checkIn'])) }}<br>2pm</span>
                                    </div>
                                    <div class="duration text-center">
                                        <i class="soap-icon-clock"></i>
							<span>
								{{  $bookingInfo['dayCount'] }} Nights
                            </span>
                                    </div>
                                    <div class="check-out">
                                        <label>Check out</label>
                                        <span>{{  date("M d, Y", strtotime($bookingInfo['checkOut'])) }}<br>12pm</span>
                                    </div>
                                </div>
                                <div class="guest">
                                    <small class="uppercase">{{ $bookingInfo['totalRoom'] }} {{ $roomType[0]->room_type }} for <span class="skin-color">{{ $bookingInfo['adult'] }} Adults</span></small>
                                </div>
                            </div>
                        </article>

                        <h4>Other Details</h4>
                        <dl class="other-details">
                            <dt class="feature">Room Type:</dt><dd class="value">{{ $roomType[0]->room_type }}</dd>
                            <dt class="feature">1 night Stay:</dt><dd class="value">{{ $settings->currency }} {{ $bookingInfo['price'] }}.00</dd>
                            <dt class="feature">taxes:</dt><dd class="value">{{ number_format($settings->tax, 2) }}%</dd>
                            <dt class="feature">service Charge:</dt><dd class="value">{{ $settings->currency }}  {{ number_format($settings->service_charge, 2) }}</dd>
                            <dt class="total-price">Total Price</dt><dd class="total-price-value">{{ $settings->currency }} {{ ($bookingInfo['price']*($settings->tax/100))+$bookingInfo['price'] + $settings->service_charge}}.00</dd>
                        </dl>

                    </div>
                    @include('common.widget.need-help')

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