<div class="section">
    <div class="container">
        <h2>Last Minute Packages</h2>
        <div class="image-carousel style2 flexslider" data-animation="slide" data-item-width="270" data-item-margin="30">

            <div class="flex-viewport" style="overflow: hidden; position: relative;"></div>
            <ol class="flex-control-nav flex-control-paging">
                <li><a class="flex-active">1</a></li>
            </ol>
            <ul class="flex-direction-nav">
                <li><a class="flex-prev" href="#">Previous</a></li>
                <li><a class="flex-next" href="#">Next</a></li>
            </ul>
            <div class="flex-viewport" style="overflow: hidden; position: relative;">
                <ul class="slides tour-locations" style="width: 1000%; transition-duration: 0.6s; -webkit-transition-duration: 0.6s; -webkit-transform: translate3d(0px, 0px, 0px); transform: translate3d(0px, 0px, 0px);">

                    @foreach($tours as $tour)
                    <li style="width: 270px; float: left; display: block;">
                        <article class="box">
                            <figure>
                                <a href="#" class="hover-effect">
                                    @if(count($tour->images) > 0)
                                        <img src="{{ asset($tour->images[0]->path.'/'.$tour->images[0]->name) }}" alt="" draggable="false">
                                    @else
                                        <img src="{{ asset('images/no-image.png') }}" style="width: 100%;" alt="" draggable="false">

                                    @endif
                                </a>
                            </figure>
                            <div class="details">
                                <span class="price">{{ $settings->currency }}{{ number_format($tour->price_per_adult, 2) }}</span>
                                <h4 class="box-title">{{ $tour->title }}</h4>
                                <hr>
                                <ul class="features check">
                                    @foreach($tour->features as $feature)
                                        <li>{{ $feature->feature }}</li>
                                    @endforeach
                                </ul>
                                <hr>
                                <div class="text-center">
                                    <div class="time">
                                        <i class="soap-icon-clock yellow-color"></i>
                                        <span>{{ date('d M Y', strtotime($tour->date_from))   }} - {{ date('d M Y', strtotime($tour->date_to))   }}</span>
                                    </div>
                                </div>
                                <a href="{{ url('tours/detail/'.$tour->id) }}" class="button btn-small full-width">TOUR DETAIL</a>
                            </div>
                        </article>
                    </li>
                    @endforeach

                </ul>
            </div>
            <ol class="flex-control-nav flex-control-paging">
                <li><a class="">2</a></li>
            </ol>
            <ul class="flex-direction-nav">
                <li><a class="flex-prev" href="#">Previous</a></li>
                <li><a class="flex-next" href="#">Next</a></li>
            </ul>
        </div>
    </div>
</div>