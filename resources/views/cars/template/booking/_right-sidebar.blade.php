<div class="sidebar col-sms-6 col-sm-4 col-md-3">
    <div class="booking-details travelo-box">
        <h4>Booking Details</h4>
        <article class="image-box hotel listing-style1">
            <figure class="clearfix">
                <a href="hotel-detailed.html" class="hover-effect middle-block" style="position: relative;">
                    <img width="150" height="150" src="{{ asset($booking->bookable->car->images[1]->path.'/thumbnail/'.$booking->bookable->car->images[1]->name) }}" class="middle-item wp-post-image" alt="9" style="position: absolute; top: 50%; margin-top: -37.5px; left: 50%; margin-left: -37.5px;">
                </a>
                <div class="travel-title">
                    <h5 class="box-title">
                        <a href="#">
                            {{ $booking->bookable->car->title }}
                        </a>
                        <small>
                            {{ $booking->bookable->car->city }}<br>
                            {{ $booking->bookable->car->country }}
                        </small>
                    </h5>
                    <a href="hotel-detailed.html" class="button">EDIT</a>
                </div>

            </figure>
            <div class="details">
                <div class="feedback">
                    <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="" data-original-title="4 stars"><span style="width: 80%;" class="five-stars"></span></div>
                    <span class="review">270 reviews</span>
                </div>
                <div class="constant-column-3 timing clearfix">
                    <div class="check-in">
                        <label>Check in</label>
                        <span>
                             {{  date("M d, Y", strtotime($booking->bookable->car->date_from)) }}<br>4pm
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
                            {{  date("M d, Y", strtotime($booking->bookable->car->date_to)) }}<br>12pm
                        </span>
                    </div>
                </div>
                <div class="guest">
                    <small class="uppercase">
                        {{ $booking->bookable->car->title }} <br/> booking for
                        <span class="skin-color">
                           {{ $booking->bookable->adults }} Adults and {{ $booking->bookable->kids }} Child
                        </span>
                    </small>
                </div>
            </div>
        </article>


        <h4>Other Details</h4>
        <dl class="other-details">
            <dt class="feature">Car:</dt>
            <dd class="value">
                {{ $booking->bookable->car->title }}
            </dd>
            <dt class="feature">{{ $booking->bookable->total_days   }} Days Stay:</dt>
            <dd class="value">
                {{ $settings->currency }} {{ $booking->total_price   }}
            </dd>
            <dt class="feature">taxes and fees:</dt>
            <dd class="value">
                5.00%
            </dd>
            <dt class="total-price">Total Price</dt>
            <dd class="total-price-value">
                {{ $settings->currency }} {{ ($booking->total_price )*0.05+($booking->total_price )  }}

            </dd>
        </dl>
    </div>

    <div class="travelo-box contact-box">
        <h4>Need Travelo Help?</h4>
        <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
        <address class="contact-details">
            <span class="contact-phone"><i class="soap-icon-phone"></i> 1-800-123-HELLO</span>
            <br>
            <a class="contact-email" href="#">help@travelo.com</a>
        </address>
    </div>
</div>