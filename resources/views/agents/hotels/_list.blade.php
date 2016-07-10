<div class="col-sm-12 col-md-12" xmlns="http://www.w3.org/1999/html">
    <div class="sort-by-section clearfix">
        <h4 class="sort-by-title block-sm">Sort results by:</h4>
        <ul class="sort-bar clearfix block-sm">
            <li class="sort-by-name"><a class="sort-by-container" href="#"><span>name</span></a></li>
            <li class="sort-by-price"><a class="sort-by-container" href="#"><span>price</span></a></li>
            <li class="clearer visible-sms"></li>
            <li class="sort-by-rating active"><a class="sort-by-container" href="#"><span>rating</span></a></li>
            <li class="sort-by-popularity"><a class="sort-by-container" href="#"><span>popularity</span></a></li>
        </ul>

        <ul class="swap-tiles clearfix block-sm">
            <li class="swap-list active">
                <a href="hotel-list-view.html"><i class="soap-icon-list"></i></a>
            </li>
            <li class="swap-grid">
                <a href="hotel-grid-view.html"><i class="soap-icon-grid"></i></a>
            </li>
            <li class="swap-block">
                <a href="hotel-block-view.html"><i class="soap-icon-block"></i></a>
            </li>
        </ul>
    </div>
    <div class="hotel-list listing-style3 hotel">

        @if($hotels != null)
            @foreach($hotels as $hotel)
                <article class="box">
                    <figure class="col-sm-5 col-md-3">
                        <a title="" href="ajax/slideshow-popup.html" class="hover-effect popup-gallery">
                            @if($hotel->image != null)
                            <img width="270" height="160" alt="" src="{{  url($hotel->images[2]->path .'/'.$hotel->images[2]->name ) }}">
                            @endif
                        </a>
                    </figure>
                    <div class="details col-sm-7 col-md-9">
                        <div>
                            <div>

                                <h4 class="box-title">{{ $hotel->name }}<small><i class="soap-icon-departure yellow-color"></i> {{ $hotel->city.', '.$hotel->country }}</small></h4>
                                <div class="amenities">
                                    @foreach($hotel->facilities as $facility)
                                        <i class="{{ $facility->facilityType->icon }} circle" title="{{ $facility->facilityType->name }}"></i>
                                    @endforeach
                                </div>
                            </div>
                            <div>
                                <div class="five-stars-container">
                                    <span class="five-stars" style="width: {{ $hotel->ratings()->avg('rating_value')*20 }}%;"></span>
                                </div>
                                <span class="review">{{ $hotel->comments->count() }} reviews</span>
                            </div>
                        </div>
                        @foreach($hotel->roomTypes as $roomType)
                        <div>
                            <p>
                                <span class="room-info">
                                    <a href="#" class="title" style="font-size: 14px;">{{ $roomType->room_type }}</a>
                                    <br>
                                        <small>Max Guests:</small>
                                        <small>{{ $roomType->adult_allowed }}</small>
                                        <small>Max Child:</small>
                                        <small>{{ $roomType->child_allowed }}</small>
                                </span>
                                <span class="room-price">
                                    <span class="b-detail">{{ $request->num_of_adult }} adult {{ $totalDays->days }} Night</span>

                                    @if( isset(Auth::user()->agentMarkup->markup) && Auth::user()->agentMarkup->markup != 0)
                                        <?php
                                            $markup = Auth::user()->agentMarkup->markup;
                                            $price = $roomType->price*$totalDays->days*$request->num_of_room;
                                            $total_price = $price + $markup;
                                            $total_price = $total_price + ($total_price*$settings->tax)/100;

                                        ?>
                                        <span class="price">{{ $settings->currency }}  {{ $total_price.'.00' }}</span>
                                    @else
                                        <?php
                                            $price = $roomType->price*$totalDays->days*$request->num_of_room;
                                            $total_price = $total_price + ($total_price*$settings->tax)/100;
                                        ?>

                                        <span class="price">{{ $settings->currency }}  {{ $total_price.'.00' }}</span>
                                    @endif
                                </span>
                            </p>

                            <div>
                                {!! Form::open(['method'=>'GET', 'url' => 'agents/booking/'.$roomType->hotel->id]) !!}
                                {!! Form::hidden('room_type', $roomType->id) !!}
                                {!! Form::hidden('dayCount', $totalDays->days) !!}
                                {!! Form::hidden('totalRoom', $request->num_of_room) !!}
                                {!! Form::hidden('price', $roomType->price*$totalDays->days*$request->num_of_room) !!}
                                {!! Form::hidden('checkIn', $request->date_from) !!}
                                {!! Form::hidden('checkOut', $request->date_to) !!}
                                {!! Form::hidden('adult', $request->num_of_adult ) !!}
                                {!! Form::hidden('kids', $request->num_of_child) !!}
                                <button type="submit" class="btn-small full-width text-center" title="">BOOK NOW</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </article>
            @endforeach
        @endif

    </div>
    {{--<a href="#" class="uppercase full-width button btn-large">load more listing</a>--}}
</div>