<div class="section gray-area">
    <div class="container">
        {{--<div class="text-center description block">--}}
            {{--<h1>Our Best Deals</h1>--}}
        {{--</div>--}}
        <div class="tour-packages row add-clearfix image-box">
            @foreach($tours as $key=>$tour)
                <div class="col-sm-6 col-md-4">
                <article class="box animated fadeInLeft" data-animation-type="fadeInLeft" style="-webkit-animation-duration: 1s; animation-duration: 1s; visibility: visible;">
                    <figure>

                        <a href="{{ url('tours/detail/'.$tour->id) }}">
                            @if(count($tour->images) > 0)
                                <img src="{{ asset($tour->images[0]->path.'/'.$tour->images[0]->name) }}" alt="">
                            @else
                                <img src="{{ asset('images/no-image.png') }}" style="width: 100%;" alt="">
                            @endif
                        </a>
                        <figcaption>
                            <span class="price">{{ $settings->currency }}{{ number_format($tour->price_per_adult, 2) }}</span>
                            <h2 class="caption-title">{{ $tour->title }}</h2>
                        </figcaption>
                    </figure>
                </article>
            </div>

            @endforeach
        </div>
    </div>
</div>
