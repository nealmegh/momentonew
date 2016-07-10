
<div class="text-center description block">
     <h1>Our Prominent Hotels</h1>
</div>


<div class="block image-carousel style2 flexslider" data-animation="slide" data-item-width="360" data-item-margin="30">
    <ul class="slides image-box hotel listing-style1">
   
        @foreach($hotels as $hotel)
            <li>
                <article class="box">
                    @if($hotel->image != null)
                    <figure>
                        <a href="{{ url('hotels/detail/'.$hotel->id) }}" class="hover-effect"><img src="{{ asset($hotel->image->path.'/'.$hotel->image->name) }}" alt="" width="360" height="160" /></a>
                        @if( isset($hotel->discount->amount) )
                            <span class="discount">
                                   <span class="discount-text">{{ $hotel->discount->amount }}% Discount</span>
                            </span>
                        @endif
                    </figure>
                    @else
                    <figure>
                        <a href="{{ url('hotels/detail/'.$hotel->id) }}" class="hover-effect"><img src="{{ asset('images/no-image.png') }}" alt="" width="360" height="160" /></a>
                        @if( isset($hotel->discount->amount) )
                            <span class="discount">
                                  <span class="discount-text">{{ $hotel->discount->amount }}% Discount</span>
                            </span>
                        @endif
                    </figure>
                    
                    @endif
                    <div class="details">
                        <span class="price">
                                    <small>minimum/night</small>
                                    {{ $settings->currency }} {{ $hotel->avg }}
                                </span>
                        <h4 class="box-title">{{ $hotel->name }}<small>{{ $hotel->city }}</small></h4>
                        <div class="feedback">
                            <div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="" data-original-title="4 stars">
                                <span style="width: {{ $hotel->ratings()->avg('rating_value')*20 }}%;" class="five-stars"></span></div>
                            <span class="review">{{ count($hotel->comments) }} reviews</span>
                        </div>
                        <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                        <div class="action">
                            <a class="button btn-small" href="{{ url('hotels/detail/'.$hotel->id) }}">SELECT</a>
                            <a class="button btn-small yellow popup-map" href="#" data-box="{{ $hotel->google_map }}">VIEW ON MAP</a>
                        </div>


                    </div>
                </article>
            </li>
        @endforeach
    </ul>
</div>

