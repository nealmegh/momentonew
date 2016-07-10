@extends('master')

@section('head')
    <style>
        section#content {
            padding: 0;
        }

        .slideshow-bg .container {
            padding: 180px 0 230px 0;
            text-align: center;
        }

        h1, h2 {
            color: #ffffff;
        }
        #footer .footer-wrapper {
            padding: 0;
        }
    </style>
@endsection

@section('content')


    <section id="content" class="slideshow-bg">
        <div id="slideshow">
            <div class="flexslider">
                <ul class="slides">
                    {{--<li class="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">--}}
                        {{--<div class="slidebg" style="background-image: url(/images/homepage10_bg.jpg);"></div>--}}
                    {{--</li>--}}
                    <li class="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">
                        <div class="slidebg" style="background-image: url(/images/homepage10_bg2.jpg);"></div>
                    </li>
                    <li class="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">
                        <div class="slidebg" style="background-image: url(/images/homepage10_bg3.jpg);"></div>
                    </li>
                    <li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
                        <div class="slidebg" style="background-image: url(images/homepage10_bg4.jpg);"></div>
                    </li>
                    <li class="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">
                        <div class="slidebg" style="background-image: url(/images/homepage10_bg5.jpg);"></div>
                    </li>
                    <li class="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">
                        <div class="slidebg" style="background-image: url(/images/homepage10_bg6.jpg);"></div>
                    </li>
                    {{--<li class="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">--}}
                        {{--<div class="slidebg" style="background-image: url(/images/homepage10_bg7.jpg);"></div>--}}
                    {{--</li>--}}
                </ul>
            </div>
        </div>
        <div class="container">
            <div id="main">
                <h1 class="page-title">Make a journey with us in Comfort!</h1>
                <h2 class="page-description">We're bringing you a modern, comfortable Bangladesh experience.</h2>
                <div class="search-box-wrapper style2">
                    <div class="search-box">

                        {!! Form::open(['url'=>'check-bookings/confirmation', 'method'=>'GET']) !!}


                        <div class="row">
                                        <div class="col-md-5 col-md-offset-2" style="margin-top:14px;">
                                            <div class="form-group row">
                                                <div class="col-xs-12">
                                                    {{--<input type="text" name="booking_no" class="" placeholder="Enter Your 16 digit Booking No.">--}}
                                                    {!! Form::text('booking_no', null, ['class'=>'input-text full-width', 'placeholder'=>'Enter Your 16 digit Booking No.']) !!}


                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group col-md-3" style="margin-top:14px;">
                                            <button class="full-width">CHECK NOW</button>
                                        </div>
                                    </div>
                        {!! Form::close() !!}



                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection

