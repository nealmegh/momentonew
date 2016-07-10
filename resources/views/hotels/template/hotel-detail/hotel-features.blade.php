    <ul class="tabs">
        <li><a href="#hotel-description" data-toggle="tab">Description</a></li>
        <li class="active"><a href="#hotel-availability" data-toggle="tab">Availability</a></li>
        <li><a href="#hotel-amenities" data-toggle="tab">Amenities</a></li>
        <li><a href="#hotel-faqs" data-toggle="tab">Other Info</a></li>
        <li><a href="#hotel-reviews" data-toggle="tab">Reviews</a></li>
        {{--<li><a href="#hotel-things-todo" data-toggle="tab">Things to Do</a></li>--}}
        <li><a href="#hotel-write-review" data-toggle="tab">Write a Review</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade" id="hotel-description">
            <div class="intro table-wrapper full-width hidden-table-sms">
                <div class="col-sm-5 col-lg-4 features table-cell">
                    <ul>
                        <li><label>Hotel type:</label>{{$hotel->grade->name}}</li>
                        <li><label>Extra people:</label>No Charge</li>
                        <li><label>Minimum Stay:</label>1 nights</li>
                        <li><label>Country:</label>{{$hotel->country}}</li>
                        <li><label>City:</label>{{$hotel->city}}</li>
                        <li><label>Neighborhood:</label>{{$hotel->state}}</li>
                        <li><label>City:</label>{{$hotel->city}}</li>
                    </ul>
                </div>
                <div class="col-sm-7 col-lg-8 table-cell testimonials">
                    <div class="testimonial style1">

                        <div class="testimonial-viewport">
                            <ul class="slides">
                                @foreach($hotel->comments()->take(3)->get() as $comment)
                                <li class="testimonial-active-slide">
                                    <p class="description">{!! $comment->review_text !!}</p>
                                    <div class="author clearfix">
                                        <a href="#"><img src="{{ asset($comment->user->profilePicture->path.'/'.$comment->user->profilePicture->name) }}" alt="" width="74" height="74" draggable="false"></a>
                                        <h5 class="name">{{ $comment->user->first_name.' '.$comment->user->last_name }}<small>guest</small></h5>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <div class="long-description">
                <h2>About {{ $hotel->title }}</h2>
                    {!! $hotel->general_information !!}
            </div>
        </div>
        <div class="tab-pane fade in active" id="hotel-availability">

            {!! Form::open(['method'=>'GET', 'id'=>'check_availability_form']) !!}
            {!! Form::hidden('search', 'room') !!}
            <div class="update-search clearfix">
                <div class="col-md-5">
                    <h4 class="title">When</h4>
                    <div class="row">
                        <div class="col-xs-6">
                            <label>CHECK IN</label>
                            <div class="datepicker-wrap">
                                {!! Form::text('date_from', Input::get('date_from'), ['class' => 'input-text full-width', 'placeholder' => 'mm/dd/yy']) !!}
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <label>CHECK OUT</label>
                            <div class="datepicker-wrap">
                                {!! Form::text('date_to', Input::get('date_to'), ['class' => 'input-text full-width', 'placeholder' => 'mm/dd/yy']) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <h4 class="title">Who</h4>
                    <div class="row">
                        <div class="col-xs-4">
                            <label>ROOMS</label>
                            <div class="selector">
                                {!! Form::select('num_of_room', ['1'=>'01', '2' => '02', '3' => '03', '4' => '04', '5' => '05'], Input::get('num_of_room'), ['class' => 'full-width'] ) !!}
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <label>ADULTS</label>
                            <div class="selector">
                                {!! Form::select('num_of_adult', ['1'=>'01', '2' => '02', '3' => '03', '4' => '04', '5' => '05'], Input::get('num_of_adult'), ['class' => 'full-width'] ) !!}

                            </div>
                        </div>
                        <div class="col-xs-4">
                            <label>KIDS</label>
                            <div class="selector">
                                {!! Form::select('num_of_child', ['0'=>'00', '1'=>'01', '2' => '02', '3' => '03', '4' => '04', '5' => '05'], Input::get('num_of_child'), ['class' => 'full-width'] ) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <h4 class="visible-md visible-lg">&nbsp;</h4>
                    <label class="visible-md visible-lg">&nbsp;</label>
                    <div class="row">
                        <div class="col-xs-12">
                            <button data-animation-duration="1" data-animation-type="bounce" class="full-width icon-check animated" type="submit">SEARCH NOW</button>
                        </div>
                    </div>
                </div>
            </div>

            {!! Form::close() !!}

            <h2>Available Rooms</h2>
            <div class="room-list listing-style3 hotel">
                @foreach($availableRoomType as $roomType)
                    {!! Form::open(['method'=>'GET', 'url' => 'hotels/booking/'.$roomType->hotel->id]) !!}
                    {!! Form::hidden('room_type', $roomType->id) !!}

                <article class="box">
                    <figure class="col-sm-4 col-md-3">
                        <a class="hover-effect popup-gallery" data-post_id="74" href="#" title="popup gallery">

                            @if( $image = $roomType->roomImage()->where('type','=','room')->first())
                                <img width="230" height="160" class="attachment-list-thumb wp-post-image" alt="" src="{{ asset($image->path.'/'.$image->name) }}">
                            @else
                                <img width="230" height="160" class="attachment-list-thumb wp-post-image" src="{{ asset('images/no-image.png') }}">
                            @endif
                        </a>
                    </figure>
                    <div class="details col-xs-12 col-sm-8 col-md-9">
                        <div>
                            <div>
                                <div class="box-title">
                                    <h4 class="title"><a href="#">{{ $roomType->room_type }}</a></h4>
                                    <dl class="description" style="display: inline-block;">
                                        <dt>Max Guests:</dt>
                                        <dd>{{ $roomType->adult_allowed }}</dd>
                                    </dl>
                                    <dl class="description" style="display: inline-block;" >
                                        <dt>Max Child:</dt>
                                        <dd>{{ $roomType->child_allowed }}</dd>
                                    </dl>
                                </div>
                                <div class="amenities">
                                    @foreach($roomType->facilities as $facility)
                                        <i class="{{ $facility->facilityTitle->icon }} circle" title="{{ $facility->facilityTitle->name }}"></i>
                                    @endforeach
                                </div>
                            </div>
                            <div class="price-section">
                                <span class="price">
                                    @if($roomTypeStatus[$roomType->id] == 'n')
                                        <div class="action-section">
                                            <a href="#" title="show price" class="button btn-small full-width text-center btn-show-price" data-room-type-id="{{ $roomType->id }}" style="font-size: 12px;">SHOW PRICE</a>
                                        </div>
                                    @endif

                                    @if($roomTypeStatus[$roomType->id] == 't')
                                        <small>{{ $dayCount }} Nights<br>{{ $totalRoom }} Rooms</small>
                                            {{ $settings->currency }}	{{ number_format($roomTypePrice[$roomType->id]*$totalRoom*$dayCount, 2) }}
                                            {!! Form::hidden('dayCount', $dayCount) !!}
                                            {!! Form::hidden('totalRoom', $totalRoom) !!}
                                            {!! Form::hidden('price', $roomTypePrice[$roomType->id]*$totalRoom*$dayCount) !!}
                                            {!! Form::hidden('checkIn', $checkDay['checkIn']) !!}
                                            {!! Form::hidden('checkOut', $checkDay['checkOut']) !!}
                                            {!! Form::hidden('adult', $checkDay['adult'] ) !!}
                                            {!! Form::hidden('kids', $checkDay['child']) !!}
                                    @endif

                                    @if($roomTypeStatus[$roomType->id] == 'f')
                                        Not Avaiable
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div>
                            <div class="entry-content">
                                <p>{!! $roomType->description !!} </p>
                            </div>
                            <div class="action-section">
                                @if($roomTypeStatus[$roomType->id] == 't')
                                        <button title="book now" class="button btn-small full-width text-center btn-book-now" data-room-type-id="74">BOOK NOW</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </article>
                    {!! Form::close() !!}
                @endforeach

            </div>
        </div>
        <div class="tab-pane fade" id="hotel-amenities">
            <h2>Our Facilities</h2>
            <p>Maecenas vitae turpis condimentum metus tincidunt semper bibendum ut orci. Donec eget accumsan est. Duis laoreet sagittis elit et vehicula. Cras viverra posuere condimentum. Donec urna arcu, venenatis quis augue sit amet, mattis gravida nunc. Integer faucibus, tortor a tristique adipiscing, arcu metus luctus libero, nec vulputate risus elit id nibh.</p>
            <ul class="amenities clearfix style1">
                @foreach($hotel->facilities as  $facility)
                <li class="col-md-4 col-sm-6">
                    <div class="icon-box style1"><i class="{{ $facility->facilityType->icon }}"></i>{{ $facility->facilityType->name }}</div>
                </li>
               @endforeach
            </ul>
        </div>
        <div class="tab-pane fade" id="hotel-faqs">
            <h2>Other Info</h2>
            {{--<div class="topics">--}}
                {{--<ul class="check-square clearfix">--}}
                    {{--<li class="col-sm-6 col-md-4"><a href="#">address &amp; map</a></li>--}}
                    {{--<li class="col-sm-6 col-md-4"><a href="#">messaging</a></li>--}}
                    {{--<li class="col-sm-6 col-md-4"><a href="#">refunds</a></li>--}}
                    {{--<li class="col-sm-6 col-md-4"><a href="#">pricing</a></li>--}}
                    {{--<li class="col-sm-6 col-md-4 active"><a href="#">reservation requests</a></li>--}}
                    {{--<li class="col-sm-6 col-md-4"><a href="#">your reservation</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}

            <div class="toggle-container">
                <div class="panel style1 arrow-right">
                    <h4 class="panel-title">
                        <a class="collapsed" href="#question1" data-toggle="collapse">Hotel Service Information?</a>
                    </h4>
                    <div class="panel-collapse collapse " id="question1" style="height: auto;">
                        <div class="panel-content">
                            {!! $hotel->service_information !!}
                        </div>
                    </div>
                </div>
                <div class="panel style1 arrow-right">
                    <h4 class="panel-title">
                        <a class="collapsed" href="#question2" data-toggle="collapse">Hotel Other Information?</a>
                    </h4>
                    <div class="panel-collapse collapse" id="question2">
                        <div class="panel-content">
                            {!! $hotel->other_information !!}
                        </div>
                    </div>
                </div>
                <div class="panel style1 arrow-right">
                    <h4 class="panel-title">
                        <a class="collapsed" href="#question3" data-toggle="collapse">Hotel Policy?</a>
                    </h4>
                    <div class="panel-collapse collapse" id="question3">
                        <div class="panel-content">
                            {!! $hotel->policy !!}
                        </div>
                    </div>
                </div>

                <div class="panel style1 arrow-right">
                    <h4 class="panel-title">
                        <a class="collapsed" href="#question4" data-toggle="collapse">Hotel Terms?</a>
                    </h4>
                    <div class="panel-collapse collapse" id="question4">
                        <div class="panel-content">
                            {!! $hotel->terms !!}
                        </div>
                    </div>
                </div>
                <div class="panel style1 arrow-right">
                    <h4 class="panel-title">
                        <a class="collapsed" href="#question5" data-toggle="collapse">Hotel Cancellation?</a>
                    </h4>
                    <div class="panel-collapse collapse" id="question5">
                        <div class="panel-content">
                            {!! $hotel->cancellation !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="tab-pane fade" id="hotel-reviews">
            <div class="intro table-wrapper full-width hidden-table-sms">
                <div class="rating table-cell col-sm-4">
                    <span class="score">{{ round($hotel->ratings()->avg('rating_value'), 1) }}/5.0</span>
                    <div class="five-stars-container"><div class="five-stars" style="width:  {{ $hotel->ratings()->avg('rating_value')*20 }}%;"></div></div>
                    <a href="#" class="goto-writereview-pane button green btn-small full-width">WRITE A REVIEW</a>
                </div>
                <div class="table-cell col-sm-8">
                    <div class="detailed-rating">
                        <ul class="clearfix">
                          @foreach($ratingTypes as $rating_type)

                            <li class="col-md-6">
                                <div class="each-rating">
                                    <label>{{ $rating_type->name }}</label>
                                    <div class="five-stars-container">
                                        <div class="five-stars" style="width:{{ $hotel->ratings()->where('rating_type', '=', $rating_type->id)->avg('rating_value')*20 }}%;"></div>
                                    </div>
                                </div>
                            </li>

                          @endforeach

                        </ul>
                    </div>
                </div>
            </div>


            <div class="guest-reviews">
                <h2>Guest Reviews</h2>
                @foreach($hotel->comments()->take(10)->get() as $comment)
                <div class="guest-review table-wrapper">
                    <div class="col-xs-3 col-md-2 author table-cell">
                        <a href="#"><img src="{{ asset($comment->user->profilePicture->path.'/'.$comment->user->profilePicture->name) }}" alt="" width="270" height="263"></a>
                        <p class="name">{{ $comment->user->first_name.' '.$comment->user->last_name }}</p>
                        <p class="date">{{ date("M, d, Y", strtotime($comment->created_at)) }}</p>
                    </div>
                    <div class="col-xs-9 col-md-10 table-cell comment-container">
                        <div class="comment-header clearfix">
                            <h4 class="comment-title">{!! $comment->review_title !!}</h4>
                            <div class="review-score">
                                <div class="five-stars-container"><div class="five-stars" style="width: {{ round($comment->ratings()->avg('rating_value'))*20 }}%;"></div></div>
                                <span class="score">{{ round($comment->ratings()->avg('rating_value')) }}/5.0</span>
                            </div>
                        </div>
                        <div class="comment-content">
                            <p>{!! $comment->review_text !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{--<a href="#" class="button full-width btn-large">LOAD MORE REVIEWS</a>--}}
        </div>
        <div class="tab-pane fade" id="hotel-write-review">

            @if(Auth::check())

            {!! Form::open(['url'=>'reviews', 'class'=>'review-form']) !!}

            <div class="main-rating table-wrapper full-width hidden-table-sms intro">
                <article class="image-box box hotel listing-style1 photo table-cell col-sm-4">
                @if(!empty($hotel->images[1]))
                    <figure>
                        <a class="hover-effect" title="" href="#"><img width="270" height="160" alt="" src="/{{$hotel->images[1]->path}}/{{$hotel->images[1]->name}}"></a>
                    </figure>
                @endif
                    <div class="details">
                        <h4 class="box-title">{{$hotel->name}}<small><i class="soap-icon-departure"></i>{{$hotel->city}}, {{$hotel->country}}</small></h4>
                        <div class="feedback">
                            <div title="" class="five-stars-container" data-toggle="tooltip" data-placement="bottom" data-original-title="{{ $hotel->ratings()->avg('rating_value') }} stars">
                                <span class="five-stars" style="width: {{ $hotel->ratings()->avg('rating_value')*20 }}%;"></span></div>
                            <span class="review">{{ count($hotel->comments) }} reviews</span>
                        </div>
                    </div>
                </article>
                <div class="table-cell col-sm-8">
                    <div class="overall-rating">
                        <h4>Your overall Rating of this property</h4>
                        <div class="star-rating clearfix">
                            <div class="five-stars-container">
                                <div class="five-stars" style="width: {{ $hotel->ratings()->avg('rating_value')*20 }}%;"></div>
                            </div>
                            <span class="status">VERY GOOD</span>
                        </div>
                        <div class="detailed-rating">
                            <ul class="clearfix">
                                @foreach($ratingTypes as $rating)
                                <li class="col-md-6"><div class="each-rating">
                                        <label>{{ $rating->name }}</label>
                                        <div class="five-stars-container editable-rating" data-original-stars="5">
                                            {!! Form::hidden('ratings['.$rating->id.'][rating_type]', $rating->id) !!}
                                            {!! Form::hidden('ratings['.$rating->id.'][rating_value]', 5, ['class'=>'rating-input']) !!}
                                        </div>
                                    </div>
                                </li>
                                @endforeach


                            </ul>
                        </div>
                    </div>
                </div>
            </div>


                <div class="form-group col-md-5 no-float no-padding">
                    <h4 class="title">Title of your review</h4>
                    {!! Form::text('review_title', null, ['class'=>'input-text full-width', 'placeholder'=>'enter a review title']) !!}
                </div>
                <div class="form-group">
                    <h4 class="title">Your review</h4>
                    {!! Form::textarea('review_text', null, ['class'=>'input-text full-width', 'rows'=>'5', 'placeholder'=>'enter your review (minimum 200 characters)']) !!}
                </div>

                <div class="form-group col-md-5 no-float no-padding no-margin">
                    <button type="submit" class="btn-large full-width">SUBMIT REVIEW</button>
                </div>

            {!! Form::hidden('hotel_id', $hotel->id) !!}
            {!! Form::hidden('user_id', Auth::user()->id) !!}
            {!! Form::hidden('service', 'hotel') !!}
            {!! Form::close() !!}
            @else
                <h1 class="text-center">Please Login First</h1>
            @endif
        </div>
    </div>
