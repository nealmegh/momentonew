<ul class="tabs">
    <li class="active"><a href="#tour-description" data-toggle="tab">Description</a></li>
    <li><a href="#hotel-amenities" data-toggle="tab">Tour Itinerary</a></li>
    <li><a href="#package-include" data-toggle="tab">Package Include</a></li>
    <li><a href="#package-exclude" data-toggle="tab">Package Exclude</a></li>

    <li><a href="#hotel-reviews" data-toggle="tab">Reviews</a></li>
    {{--<li><a href="#hotel-faqs" data-toggle="tab">FAQs</a></li>--}}
    {{--<li><a href="#hotel-things-todo" data-toggle="tab">Things to Do</a></li>--}}
    <li><a href="#hotel-write-review" data-toggle="tab">Write a Review</a></li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade in active" id="tour-description">
        <div class="intro small-box table-wrapper full-width hidden-table-sms">
            <div class="col-sm-4 table-cell features">
                <table>
                    <tbody>
                        <tr>
                            <td><label>Location:</label></td><td>{{ $tour->location }}</td>
                        </tr>
                        <tr>
                            <td><label>Tour Date:</label></td><td>{{ date('D, M, d, Y', strtotime($tour->tour_date ))}}</td>
                        </tr>
                        <tr>
                            <td><label>Duration:</label></td>
                            <?php
                            $datetime1 = date_create($tour->date_from);
                            $datetime2 = date_create($tour->date_to);
                            $interval = date_diff($datetime1, $datetime2);
                            ?>
                            <td>{{ $interval->format('%a days') }}</td>
                        </tr>
                        <tr>
                            <td><label>Available Seats:</label></td>
                            <td class="available-seats">Available</td>
                        </tr>
                        <tr>
                            <td><label>Price Per Adult:</label></td>
                            <td class="adult-price">{{ $settings->currency.' '.number_format($tour->price_per_adult, 2) }}</td>
                        </tr>
                        <tr>
                            <td><label>Price Per Child:</label></td>
                            <td class="child-price">{{ $settings->currency.' '.number_format($tour->price_per_child, 2) }}</td>
                        </tr>

                    </tbody></table>
            </div>
            <div class="col-sm-8 table-cell">
                    {!! Form::open(['url'=>'tours/booking', 'class'=>'tour-booking-form', 'method'=>'get']) !!}
                    <input type="hidden" name="tour" value="{{ $tour->id }}">

                    <div class="detail-section-top row">
                        <div class="st-details col-md-8 col-sm-8">
                            <h4 class="box-title">{{ $tour->title }}</h4>
                            <div class="st-description">{!! $tour->short_description !!}</div>
                            <div class="time"><i class="soap-icon-clock yellow-color"></i><span>As per Requirment</span></div>
                        </div>
                        <div class="price-details col-md-4 col-sm-4">
                            <h3 class="price">
                                <div class="adult-price">{{ $settings->currency.' '.number_format($tour->price_per_adult, 2) }}</div>
                                <small>per adult</small>
                            </h3>
                        </div>
                    </div>

                    <div class="detail-section-bottom">
                        <div class="row">
{{--                            {{ dd($tour->tour_date) }}--}}
                            @if($tour->tour_date != 0)
                            <div class="col-md-4 col-sm-6">
                                <label>BOOK ON</label>
                                <div class="datepicker-wrap">
                                    {!! Form::text('date_from', Input::get('date_from'), ['class' => 'input-text full-width', 'placeholder' => 'mm/dd/yy']) !!}
                                </div>
                            </div>
                            @endif

                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <label>ADULTS</label>
                                <div class="selector validation-field">
                                    <select name="adults" class="full-width">
                                        <option value="1" selected="">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    <span class="custom-select full-width">1</span>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3 col-xs-6">
                                <label>KIDS</label>
                                <div class="selector validation-field">
                                    <select name="kids" class="full-width">
                                        <option value="0" selected="">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    <span class="custom-select full-width">0</span>
                                </div>
                            </div>

                            <div class="col-md-4 pull-right">
                                <label>
                                    Total: <span class="total-price">{{ $settings->currency }} {{ number_format($tour->price_per_adult, 2) }}</span>
                                </label>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button data-animation-duration="1" data-animation-type="bounce" class="btn-book-now full-width icon-check animated bounce" type="submit" style="animation-duration: 1s; -webkit-animation-duration: 1s; visibility: visible;">BOOK NOW</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="tour-google-map block"></div>
        <h2>Information About {{ $tour->title }}</h2>
        {!! $tour->description !!}
    </div>
    <div class="tab-pane fade" id="hotel-amenities">
        <h2>Our Itinerary</h2>
        {!! $tour->itinerary !!}
    </div>
    <div class="tab-pane fade" id="package-include">
        <h2>Package Include </h2>
        <ul class="amenities clearfix style1">
            @foreach($tour->features()->where('package', 'include')->get() as  $facility)
                <li class="col-md-4 col-sm-6">
                    <div class="icon-box style1"><i class="soap-icon-availability yellow-bg"></i></i>{{ $facility->feature }}</div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="tab-pane fade" id="package-exclude">
        <h2>Package Exclude </h2>
        <ul class="amenities clearfix style1">
            @foreach($tour->features()->where('package', 'exclude')->get() as  $facility)
                <li class="col-md-4 col-sm-6">
                    <div class="icon-box style1"><i class="soap-icon-availability yellow-bg"></i></i>{{ $facility->feature }}</div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="tab-pane fade" id="hotel-reviews">
        <div class="intro table-wrapper full-width hidden-table-sms">
            <div class="rating table-cell col-sm-4">
                <span class="score">{{ round($tour->ratings()->avg('rating_value'), 1) }}/5.0</span>
                <div class="five-stars-container"><div class="five-stars" style="width: {{ $tour->ratings()->avg('rating_value')*20 }}%;"></div></div>
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
                                        <div class="five-stars" style="width:{{ $tour->ratings()->where('rating_type', '=', $rating_type->id)->avg('rating_value')*20 }}%;"></div>
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
            @foreach($tour->comments()->take(10)->get() as $comment)
                <div class="guest-review table-wrapper">
                    <div class="col-xs-3 col-md-2 author table-cell">
                        <a href="#"><img src="{{ asset($comment->user->profilePicture->path.'/'.$comment->user->profilePicture->name) }}" alt="" width="270" height="263"></a>
                        <p class="name">{{ $comment->user->first_name.' '.$comment->user->last_name }}</p>
                        <p class="date">{{ date("M, d, Y", strtotime($comment->created_at)) }}</p>
                    </div>
                    <div class="col-xs-9 col-md-10 table-cell comment-container">
                        <div class="comment-header clearfix">
                            <h4 class="comment-title">{{ $comment->review_title }}</h4>
                            <div class="review-score">
                                <div class="five-stars-container"><div class="five-stars" style="width: {{ $comment->ratings()->avg('rating_value')*20 }}%;"></div></div>
                                <span class="score">{{ round($comment->ratings()->avg('rating_value'), 1) }}/5.0</span>
                            </div>
                        </div>
                        <div class="comment-content">
                            <p>{{ $comment->review_text }}</p>
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

            <div class="tour-rating main-rating table-wrapper full-width hidden-table-sms intro">
                <article class="image-box box hotel listing-style1 photo table-cell col-sm-4">
                    <figure>
                    @if(!empty($tour->images[0]))
                    
                        <a class="hover-effect" title="" href="#"><img width="270" height="160" alt="" src="/{{$tour->images[0]->path}}/{{$tour->images[0]->name}}"></a>
                    @else
                    	<a class="hover-effect" title="" href="#"><img width="270" height="160" alt="" src="/images/no-image.png"></a>
                    @endif
                    </figure>
                    <div class="details">
                        <h4 class="box-title">{{ $tour->name }}<small><i class="soap-icon-departure"></i>{{$tour->city}}, {{$tour->country}}</small></h4>
                        <div class="feedback">
                            <div title="" class="five-stars-container" data-toggle="tooltip" data-placement="bottom" data-original-title="{{ $tour->ratings()->avg('rating_value') }} stars">
                                <span class="five-stars" style="width: {{ $tour->ratings()->avg('rating_value')*20 }}%;"></span>
                            </div>
                            <span class="review">{{ count($tour->comments) }} reviews</span>
                        </div>
                    </div>
                </article>
                <div class="table-cell col-sm-8">
                    <div class="overall-rating">
                        <h4>Your overall Rating of this property</h4>
                        <div class="star-rating clearfix">
                            <div class="five-stars-container">
                                <div class="five-stars" style="width: {{ $tour->ratings()->avg('rating_value')*20 }}%;"></div>
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

            {!! Form::hidden('tour_id', $tour->id) !!}
            {!! Form::hidden('user_id', Auth::user()->id) !!}
            {!! Form::hidden('service', 'tour') !!}
            {!! Form::close() !!}
        @else
            <h1>Please Login First</h1>
        @endif
    </div>
</div>