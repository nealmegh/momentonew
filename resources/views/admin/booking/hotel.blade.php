@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Booking Dashboard'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">
        @include('admin.booking._left-nav')
        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                <h1 class="no-margin skin-color">Hi {{ Auth::user()->first_name }}, Welcome to Momento</h1>
                <p>All your trips booking with us will appear here and you’ll be able to manage everything!</p>
                <br>
                <div class="row block">
                    <div class="col-sm-6 col-md-3">
                        <a href="hotel-list-view.html">
                            <div class="fact blue">
                                <div class="numbers counters-box">
                                    <dl>
                                        <dt class="display-counter" data-value="3200">3200</dt>
                                        <dd>Hotels to Stay</dd>
                                    </dl>
                                    <i class="icon soap-icon-hotel"></i>
                                </div>
                                <div class="description">
                                    <i class="icon soap-icon-longarrow-right"></i>
                                    <span>View Hotels</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <a href="flight-list-view.html">
                            <div class="fact yellow">
                                <div class="numbers counters-box">
                                    <dl>
                                        <dt class="display-counter" data-value="4509">4509</dt>
                                        <dd>Airlines to Travel</dd>
                                    </dl>
                                    <i class="icon soap-icon-plane"></i>
                                </div>
                                <div class="description">
                                    <i class="icon soap-icon-longarrow-right"></i>
                                    <span>View Flights</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <a href="car-list-view.html">
                            <div class="fact red">
                                <div class="numbers counters-box">
                                    <dl>
                                        <dt class="display-counter" data-value="3250">3250</dt>
                                        <dd>VIP Transports</dd>
                                    </dl>
                                    <i class="icon soap-icon-car"></i>
                                </div>
                                <div class="description">
                                    <i class="icon soap-icon-longarrow-right"></i>
                                    <span>View Cars</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <a href="cruise-list-view.html">
                            <div class="fact green">
                                <div class="numbers counters-box">
                                    <dl>
                                        <dt class="display-counter" data-value="1570">1570</dt>
                                        <dd>Tour Package</dd>
                                    </dl>
                                    <i class="icon soap-icon-places flip-effect"></i>
                                </div>
                                <div class="description">
                                    <i class="icon soap-icon-longarrow-right"></i>
                                    <span>View Package</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>


                <div class="row block">
                    <div class="col-md-12 notifications">
                        <h2>Notifications</h2>
                        @foreach($bookings as $booking)
                            <a href="{{ url('admin/booking/detail/'.$booking->booking_no) }}">
                                <div class="icon-box style1 fourty-space">
                                    <i class="soap-icon-hotel yellow-bg"></i>
                    <span class="time pull-right">
                        {{ date('F d, Y', strtotime($booking->bookable->created_at)) }}

                        {{ $booking->bookable->bookingStatus->status_name }}

                    </span>
                                    <p class="box-title">

                                        {{ $booking->bookable->hotel->name }}

                                        <span class="price">

                                {{ $settings->currency }} {{ $booking->bookable->total_price }}

                        </span>
                                    </p>
                                </div>
                            </a>
                        @endforeach

                        <a href="#">
                            <div class="load-more">. . . . . . . . . . . . . </div>
                        </a>
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <h4>Benefits of Tavelo Account</h4>
                        <ul class="benefits triangle hover">
                            <li><a href="#">Faster bookings with lesser clicks</a></li>
                            <li><a href="#">Track travel history &amp; manage bookings</a></li>
                            <li class="active"><a href="#">Manage profile &amp; personalize experience</a></li>
                            <li><a href="#">Receive alerts &amp; recommendations</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 previous-bookings image-box style14">
                        <h4>Your Previous Bookings</h4>
                        <article class="box">
                            <figure class="no-padding">
                                <a title="" href="#">
                                    <img alt="" src="/images/dashboard/booking1.png" width="63" height="59">
                                </a>
                            </figure>
                            <div class="details">
                                <h5 class="box-title"><a href="#">Half-Day Island Tour</a><small class="fourty-space"><span class="price">$35</span> Family Package</small></h5>
                            </div>
                        </article>
                        <article class="box">
                            <figure class="no-padding">
                                <a title="" href="#">
                                    <img alt="" src="/images/dashboard/booking2.png" width="63" height="59">
                                </a>
                            </figure>
                            <div class="details">
                                <h5 class="box-title"><a href="#">Ocean Park Tour</a><small class="fourty-space"><span class="price">$26</span> Per Person</small></h5>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <h4>Need Travelo Help?</h4>
                        <div class="contact-box">
                            <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                            <address class="contact-details">
                                <span class="contact-phone"><i class="soap-icon-phone"></i> 1-800-123-HELLO</span>
                                <br>
                                <a class="contact-email" href="#">help@travelo.com</a>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection