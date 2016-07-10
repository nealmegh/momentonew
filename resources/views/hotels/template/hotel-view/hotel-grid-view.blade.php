
    @if($hotels_p != null)
    <div class="hotel-list">
        <div class="row image-box hotel listing-style1">

            @foreach($hotels_p as $hotel)
                <?php  $image = $hotel->images()->where('type', 'gallery')->first(); ?>

                <div class="col-sm-6 col-md-4">
                    <article class="box">
                        <figure>
                            <a href="{{ url('hotels/detail/'.$hotel->id) }}" class="hover-effect">
                                <img width="270" height="161" alt="" src="{{ url($image->path.'/'.$image->name) }}">
                                @if( isset($hotel->discount->amount) )
                                    <span class="discount">
                                        <span class="discount-text">{{ $hotel->discount->amount }}% Discount</span>
                                    </span>
                                @endif
                            </a>
                        </figure>
                        <div class="details">
                            <span class="price">
                                <small>min/night</small>
                                {{ $settings->currency }} {{ $hotel->roomTypes()->min('price') }}
                            </span>
                            <h4 class="box-title">{{ $hotel->name }}<small>{{ $hotel->city.', '.$hotel->country }}</small></h4>
                            <div class="feedback">
                                <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="{{ $hotel->grade->name }}">
                                    <span style="width: {{ $hotel->grade->id*20 }}%;" class="five-stars"></span></div>
                                <span class="review">{{ count($hotel->comments) }} reviews</span>
                            </div>
                            <p class="description">{!! substr($hotel->general_information, 0,125) !!}</p>
                            <div class="action">
                                    {!! Form::open(['url' => 'hotels/detail/'.$hotel->id, 'method' =>'get', 'class'=>'hotelDetail' ,'target' => '_blank']) !!}
                                    {!! Form::hidden('search', 'room') !!}
                                    {!! Form::hidden('date_from', Input::get("date_from")) !!}
                                    {!! Form::hidden('date_to', Input::get("date_to")) !!}
                                    {!! Form::hidden('num_of_room', Input::get('num_of_room') ) !!}
                                    {!! Form::hidden('num_of_adult', Input::get('num_of_adult') ) !!}
                                    {!! Form::hidden('num_of_child', Input::get('num_of_child') ) !!}

                                    <a class="button btn-small select">SELECT</a>
                                    <a class="button btn-small yellow popup-map" href="#" data-box="{{ $hotel->google_map }}">VIEW ON MAP</a>
                                {!! Form::close() !!}

                            </div>
                        </div>
                    </article>
                </div>
            @endforeach

        </div>
    </div>

        @if($type == 'all-hotels')
             {!! $hotels_p->render(); !!}
        @elseif($type == 'result')
             {!! $hotels_p->appends(Input::only('placeOrHotel', 'date_from', 'date_to', 'num_of_room', 'num_of_adult', 'num_of_child'))->render(); !!}
        @endif

    @else
        <div class="block white-bg">
            <h1 style="font-size: 55px; text-align: center; padding: 130px 0;" class="s-title">Hotel Not Found<br> </h1>
        </div>
    @endif

