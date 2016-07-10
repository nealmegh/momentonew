@extends('hotels.layout.all-hotels')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Hotel List View'])
@stop

@section('left-sidebar')
    @include('hotels.template.hotel-view.left-sidebar')
@stop

@section('main-content')

        @include('common.sorting')
        
        <div class="hotel-list listing-style3 hotel">
            <article class="box">
                <figure class="col-sm-5 col-md-4">
                    <a title="" href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="{{ asset('images/hotels/1.png') }}"></a>
                </figure>
                <div class="details col-sm-7 col-md-8">
                    <div>
                        <div>
                            <h4 class="box-title">Hotel Hilton and Resorts<small><i class="soap-icon-departure yellow-color"></i> Bastille, Paris france</small></h4>
                            <div class="amenities">
                                <i class="soap-icon-wifi circle"></i>
                                <i class="soap-icon-fitnessfacility circle"></i>
                                <i class="soap-icon-fork circle"></i>
                                <i class="soap-icon-television circle"></i>
                            </div>
                        </div>
                        <div>
                            <div class="five-stars-container">
                                <span class="five-stars" style="width: 80%;"></span>
                            </div>
                            <span class="review">270 reviews</span>
                        </div>
                    </div>
                    <div>
                        <p>Nunc cursus libero purus ac congue ar lorem cursus ut sed vitae pulvinar massa idend porta nequetiam elerisque mi id, consectetur adipi deese cing elit maus fringilla bibe endum.</p>
                        <div>
                            <span class="price"><small>AVG/NIGHT</small>$620</span>
                            <a class="button btn-small full-width text-center" title="" href="hotel-detailed.html">SELECT</a>
                        </div>
                    </div>
                </div>
            </article>
            <article class="box">
                <figure class="col-sm-5 col-md-4">
                    <a title="" href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="{{ asset('images/hotels/2.png') }}"></a>
                </figure>
                <div class="details col-sm-7 col-md-8">
                    <div>
                        <div>
                            <h4 class="box-title">Forte Do Vale<small><i class="soap-icon-departure yellow-color"></i> Albufeira</small></h4>
                            <div class="amenities">
                                <i class="soap-icon-wifi circle"></i>
                                <i class="soap-icon-fitnessfacility circle"></i>
                                <i class="soap-icon-fork circle"></i>
                                <i class="soap-icon-television circle"></i>
                            </div>
                        </div>
                        <div>
                            <div class="five-stars-container">
                                <span class="five-stars" style="width: 80%;"></span>
                            </div>
                            <span class="review">170 reviews</span>
                        </div>
                    </div>
                    <div>
                        <p>Nunc cursus libero purus ac congue ar lorem cursus ut sed vitae pulvinar massa idend porta nequetiam elerisque mi id, consectetur adipi deese cing elit maus fringilla bibe endum.</p>
                        <div>
                            <span class="price"><small>AVG/NIGHT</small>$120</span>
                            <a class="button btn-small full-width text-center" title="" href="hotel-detailed.html">SELECT</a>
                        </div>
                    </div>
                </div>
            </article>
            <article class="box">
                <figure class="col-sm-5 col-md-4">
                    <a title="" href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="{{ asset('images/hotels/3.png') }}"></a>
                </figure>
                <div class="details col-sm-7 col-md-8">
                    <div>
                        <div>
                            <h4 class="box-title">Gran Canaria<small><i class="soap-icon-departure yellow-color"></i> Spain</small></h4>
                            <div class="amenities">
                                <i class="soap-icon-wifi circle"></i>
                                <i class="soap-icon-fitnessfacility circle"></i>
                                <i class="soap-icon-fork circle"></i>
                                <i class="soap-icon-television circle"></i>
                            </div>
                        </div>
                        <div>
                            <div class="five-stars-container">
                                <span class="five-stars" style="width: 80%;"></span>
                            </div>
                            <span class="review">485 reviews</span>
                        </div>
                    </div>
                    <div>
                        <p>Nunc cursus libero purus ac congue ar lorem cursus ut sed vitae pulvinar massa idend porta nequetiam elerisque mi id, consectetur adipi deese cing elit maus fringilla bibe endum.</p>
                        <div>
                            <span class="price"><small>AVG/NIGHT</small>$322</span>
                            <a class="button btn-small full-width text-center" title="" href="hotel-detailed.html">SELECT</a>
                        </div>
                    </div>
                </div>
            </article>
            <article class="box">
                <figure class="col-sm-5 col-md-4">
                    <a title="" href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="{{ asset('images/hotels/4.png') }}"></a>
                </figure>
                <div class="details col-sm-7 col-md-8">
                    <div>
                        <div>
                            <h4 class="box-title">Gran Canaria<small><i class="soap-icon-departure yellow-color"></i> Spain</small></h4>
                            <div class="amenities">
                                <i class="soap-icon-wifi circle"></i>
                                <i class="soap-icon-fitnessfacility circle"></i>
                                <i class="soap-icon-fork circle"></i>
                                <i class="soap-icon-television circle"></i>
                            </div>
                        </div>
                        <div>
                            <div class="five-stars-container">
                                <span class="five-stars" style="width: 80%;"></span>
                            </div>
                            <span class="review">485 reviews</span>
                        </div>
                    </div>
                    <div>
                        <p>Nunc cursus libero purus ac congue ar lorem cursus ut sed vitae pulvinar massa idend porta nequetiam elerisque mi id, consectetur adipi deese cing elit maus fringilla bibe endum.</p>
                        <div>
                            <span class="price"><small>AVG/NIGHT</small>$322</span>
                            <a class="button btn-small full-width text-center" title="" href="hotel-detailed.html">SELECT</a>
                        </div>
                    </div>
                </div>
            </article>
            <article class="box">
                <figure class="col-sm-5 col-md-4">
                    <a title="" href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="{{ asset('images/hotels/5.png') }}"></a>
                </figure>
                <div class="details col-sm-7 col-md-8">
                    <div>
                        <div>
                            <h4 class="box-title">Costa Brava<small><i class="soap-icon-departure yellow-color"></i> Spain</small></h4>
                            <div class="amenities">
                                <i class="soap-icon-wifi circle"></i>
                                <i class="soap-icon-fitnessfacility circle"></i>
                                <i class="soap-icon-fork circle"></i>
                                <i class="soap-icon-television circle"></i>
                            </div>
                        </div>
                        <div>
                            <div class="five-stars-container">
                                <span class="five-stars" style="width: 80%;"></span>
                            </div>
                            <span class="review">423 reviews</span>
                        </div>
                    </div>
                    <div>
                        <p>Nunc cursus libero purus ac congue ar lorem cursus ut sed vitae pulvinar massa idend porta nequetiam elerisque mi id, consectetur adipi deese cing elit maus fringilla bibe endum.</p>
                        <div>
                            <span class="price"><small>AVG/NIGHT</small>$620</span>
                            <a class="button btn-small full-width text-center" title="" href="hotel-detailed.html">SELECT</a>
                        </div>
                    </div>
                </div>
            </article>
            <article class="box">
                <figure class="col-sm-5 col-md-4">
                    <a title="" href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="{{ asset('images/hotels/6.png') }}"></a>
                </figure>
                <div class="details col-sm-7 col-md-8">
                    <div>
                        <div>
                            <h4 class="box-title">Ruzzini Palace<small><i class="soap-icon-departure yellow-color"></i> Venice</small></h4>
                            <div class="amenities">
                                <i class="soap-icon-wifi circle"></i>
                                <i class="soap-icon-fitnessfacility circle"></i>
                                <i class="soap-icon-fork circle"></i>
                                <i class="soap-icon-television circle"></i>
                            </div>
                        </div>
                        <div>
                            <div class="five-stars-container">
                                <span class="five-stars" style="width: 80%;"></span>
                            </div>
                            <span class="review">99 reviews</span>
                        </div>
                    </div>
                    <div>
                        <p>Nunc cursus libero purus ac congue ar lorem cursus ut sed vitae pulvinar massa idend porta nequetiam elerisque mi id, consectetur adipi deese cing elit maus fringilla bibe endum.</p>
                        <div>
                            <span class="price"><small>AVG/NIGHT</small>$322</span>
                            <a class="button btn-small full-width text-center" title="" href="hotel-detailed.html">SELECT</a>
                        </div>
                    </div>
                </div>
            </article>
            <article class="box">
                <figure class="col-sm-5 col-md-4">
                    <a title="" href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="{{ asset('images/hotels/7.png') }}"></a>
                </figure>
                <div class="details col-sm-7 col-md-8">
                    <div>
                        <div>
                            <h4 class="box-title">Plaza Tour Eiffel<small><i class="soap-icon-departure yellow-color"></i> paris</small></h4>
                            <div class="amenities">
                                <i class="soap-icon-wifi circle"></i>
                                <i class="soap-icon-fitnessfacility circle"></i>
                                <i class="soap-icon-fork circle"></i>
                                <i class="soap-icon-television circle"></i>
                            </div>
                        </div>
                        <div>
                            <div class="five-stars-container">
                                <span class="five-stars" style="width: 80%;"></span>
                            </div>
                            <span class="review">112 reviews</span>
                        </div>
                    </div>
                    <div>
                        <p>Nunc cursus libero purus ac congue ar lorem cursus ut sed vitae pulvinar massa idend porta nequetiam elerisque mi id, consectetur adipi deese cing elit maus fringilla bibe endum.</p>
                        <div>
                            <span class="price"><small>AVG/NIGHT</small>$170</span>
                            <a class="button btn-small full-width text-center" title="" href="hotel-detailed.html">SELECT</a>
                        </div>
                    </div>
                </div>
            </article>
            <article class="box">
                <figure class="col-sm-5 col-md-4">
                    <a title="" href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="{{ asset('images/hotels/8.png') }}"></a>
                </figure>
                <div class="details col-sm-7 col-md-8">
                    <div>
                        <div>
                            <h4 class="box-title">Le Ville Del Lido<small><i class="soap-icon-departure yellow-color"></i> Venice Lido</small></h4>
                            <div class="amenities">
                                <i class="soap-icon-wifi circle"></i>
                                <i class="soap-icon-fitnessfacility circle"></i>
                                <i class="soap-icon-fork circle"></i>
                                <i class="soap-icon-television circle"></i>
                            </div>
                        </div>
                        <div>
                            <div class="five-stars-container">
                                <span class="five-stars" style="width: 80%;"></span>
                            </div>
                            <span class="review">269 reviews</span>
                        </div>
                    </div>
                    <div>
                        <p>Nunc cursus libero purus ac congue ar lorem cursus ut sed vitae pulvinar massa idend porta nequetiam elerisque mi id, consectetur adipi deese cing elit maus fringilla bibe endum.</p>
                        <div>
                            <span class="price"><small>AVG/NIGHT</small>$620</span>
                            <a class="button btn-small full-width text-center" title="" href="hotel-detailed.html">SELECT</a>
                        </div>
                    </div>
                </div>
            </article>
            <article class="box">
                <figure class="col-sm-5 col-md-4">
                    <a title="" href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="{{ asset('images/hotels/9.png') }}"></a>
                </figure>
                <div class="details col-sm-7 col-md-8">
                    <div>
                        <div>
                            <h4 class="box-title">Park Central<small><i class="soap-icon-departure yellow-color"></i> New York</small></h4>
                            <div class="amenities">
                                <i class="soap-icon-wifi circle"></i>
                                <i class="soap-icon-fitnessfacility circle"></i>
                                <i class="soap-icon-fork circle"></i>
                                <i class="soap-icon-television circle"></i>
                            </div>
                        </div>
                        <div>
                            <div class="five-stars-container">
                                <span class="five-stars" style="width: 80%;"></span>
                            </div>
                            <span class="review">78 reviews</span>
                        </div>
                    </div>
                    <div>
                        <p>Nunc cursus libero purus ac congue ar lorem cursus ut sed vitae pulvinar massa idend porta nequetiam elerisque mi id, consectetur adipi deese cing elit maus fringilla bibe endum.</p>
                        <div>
                            <span class="price"><small>AVG/NIGHT</small>$322</span>
                            <a class="button btn-small full-width text-center" title="" href="hotel-detailed.html">SELECT</a>
                        </div>
                    </div>
                </div>
            </article>
            <article class="box">
                <figure class="col-sm-5 col-md-4">
                    <a title="" href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img width="270" height="160" alt="" src="{{ asset('images/hotels/10.png') }}"></a>
                </figure>
                <div class="details col-sm-7 col-md-8">
                    <div>
                        <div>
                            <h4 class="box-title">Cleopatra Resort<small><i class="soap-icon-departure yellow-color"></i> England</small></h4>
                            <div class="amenities">
                                <i class="soap-icon-wifi circle"></i>
                                <i class="soap-icon-fitnessfacility circle"></i>
                                <i class="soap-icon-fork circle"></i>
                                <i class="soap-icon-television circle"></i>
                            </div>
                        </div>
                        <div>
                            <div class="five-stars-container">
                                <span class="five-stars" style="width: 80%;"></span>
                            </div>
                            <span class="review">585 reviews</span>
                        </div>
                    </div>
                    <div>
                        <p>Nunc cursus libero purus ac congue ar lorem cursus ut sed vitae pulvinar massa idend porta nequetiam elerisque mi id, consectetur adipi deese cing elit maus fringilla bibe endum.</p>
                        <div>
                            <span class="price"><small>AVG/NIGHT</small>$170</span>
                            <a class="button btn-small full-width text-center" title="" href="hotel-detailed.html">SELECT</a>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <a href="#" class="uppercase full-width button btn-large">load more listing</a>
@stop