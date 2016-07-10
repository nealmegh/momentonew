@extends('cars.layout.all-cars')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'Cars List View'])
@stop

@section('left-sidebar')
    @include('cars.template.car-view.left-sidebar')
@stop

@section('main-content')

        @include('common.sorting')

            <div class="car-list listing-style3 car">
                @forelse($cars as $car)
                    <?php  $image = $car->images()->where('type', 'gallery')->first(); ?>
                    <?php  $logo = $car->images()->where('type', 'logo')->first(); ?>

                        <article class="box">
                    <figure class="col-xs-3">
                        <span><img width="189" height="120" alt="" src="{{ url($image->path.'/'.$image->name) }}"></span>
                    </figure>
                    <div class="details col-xs-9 clearfix">
                        <div class="col-sm-8">
                            <div class="clearfix">
                                <h4 class="box-title">{{ $car->type }} Car<small>{{ $car->name }}</small></h4>
                                <div class="logo">
                                    <img src="{{ url($logo->path.'/'.$logo->name) }}" alt="">
                                </div>
                            </div>
                            <div class="amenities">
                                <ul>
                                    @foreach($car->facilities as $facility)
                                    <li><i class="{{ $facility->icon }} circle"></i></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-2 character">
                            <dl class="">
                                <dt class="skin-color">mileage</dt><dd>{{ $car->millage }} km/l</dd>
                                <dt class="skin-color">Pickup Time</dt><dd>{{ $car->pick_up_time }}</dd>
                                <dt class="skin-color">Location</dt><dd>{{ $car->pick_up_location }}</dd>
                            </dl>
                        </div>
                        <div class="action col-xs-6 col-sm-2">
                            <span class="price"><small>per day</small>{{ $settings->currency.' '.$car->whole_day_price }}</span>
                            <a href="{{ url('cars/detail/'.$car->id) }}" class="button btn-small full-width">select</a>
                        </div>
                    </div>
                </article>
                @empty
                    No Data Found
                @endforelse
            </div>
            {!! $cars->render() !!}
@stop