@extends('master')

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


        <div class="banner imagebg-container" style="height: 350px; background-image: url('/images/tours/tour-banner.png');">
            <div class="container">
                <h1 class="big-caption">Thank's for your booking  <em>Submission!</em></h1>
                <h2 class="med-caption">We're bringing you a modern, comfortable,
                    <br>and connected flight experience</h2>
            </div>
        </div>
        <div class="tab-wrapper">
            <div class="tab-container container trans-style">
                <ul class="tabs no-padding">
                    <li><a  href="#entertained"><i class="soap-icon-stories"></i>Print Reservation</a></li>
                    <li><a  href="#eat-drink"><i class="soap-icon-message"></i>Send Via Email</a></li>
                    <li><a  href="{{ url('tours/booking/complete/'.$booking->booking_no) }}"><i class="soap-icon-shopping-3"></i>Complete Reservation</a></li>
                    <li><a  href="#fly-in-comfort"><i class="soap-icon-liability"></i>Cancel Booking</a></li>
                    <li><a  href="#stay-connected"><i class="soap-icon-passenger"></i>Modify Traveller Info</a></li>
                    <li><a  href="#emergency-ready"><i class="soap-icon-support"></i>Need Help</a></li>
                </ul>
                <div class="tab-content">
                    {{--<div id="entertained" class="tab-pane fade">--}}
                        {{--<div class="sm-section">--}}
                            {{--<h2>Be entertained</h2>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div id="eat-drink" class="tab-pane fade">--}}
                        {{--<div class="sm-section">--}}
                            {{--<h2>Eat &amp; Drink</h2>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div id="sky-shopping" class="tab-pane fade">--}}
                        {{--<div class="sm-section">--}}
                            {{--<h2>Sky Shopping</h2>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div id="fly-in-comfort" class="tab-pane fade in active">--}}
                        {{--<div class="sm-section clearfix">--}}
                            {{--<i class="soap-icon-passenger circle white-color skin-bg no-border pull-left" style="font-size: 54px; margin-right: 15px;"></i>--}}
                            {{--<div class="table-wrapper hidden-table-sm">--}}
                                {{--<div class="table-cell" style="padding: 0 15px;">--}}
                                    {{--<h1>Thank's for your booking submission!</h1>--}}
                                    {{--<p>We're transforming our fleet by purchasing hundreds of new planes and refreshing existing ones to help you travel in comfort. Look forward to new seats, extra legroom, more inflight power, and bigger overhead bins to more easily store your carry-on luggage. </p>--}}
                                {{--</div>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div id="stay-connected" class="tab-pane fade">--}}
                        {{--<div class="sm-section">--}}
                            {{--<h2>Stay connected</h2>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div id="emergency-ready" class="tab-pane fade">--}}
                        {{--<div class="sm-section">--}}
                            {{--<h2>Emergency ready</h2>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
        <div class="container">
            <div id="main" class="md-section">
                <div id="main" class="col-sms-6 col-sm-8 col-md-9">
                    {{--<div class="row image-box style2 add-clearfix">--}}
                        {{--<div class="col-md-12">--}}
                            {{--<article class="box">--}}
                                {{--<div style="padding: 20px;">--}}
                                    {{--<h4>Please Do Understand</h4>--}}
                                    {{--<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>--}}
                                    {{--<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>--}}
                                    {{--<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>--}}
                                {{--</div>--}}
                            {{--</article>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="booking-information travelo-box">
                        <h2>Booking Confirmation</h2>
                        <hr>
                        <div class="booking-confirmation clearfix">
                            <i class="soap-icon-recommend icon circle"></i>
                            <div class="message">
                                <h4 class="main-message">Thank You. Your Booking Order is Confirmed Now.</h4>
                                <p>A confirmation email has been sent to your provided email address.</p>
                            </div>
                            <a href="#" class="button btn-small print-button uppercase">print Details</a>
                        </div>
                        <hr>
                        <h2>Traveler Information</h2>
                        <dl class="term-description">
                            <dt>Booking number:</dt>
                            <dd>
                                {{ $booking->booking_no }}
                            </dd>
                            <dt>First name:</dt>
                            <dd>
                                {{ $booking->guest->first_name }}
                            </dd>
                            <dt>Last name:</dt>
                            <dd>
                                {{ $booking->guest->last_name }}
                            </dd>
                            <dt>E-mail address:</dt>
                            <dd>
                                {{ $booking->guest->email }}
                            </dd>
                            <dt>Street Address and number:</dt>
                            <dd>
                                {{ $booking->guest->address }}
                            </dd>
                            <dt>Town / City:</dt>
                            <dd>
                                {{ $booking->guest->city }}
                            </dd>
                            <dt>ZIP code:</dt>
                            <dd>
                                {{ $booking->guest->zip }}
                            </dd>
                            <dt>Country:</dt>
                            <dd>
                                {{ $booking->guest->country }}
                            </dd>
                        </dl>
                        <hr>
                        <h2>Payment</h2>
                        <p>Praesent dolor lectus, rutrum sit amet risus vitae, imperdiet cursus neque. Nulla tempor nec lorem eu suscipit. Donec dignissim lectus a nunc molestie consectetur. Nulla eu urna in nisi adipiscing placerat. Nam vel scelerisque magna. Donec justo urna, posuere ut dictum quis.</p>
                        <br>
                        <p class="red-color">Payment is made by Credit Card Via Paypal.</p>
                        <hr>
                        <h2>View Booking Details</h2>
                        <p>Praesent dolor lectus, rutrum sit amet risus vitae, imperdiet cursus neque. Nulla tempor nec lorem eu suscipit. Donec dignissim lectus a nunc molestie consectetur. Nulla eu urna in nisi adipiscing placerat. Nam vel scelerisque magna. Donec justo urna, posuere ut dictum quis.</p>
                        <br>
                        {{--<a href="#" class="red-color underline view-link">https://www.travelo.com/booking-details/?=f4acb19f-9542-4a5c-b8ee</a>--}}
                    </div>
                </div>
                @include('tours.template.booking._right-sidebar')
            </div>
        </div>

@endsection
