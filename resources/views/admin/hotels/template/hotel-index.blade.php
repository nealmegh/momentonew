@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Hotel Manager'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">
       @include('admin.hotels.template._left-nav')
        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                <h1 class="no-margin skin-color">Welcome back to Hotel Panel!</h1>
                <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>
                <br />
                <div class="row block">
                    @include('common.widget.total-product-counter')
                </div>


                <div class="notification-area">
                    <div class="info-box block">
                        <span class="close"></span>
                        <p>This is your Dashboard, the place to check your Profile, respond to Reservation Requests, view upcoming Trip Information, and much more.</p>
                        <br />
                        <ul class="circle">
                            <li><span class="skin-color">Learn How It Works</span> — Watch a short video that shows you how Travelo works.</li>
                            <li><span class="skin-color">Get Help</span> — View our help section and FAQs to get started on Travelo. </li>
                        </ul>
                    </div>
                </div>

                <div class="row block">
                    <div class="col-md-6 notifications">
                        <h2>Booking Notifications</h2>
                        @foreach($bookings as $booking)
                        <a href="#">
                            <div class="icon-box style1 fourty-space">
                                <i class="soap-icon-hotel-1 sky-blue"></i>
                                <span class="time pull-right">JUST NOW</span>
                                <p class="box-title">{{ $booking->booking_no }} <span class="price">{{ $settings->currency.$booking->total_price }}</span></p>
                            </div>
                        </a>
                        @endforeach

                    </div>
                    <div class="col-md-6">
                        <h2>Recent Activity</h2>
                        <div class="recent-activity">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="icon soap-icon-support circle takeoff-effect yellow-color"></i>
                                        <span class="price"><small>avg/person</small>$120</span>
                                        <h4 class="box-title">
                                            Indianapolis to Paris<small>Oneway flight</small>
                                        </h4>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon soap-icon-myspace circle red-color"></i>
                                        <span class="price"><small>per day</small>$45.39</span>
                                        <h4 class="box-title">
                                            Economy Car<small>bmw mini</small>
                                        </h4>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon soap-icon-friends circle green-color"></i>
                                        <span class="price"><small>from</small>$578</span>
                                        <h4 class="box-title">
                                            Jacksonville to Asia<small>4 nights</small>
                                        </h4>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon soap-icon-user circle blue-color"></i>
                                        <span class="price"><small>Avg/night</small>$620</span>
                                        <h4 class="box-title">
                                            Hilton Hotel &amp; Resorts<small>Paris france</small>
                                        </h4>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon soap-icon-user circle blue-color"></i>
                                        <span class="price"><small>avg/night</small>$170</span>
                                        <h4 class="box-title">
                                            Roosevelt Hotel<small>new york</small>
                                        </h4>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon soap-icon-support circle takeoff-effect yellow-color"></i>
                                        <span class="price"><small>avg/person</small>$348</span>
                                        <h4 class="box-title">
                                            Mexico to England<small>return flight</small>
                                        </h4>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection