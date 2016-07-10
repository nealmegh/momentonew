<div class="block row">
    <div class="col-md-4">
        <h2>Last Minute Deals</h2>
        <div class="travelo-box image-box style13">
            @foreach($randomCars as $randomCar)
                <?php  $image = $randomCar->images()->where('type', 'gallery')->first(); ?>

                <div class="box">
                    <figure>
                        <img style="width: auto; height: 63px;" alt="" src="{{ url($image->path.'/'.$image->name) }}">
                    </figure>
                    <div class="action">
                        <span class="price"><small>whole day</small>{{ $settings->currency.number_format($randomCar->whole_day_price, 2) }}</span>
                    </div>
                    <div class="details">
                        <h4 class="box-title"><a href="{{ 'cars/detail/'.$randomCar->id }}">{{ $randomCar->type }}<small>{{ $randomCar->title }}</small></a></h4>
                        <span class="time skin-color"><i class="soap-icon-clock"></i>24 hours remaining</span>
                    </div>
                </div>
            <hr>
            @endforeach
        </div>

    </div>
    <div class="col-md-4">
        <h2>Why Book with us?</h2>
        <div class="travelo-box book-with-us-box">
            <ul>
                <li>
                    <i class="soap-icon-car circle"></i>
                    <h5 class="title"><a href="#">135,00+ Cars</a></h5>
                    <p>Nulla congue at lacus vitae vestibulum. Donec lorem felis, eleifend eget consequat quis.</p>
                </li>
                <li>
                    <i class="soap-icon-savings circle"></i>
                    <h5 class="title"><a href="#">Low Rates &amp; Savings</a></h5>
                    <p>Nulla congue at lacus vitae vestibulum. Donec lorem felis, eleifend eget consequat quis.</p>
                </li>
                <li>
                    <i class="soap-icon-support circle"></i>
                    <h5 class="title"><a href="#">Excellent Support</a></h5>
                    <p>Nulla congue at lacus vitae vestibulum. Donec lorem felis, eleifend eget consequat quis.</p>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-4">
        <h2>Explore More</h2>
        <div class="travelo-box explore-more image-box style5 clearfix">
            <div class="icon-box intro">
                <i class="soap-icon-recommend circle"></i>
                <h5 class="box-title"><small>Recommended for you!</small>Car Packages In Your Affordable Price</h5>
            </div>
            @foreach($featuredCars as $featureCar)
                <?php  $image = $featureCar->images()->where('type', 'gallery')->first(); ?>

                    <article class="box animated" data-animation-type="fadeIn" data-animation-delay="0  ">
                        <figure>
                            <a title="" href="{{ 'cars/detail/'.$featureCar->id }}"><img width="183" height="120" alt="" src="{{ url($image->path.'/'.$image->name) }}"></a>
                            <figcaption>
                                <h6 class="caption-title">{{ $featureCar->type }}</h6>
                                <span>{{ $featureCar->title }}</span>
                            </figcaption>
                        </figure>
                    </article>
            @endforeach
        </div>
    </div>
</div>
