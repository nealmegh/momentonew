<h2>Top Hire Cars</h2>
<div class="block image-carousel style2 flexslider" data-animation="slide" data-item-width="270" data-item-margin="30">
    <ul class="slides image-box style1">
        @foreach($cars as $car)
            <?php  $image = $car->images()->where('type', 'gallery')->first(); ?>

            <li>
            <article class="box">
                <figure>
                    <a class="hover-effect" title="" href="{{ url('cars/detail/'.$car->id) }}">
                        <img width="270" height="160" alt="" src="{{ url($image->path.'/'.$image->name) }}">
                    </a>
                </figure>
                <div class="details">
                    <span class="price"><small>FROM</small>{{ $settings->currency.' '.number_format($car->whole_day_price, 2) }}</span>
                    <h4 class="box-title">{{ $car->name }}<small>Per Day</small></h4>
                </div>
            </article>
        </li>
        @endforeach
    </ul>
</div>
