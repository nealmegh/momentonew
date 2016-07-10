<div class="sidebar col-sms-6 col-sm-4 col-md-4">
    <div class="booking-details travelo-box">
        <h4>Booking Details</h4>
        <article class="image-box hotel listing-style1">
            <figure class="clearfix">
                <a href="hotel-detailed.html" class="hover-effect middle-block" style="position: relative;">
                    <img width="150" height="150" src="{{ asset($booking->bookable->tour->images[1]->path.'/thumbnail/'.$booking->bookable->tour->images[1]->name) }}" class="middle-item wp-post-image" alt="9" style="position: absolute; top: 50%; margin-top: -37.5px; left: 50%; margin-left: -37.5px;">
                </a>
                <div class="travel-title">
                    <h5 class="box-title">
                        <a href="#">
                            {{ $booking->bookable->tour->title }}
                        </a>
                        <small>
                            {{ $booking->bookable->tour->city }}<br>
                            {{ $booking->bookable->tour->country }}
                        </small>
                    </h5>
                    <a href="hotel-detailed.html" class="button">EDIT</a>
                </div>

            </figure>
            <div class="details">
                <div class="feedback">
                    <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="" data-original-title="4 stars"><span style="width: 80%;" class="five-stars"></span></div>
                    <span class="review">0 reviews</span>
                </div>
                <div class="constant-column-3 timing clearfix">
                    <div class="check-in">
                        <label>Check in</label>
                        <span>
                             {{  date("M d, Y", strtotime($booking->bookable->tour->date_from)) }}<br>4pm
                        </span>
                    </div>
                    <div class="duration text-center">
                        <i class="soap-icon-clock"></i>
                        <span>
                            {{ $booking->bookable->total_days }} Days
                        </span>
                    </div>
                    <div class="check-out">
                        <label>Check out</label>
                        <span>
                            {{  date("M d, Y", strtotime($booking->bookable->tour->date_to)) }}<br>12pm
                        </span>
                    </div>
                </div>
                <div class="guest">
                    <small class="uppercase">
                        {{ $booking->bookable->tour->title }} <br/> booking for
                        <span class="skin-color">
                           {{ $booking->bookable->adults }} Adults and {{ $booking->bookable->kids }} Child
                        </span>
                    </small>
                </div>
            </div>
        </article>


        <h4>Other Details</h4>
        <dl class="other-details">
            <dt class="feature">Tour:</dt>
            <dd class="value">
                {{ $booking->bookable->tour->title }}
            </dd>
            <dt class="feature">{{ $booking->bookable->total_days   }} Days Stay:</dt>
            <dd class="value">
                {{ $settings->currency }} {{ $booking->total_price   }}
            </dd>
            <dt class="feature">taxes:</dt>
            <dd class="value">
                {{ number_format( $settings->tax, 2 ) }}%
            </dd>
            <dt class="feature">service charge:</dt>
            <dd class="value">
                {{ $settings->currency }} {{ number_format( $settings->service_charge, 2 ) }}
            </dd>
            <dt class="total-price">Total Price</dt>
            <dd class="total-price-value">
                {{ $settings->currency }} {{ number_format( ($booking->total_price )*($settings->tax/100)+($booking->total_price ), 2 )  }}

            </dd>
        </dl>
    </div>

    @include('common.widget.need-help')
</div>