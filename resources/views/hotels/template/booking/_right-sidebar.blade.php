<?php $diff = date_diff(date_create($booking->bookable->date_from), date_create($booking->bookable->date_to)); ?>

<div class="sidebar col-sms-6 col-sm-4 col-md-4">
    <div class="booking-details travelo-box">
        <h4>Booking Details</h4>
        <article class="image-box hotel listing-style1">
            <figure class="clearfix">
                <a href="hotel-detailed.html" class="hover-effect middle-block" style="position: relative;">
                    <img class="middle-item" width="270" height="161" alt="" src="{{ asset($booking->bookable->hotel->images[1]->path.'/thumbnail/'.$booking->bookable->hotel->images[1]->name) }}" style="position: absolute; top: 50%; margin-top: -37.5px; left: 50%; margin-left: -63px;">
                </a>
                <div class="travel-title">
                    <h5 class="box-title">{{ $booking->bookable->hotel->name }}<small>{{ $booking->bookable->hotel->city }}, {{ $booking->bookable->hotel->country }}</small></h5>
                    {{--<a href="hotel-detailed.html" class="button">EDIT</a>--}}
                </div>

            </figure>
            <div class="details">
                <div class="feedback">
                    <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="" data-original-title="4 stars"><span style="width: {{ $booking->bookable->hotel->grade->id*20 }}%;" class="five-stars"></span></div>
                    <span class="review">{{ count($booking->bookable->hotel->comments) }} reviews</span>
                </div>
                <div class="constant-column-3 timing clearfix">
                    <div class="check-in">
                        <label>Check in</label>
                        <span>{{$booking->bookable->date_from}}<br>2PM</span>
                    </div>
                    <div class="duration text-center">
                        <i class="soap-icon-clock"></i>
                        <span>@if($diff->format("%a") == 0) {{ '0' }} @else {{ $diff->format("%a")  }} @endif Nights</span>
                    </div>
                    <div class="check-out">
                        <label>Check out</label>
                        <span>{{$booking->bookable->date_to}}<br>12PM</span>
                    </div>
                </div>
                <div class="guest">
                    <small class="uppercase">{{$booking->bookable->rooms}} {{$booking->bookable->roomType->room_type}} <span class="skin-color">{{$booking->bookable->adults}} Persons</span></small>
                </div>
            </div>
        </article>


        <h4>Other Details</h4>
        <dl class="other-details">
            <dt class="feature">room Type:</dt><dd class="value">{{$booking->bookable->roomType->room_type}}</dd>
            <dt class="feature">per Room price:</dt><dd class="value">{{ $settings->currency }}{{ $booking->bookable->room_price }}</dd>
            <dt class="feature">@if($diff->format("%a") == 0) {{ '0' }} @else {{ $diff->format("%a")  }} @endif night Stay:</dt><dd class="value">{{ $settings->currency }}{{$booking->total_price}}</dd>
            <dt class="feature">taxes:</dt><dd class="value">{{ $settings->currency }} {{ number_format( $booking->bookable->room_price*$booking->tax/100, 2) }}</dd>
            <dt class="feature">service charge:</dt><dd class="value">{{ $settings->currency }}{{ $settings->service_charge }}</dd>
            <dt class="total-price">Total Price</dt><dd class="total-price-value">{{ $settings->currency }} {{$booking->total_price}}</dd>
        </dl>
    </div>

    @include('common.widget.need-help')
</div>