<h2>Cheap Flights &amp; Air Tickets</h2>
<div class="image-carousel style2 block" data-animation="slide" data-item-width="270" data-item-margin="30">
    <ul class="slides image-box listing-style2 flight">
        @foreach($flights as $flight)
            <?php  $image = $flight->images()->where('type', 'gallery')->first(); ?>
        <li>
            <article class="box">
                <figure>
                    <span><img src="{{ url($image->path.'/'.$image->name) }}" alt="" width="270" height="160" /></span>
                </figure>
                <div class="details">
                    <a title="View all" href="{{ url('flights/detail/'.$flight->id) }}" class="pull-right button btn-mini uppercase">select</a>
                    <h4 class="box-title">{{ $flight->company_name }}</h4>
                    <label class="price-wrapper">
                        <span class="price-per-unit">{{ $settings->currency.number_format($flight->base_fare, 2) }}</span>{{ ($flight->direction) }}
                    </label>
                </div>
            </article>
        </li>
        @endforeach

    </ul>
</div>
