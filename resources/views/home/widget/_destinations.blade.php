<div style="background-position: 50% 50px;" class="global-map-area section parallax" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="description text-center">
                        <h1>Our Tour Packages</h1>
                        <p>Please find out season's best tour deals that we are offering.</p>
                    </div>
                    <div class="image-carousel style3 flex-slider" data-item-width="220" data-item-margin="30">
                        
                    <div style="overflow: hidden; position: relative;" class="flex-viewport">
                        <ul style="width: 1400%; transition-duration: 0.6s; transform: translate3d(0px, 0px, 0px);" class="slides image-box style9">
                            @foreach($tours as $tour)
                            <li>
                                <article class="box">
                                    <figure>
                                        <a href="{{ url('tours/detail/'.$tour->id) }}" title="" class="hover-effect yellow">
                                            @if(count($tour->images) > 0)
                                                <img draggable="false" src="{{ asset($tour->images[0]->path.'/thumbnail/'.$tour->images[0]->name) }}" alt="" height="190" width="170">
                                            @else
                                                <img draggable="false" src="{{ asset('images/no-image.png') }}"  alt="" height="190" width="170">
                                            @endif
                                        </a>
                                    </figure>
                                    <div class="details">
                                        <h4 class="box-title">{{ $tour->name }}<small>({{ count($tour->reviews) }} reviews)</small></h4>
                                        <a href="{{ url('tours/detail/'.$tour->id) }}" title="" class="button">MORE</a>
                                    </div>
                                </article>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                        <ol class="flex-control-nav flex-control-paging">
                            <li><a class="flex-active">1</a></li>
                            <li><a class="">2</a></li>
                        </ol>
                        <ul class="flex-direction-nav">
                            <li><a class="flex-prev" href="#">Previous</a></li>
                            <li><a class="flex-next" href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>

