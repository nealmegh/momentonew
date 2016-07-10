<div class="block row">
    <div class="col-md-6">
        <h2>Hot Hotel Details</h2>
        <div class="tab-container style1 box">
            <ul class="tabs">
                <li class="active"><a href="#hot-hotel-popular" data-toggle="tab">Popular</a></li>
                <li><a href="#hot-hotel-lasvegas" data-toggle="tab">Dhaka</a></li>
                <li><a href="#hot-hotel-miami" data-toggle="tab">Sylhet</a></li>
                <li><a href="#hot-hotel-sanfrancisco" data-toggle="tab">Chittagong</a></li>
                <li><a href="#hot-hotel-hongkong" data-toggle="tab">Cox's Bazar</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="hot-hotel-popular">
                    <?php $count = 0; ?>
                    @foreach($hotels as $hotel)
                        @if( $count < 2)
                                <?php  $hotelImage = $hotel->images()->where('type', 'gallery')->first(); ?>

                                <div class="row">
                                    <div class="col-xs-2">
                                        <a href="#" class="badge-container"><span class="badge-content">save 23%</span><img class="full-width" src="{{ $hotelImage->path }}/{{$hotelImage->name }}" alt="" width="63" height="59" /></a>
                                    </div>
                                    <div class="col-xs-8">
                                        <h5 class="box-title">{{$hotel->name}}<small>{{$hotel->city}}, {{$hotel->country}}</small></h5>
                                        <p class="no-margin">{{ $hotel->description }}</p>
                                    </div>
                                    <div class="col-xs-2">
                                        <span class="price"><small>avg/night</small>{{$hotel->avg}}</span>
                                        <br /><br />
                                        <a class="button green-bg pull-right" href="/hotels/detail/{{$hotel->id}}">SELECT</a>
                                    </div>
                                </div>
                            <?php $count ++; ?>
                        @endif
                    @endforeach
                </div>
                <div class="tab-pane fade" id="hot-hotel-lasvegas">
                    <?php $count = 0; ?>
                    @foreach($hotels as $hotel)
                        @if( $hotel->city == 'Dhaka' &&$count < 2)
                            <div class="row">
                                <div class="col-xs-2">
                                    <a href="#" class="badge-container"><span class="badge-content">save 23%</span><img class="full-width" src="{{ $hotel->images[2]->path }}/{{$hotel->images[2]->name}}" alt="" width="63" height="59" /></a>
                                </div>
                                <div class="col-xs-8">
                                    <h5 class="box-title">{{$hotel->name}}<small>{{$hotel->city}}, {{$hotel->country}}</small></h5>
                                    <p class="no-margin">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                                </div>
                                <div class="col-xs-2">
                                    <span class="price"><small>avg/night</small>{{$hotel->avg}}</span>
                                    <br /><br />
                                    <a class="button green-bg pull-right" href="/hotels/detail/{{$hotel->id}}">SELECT</a>
                                </div>
                            </div>
                                <?php $count ++; ?>
                        @endif
                    @endforeach
                </div>
                <div class="tab-pane fade" id="hot-hotel-miami">
                    <?php $count = 0; ?>
                    @foreach($hotels as $hotel)
                        @if($hotel->city == 'Sylhet' && $count < 2)
                                <div class="row">
                                    <div class="col-xs-2">
                                        <a href="#" class="badge-container"><span class="badge-content">save 23%</span><img class="full-width" src="{{ $hotel->images[2]->path }}/{{$hotel->images[2]->name}}" alt="" width="63" height="59" /></a>
                                    </div>
                                    <div class="col-xs-8">
                                        <h5 class="box-title">{{$hotel->name}}<small>{{$hotel->city}}, {{$hotel->country}}</small></h5>
                                        <p class="no-margin">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                                    </div>
                                    <div class="col-xs-2">
                                        <span class="price"><small>avg/night</small>{{$hotel->avg}}</span>
                                        <br /><br />
                                        <a class="button green-bg pull-right" href="/hotels/detail/{{$hotel->id}}">SELECT</a>
                                    </div>
                                </div>
                                <?php $count ++; ?>
                        @endif
                    @endforeach
                </div>
                <div class="tab-pane fade" id="hot-hotel-sanfrancisco">
                    <?php $count = 0; ?>
                    @foreach($hotels as $hotel)
                        @if($hotel->city == 'Chittagong' && $count < 2)
                                <div class="row">
                                    <div class="col-xs-2">
                                        <a href="#" class="badge-container"><span class="badge-content">save 23%</span><img class="full-width" src="{{ $hotel->images[2]->path }}/{{$hotel->images[2]->name}}" alt="" width="63" height="59" /></a>
                                    </div>
                                    <div class="col-xs-8">
                                        <h5 class="box-title">{{$hotel->name}}<small>{{$hotel->city}}, {{$hotel->country}}</small></h5>
                                        <p class="no-margin">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                                    </div>
                                    <div class="col-xs-2">
                                        <span class="price"><small>avg/night</small>{{$hotel->avg}}</span>
                                        <br /><br />
                                        <a class="button green-bg pull-right" href="/hotels/detail/{{$hotel->id}}">SELECT</a>
                                    </div>
                                </div>
                                <?php $count ++; ?>
                        @endif
                    @endforeach
                </div>
                <div class="tab-pane fade" id="hot-hotel-hongkong">
                    <?php $count = 0; ?>
                    @foreach($hotels as $hotel)
                        @if($hotel->city == 'Cox\'s Bazar' && $count < 2)
                                <div class="row">
                                    <div class="col-xs-2">
                                        <a href="#" class="badge-container"><span class="badge-content">save 23%</span><img class="full-width" src="{{ $hotel->images[2]->path }}/{{$hotel->images[2]->name}}" alt="" width="63" height="59" /></a>
                                    </div>
                                    <div class="col-xs-8">
                                        <h5 class="box-title">{{$hotel->name}}<small>{{$hotel->city}}, {{$hotel->country}}</small></h5>
                                        <p class="no-margin">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                                    </div>
                                    <div class="col-xs-2">
                                        <span class="price"><small>avg/night</small>{{$hotel->avg}}</span>
                                        <br /><br />
                                        <a class="button green-bg pull-right" href="/hotels/detail/{{$hotel->id}}">SELECT</a>
                                    </div>
                                </div>
                                <?php $count ++; ?>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-6">
        <h2>What Travelers Say?</h2>
        <div class="testimonial style1 box">
            <ul class="slides ">
                <li>
                    <p class="description">This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize your entire trip using their extremely fast website and up to date listings. I’m super excited about my next trip to Paris.</p>
                    <div class="author clearfix">
                        <a href="#"><img src="{{ asset('images/shortcodes/author1.png') }}" alt="" width="74" height="74" /></a>
                        <h5 class="name">Jessica Brown<small>guest</small></h5>
                    </div>
                </li>
                <li>
                    <p class="description">This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize your entire trip using their extremely fast website and up to date listings. I’m super excited about my next trip to Paris.</p>
                    <div class="author clearfix">
                        <a href="#"><img src="{{ asset('images/shortcodes/author2.png') }}" alt="" width="74" height="74" /></a>
                        <h5 class="name">Lisa Kimberly<small>guest</small></h5>
                    </div>
                </li>
                <li>
                    <p class="description">This is the 3rd time I’ve used Travelo website and telling you the truth their services are always realiable and it only takes few minutes to plan and finalize your entire trip using their extremely fast website and up to date listings. I’m super excited about my next trip to Paris.</p>
                    <div class="author clearfix">
                        <a href="#"><img src="{{ asset('images/shortcodes/author1.png') }}" alt="" width="74" height="74" /></a>
                        <h5 class="name">Jessica Brown<small>guest</small></h5>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>