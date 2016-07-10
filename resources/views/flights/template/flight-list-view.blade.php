@extends('flights.layout.all-flights')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Cars List View'])
@stop

@section('left-sidebar')
    @include('flights.template.flight-view.left-sidebar')
@stop

@section('main-content')

        @include('common.sorting')

        <div class="flight-list listing-style3 flight">
            <article class="box">
                <figure class="col-xs-3 col-sm-2">
                    <span><img width="94" height="90" alt="" src="/images/shortcodes/listings/style02/flight/2.png"></span>
                </figure>
                <div class="details col-xs-9 col-sm-10">
                    <div class="details-wrapper">
                        <div class="first-row">
                            <div>
                                <h4 class="box-title">Indianapolis to Paris<small>Oneway flight</small></h4>
                                <a class="button btn-mini stop">1 STOP</a>
                                <div class="amenities">
                                    <i class="soap-icon-wifi circle"></i>
                                    <i class="soap-icon-entertainment circle"></i>
                                    <i class="soap-icon-fork circle"></i>
                                    <i class="soap-icon-suitcase circle"></i>
                                </div>
                            </div>
                            <div>
                                <span class="price"><small>AVG/PERSON</small>$620</span>
                            </div>
                        </div>
                        <div class="second-row">
                            <div class="time">
                                <div class="take-off col-sm-4">
                                    <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                    <div>
                                        <span class="skin-color">Take off</span><br>Wed Nov 13, 2013 7:50 Am
                                    </div>
                                </div>
                                <div class="landing col-sm-4">
                                    <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                    <div>
                                        <span class="skin-color">landing</span><br>Wed Nov 13, 2013 9:20 am
                                    </div>
                                </div>
                                <div class="total-time col-sm-4">
                                    <div class="icon"><i class="soap-icon-clock yellow-color"></i></div>
                                    <div>
                                        <span class="skin-color">total time</span><br>13 Hour, 40 minutes
                                    </div>
                                </div>
                            </div>
                            <div class="action">
                                <a href="flight-detailed.html" class="button btn-small full-width">SELECT NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <article class="box">
                <figure class="col-xs-3 col-sm-2">
                    <span><img width="94" height="90" alt="" src="/images/shortcodes/listings/style02/flight/3.png"></span>
                </figure>
                <div class="details col-xs-9 col-sm-10">
                    <div class="details-wrapper">
                        <div class="first-row">
                            <div>
                                <h4 class="box-title">Indianapolis to Paris<small>Oneway flight</small></h4>
                                <a class="button btn-mini stop">1 STOP</a>
                                <div class="amenities">
                                    <i class="soap-icon-wifi circle"></i>
                                    <i class="soap-icon-entertainment circle"></i>
                                    <i class="soap-icon-fork circle"></i>
                                    <i class="soap-icon-suitcase circle"></i>
                                </div>
                            </div>
                            <div>
                                <span class="price"><small>AVG/PERSON</small>$170</span>
                            </div>
                        </div>
                        <div class="second-row">
                            <div class="time">
                                <div class="take-off col-sm-4">
                                    <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                    <div>
                                        <span class="skin-color">Take off</span><br>Wed Nov 13, 2013 7:50 Am
                                    </div>
                                </div>
                                <div class="landing col-sm-4">
                                    <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                    <div>
                                        <span class="skin-color">landing</span><br>Wed Nov 13, 2013 9:20 am
                                    </div>
                                </div>
                                <div class="total-time col-sm-4">
                                    <div class="icon"><i class="soap-icon-clock yellow-color"></i></div>
                                    <div>
                                        <span class="skin-color">total time</span><br>13 Hour, 40 minutes
                                    </div>
                                </div>
                            </div>
                            <div class="action">
                                <a href="flight-detailed.html" class="button btn-small full-width">SELECT NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <article class="box">
                <figure class="col-xs-3 col-sm-2">
                    <span><img width="94" height="90" alt="" src="/images/shortcodes/listings/style02/flight/4.png"></span>
                </figure>
                <div class="details col-xs-9 col-sm-10">
                    <div class="details-wrapper">
                        <div class="first-row">
                            <div>
                                <h4 class="box-title">Indianapolis to Paris<small>Oneway flight</small></h4>
                                <a class="button btn-mini stop">1 STOP</a>
                                <div class="amenities">
                                    <i class="soap-icon-wifi circle"></i>
                                    <i class="soap-icon-entertainment circle"></i>
                                    <i class="soap-icon-fork circle"></i>
                                    <i class="soap-icon-suitcase circle"></i>
                                </div>
                            </div>
                            <div>
                                <span class="price"><small>AVG/PERSON</small>$320</span>
                            </div>
                        </div>
                        <div class="second-row">
                            <div class="time">
                                <div class="take-off col-sm-4">
                                    <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                    <div>
                                        <span class="skin-color">Take off</span><br>Wed Nov 13, 2013 7:50 Am
                                    </div>
                                </div>
                                <div class="landing col-sm-4">
                                    <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                    <div>
                                        <span class="skin-color">landing</span><br>Wed Nov 13, 2013 9:20 am
                                    </div>
                                </div>
                                <div class="total-time col-sm-4">
                                    <div class="icon"><i class="soap-icon-clock yellow-color"></i></div>
                                    <div>
                                        <span class="skin-color">total time</span><br>13 Hour, 40 minutes
                                    </div>
                                </div>
                            </div>
                            <div class="action">
                                <a href="flight-detailed.html" class="button btn-small full-width">SELECT NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <article class="box">
                <figure class="col-xs-3 col-sm-2">
                    <span><img width="94" height="90" alt="" src="/images/shortcodes/listings/style02/flight/2.png"></span>
                </figure>
                <div class="details col-xs-9 col-sm-10">
                    <div class="details-wrapper">
                        <div class="first-row">
                            <div>
                                <h4 class="box-title">Indianapolis to Paris<small>Oneway flight</small></h4>
                                <a class="button btn-mini stop">1 STOP</a>
                                <div class="amenities">
                                    <i class="soap-icon-wifi circle"></i>
                                    <i class="soap-icon-entertainment circle"></i>
                                    <i class="soap-icon-fork circle"></i>
                                    <i class="soap-icon-suitcase circle"></i>
                                </div>
                            </div>
                            <div>
                                <span class="price"><small>AVG/PERSON</small>$620</span>
                            </div>
                        </div>
                        <div class="second-row">
                            <div class="time">
                                <div class="take-off col-sm-4">
                                    <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                    <div>
                                        <span class="skin-color">Take off</span><br>Wed Nov 13, 2013 7:50 Am
                                    </div>
                                </div>
                                <div class="landing col-sm-4">
                                    <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                    <div>
                                        <span class="skin-color">landing</span><br>Wed Nov 13, 2013 9:20 am
                                    </div>
                                </div>
                                <div class="total-time col-sm-4">
                                    <div class="icon"><i class="soap-icon-clock yellow-color"></i></div>
                                    <div>
                                        <span class="skin-color">total time</span><br>13 Hour, 40 minutes
                                    </div>
                                </div>
                            </div>
                            <div class="action">
                                <a href="flight-detailed.html" class="button btn-small full-width">SELECT NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <article class="box">
                <figure class="col-xs-3 col-sm-2">
                    <span><img width="94" height="90" alt="" src="/images/shortcodes/listings/style02/flight/3.png"></span>
                </figure>
                <div class="details col-xs-9 col-sm-10">
                    <div class="details-wrapper">
                        <div class="first-row">
                            <div>
                                <h4 class="box-title">Indianapolis to Paris<small>Oneway flight</small></h4>
                                <a class="button btn-mini stop">1 STOP</a>
                                <div class="amenities">
                                    <i class="soap-icon-wifi circle"></i>
                                    <i class="soap-icon-entertainment circle"></i>
                                    <i class="soap-icon-fork circle"></i>
                                    <i class="soap-icon-suitcase circle"></i>
                                </div>
                            </div>
                            <div>
                                <span class="price"><small>AVG/PERSON</small>$170</span>
                            </div>
                        </div>
                        <div class="second-row">
                            <div class="time">
                                <div class="take-off col-sm-4">
                                    <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                    <div>
                                        <span class="skin-color">Take off</span><br>Wed Nov 13, 2013 7:50 Am
                                    </div>
                                </div>
                                <div class="landing col-sm-4">
                                    <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                    <div>
                                        <span class="skin-color">landing</span><br>Wed Nov 13, 2013 9:20 am
                                    </div>
                                </div>
                                <div class="total-time col-sm-4">
                                    <div class="icon"><i class="soap-icon-clock yellow-color"></i></div>
                                    <div>
                                        <span class="skin-color">total time</span><br>13 Hour, 40 minutes
                                    </div>
                                </div>
                            </div>
                            <div class="action">
                                <a href="flight-detailed.html" class="button btn-small full-width">SELECT NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <article class="box">
                <figure class="col-xs-3 col-sm-2">
                    <span><img width="94" height="90" alt="" src="/images/shortcodes/listings/style02/flight/4.png"></span>
                </figure>
                <div class="details col-xs-9 col-sm-10">
                    <div class="details-wrapper">
                        <div class="first-row">
                            <div>
                                <h4 class="box-title">Indianapolis to Paris<small>Oneway flight</small></h4>
                                <a class="button btn-mini stop">1 STOP</a>
                                <div class="amenities">
                                    <i class="soap-icon-wifi circle"></i>
                                    <i class="soap-icon-entertainment circle"></i>
                                    <i class="soap-icon-fork circle"></i>
                                    <i class="soap-icon-suitcase circle"></i>
                                </div>
                            </div>
                            <div>
                                <span class="price"><small>AVG/PERSON</small>$320</span>
                            </div>
                        </div>
                        <div class="second-row">
                            <div class="time">
                                <div class="take-off col-sm-4">
                                    <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                    <div>
                                        <span class="skin-color">Take off</span><br>Wed Nov 13, 2013 7:50 Am
                                    </div>
                                </div>
                                <div class="landing col-sm-4">
                                    <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                    <div>
                                        <span class="skin-color">landing</span><br>Wed Nov 13, 2013 9:20 am
                                    </div>
                                </div>
                                <div class="total-time col-sm-4">
                                    <div class="icon"><i class="soap-icon-clock yellow-color"></i></div>
                                    <div>
                                        <span class="skin-color">total time</span><br>13 Hour, 40 minutes
                                    </div>
                                </div>
                            </div>
                            <div class="action">
                                <a href="flight-detailed.html" class="button btn-small full-width">SELECT NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
@stop