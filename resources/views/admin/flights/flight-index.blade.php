@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Flight Manager'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">
       @include('admin.flights._left-nav')
        <div class="tab-content">
            <div id="dashboard" class="tab-pane fade in active">
                <h1 class="no-margin skin-color">Welcome back to Flight Panel!</h1>
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
                        <a href="#">
                            <div class="icon-box style1 fourty-space">
                                <i class="soap-icon-support takeoff-effect yellow-bg"></i>
                                <span class="time pull-right">JUST NOW</span>
                                <p class="box-title">London to Paris flight in <span class="price">$120</span></p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="icon-box style1 fourty-space">
                                <i class="soap-icon-user blue-bg"></i>
                                <span class="time pull-right">10 Mins ago</span>
                                <p class="box-title">Hilton hotel &amp; resorts in <span class="price">$247</span></p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="icon-box style1 fourty-space">
                                <i class="soap-icon-myspace red-bg"></i>
                                <span class="time pull-right">39 Mins ago</span>
                                <p class="box-title">Economy flight for 2 days in <span class="price">$39</span></p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="icon-box style1 fourty-space">
                                <i class="soap-icon-friends green-bg"></i>
                                <span class="time pull-right">1 hour ago</span>
                                <p class="box-title">Baja Mexico 4 nights in <span class="price">$537</span></p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="icon-box style1 fourty-space">
                                <i class="soap-icon-user blue-bg"></i>
                                <span class="time pull-right">2 hours ago</span>
                                <p class="box-title">Roosevelt hotel in <span class="price">$170</span></p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="icon-box style1 fourty-space">
                                <i class="soap-icon-user blue-bg"></i>
                                <span class="time pull-right">3 hours ago</span>
                                <p class="box-title">Cleopatra Resort in <span class="price">$247</span></p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="icon-box style1 fourty-space">
                                <i class="soap-icon-myspace red-bg"></i>
                                <span class="time pull-right">3 hours ago</span>
                                <p class="box-title">Elite Flight per day in <span class="price">$48.99</span></p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="icon-box style1 fourty-space">
                                <i class="soap-icon-friends green-bg"></i>
                                <span class="time pull-right">last night</span>
                                <p class="box-title">Rome to Africa 1 week in <span class="price">$875</span></p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="load-more">. . . . . . . . . . . . . </div>
                        </a>
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
                                            Economy Flight<small>bmw mini</small>
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
                                            Hilton Flight &amp; Resorts<small>Paris france</small>
                                        </h4>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon soap-icon-user circle blue-color"></i>
                                        <span class="price"><small>avg/night</small>$170</span>
                                        <h4 class="box-title">
                                            Roosevelt Flight<small>new york</small>
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
                            <a href="#" class="button green btn-small full-width">VIEW ALL ACTIVITIES</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection