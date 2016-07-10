<h2>Recommended Hotels</h2>
<div class="block image-carousel style2 flexslider" data-animation="slide" data-item-width="270" data-item-margin="30">
    <ul class="slides image-box listing-style2">
        @foreach($tours as $tour)
            <li>
                <article class="box">
                    <figure>
                        @if(isset($tour->images->path))
                            <a href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img src="{{ asset($tour->image->path.'/'.$tour->image->name) }}" alt="" width="270" height="160" /></a>
                        @else
                            <a href="ajax/slideshow-popup.html" class="hover-effect popup-gallery"><img src="/images/no-image.png" alt="" width="270" height="160" /></a>
                        @endif
                    </figure>
                    <div class="details">
                        <a title="View all"
                           href="{{ url('tours/detail/'.$tour->id) }}"
                           class="pull-right button uppercase">select</a>
                        <h4 class="box-title">
                            {{ $tour->title }}
                        </h4>
                        <label class="price-wrapper">
                            <span class="price-per-unit">
                                {{ $settings->currency }} {{ number_format((float)$tour->price_per_adult, 2, '.', '') }}
                            </span>per/Person
                        </label>
                    </div>
                </article>
            </li>
        @endforeach
    </ul>
</div>


