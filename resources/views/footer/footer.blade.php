<footer id="footer" class="@if(isset($class)) {{ $class }} @else style3 @endif">
    <div class="footer-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <h2>Discover</h2>
                    <ul class="discover triangle hover row">
                        <li class="col-xs-6"><a href="{{ url('about-us') }}">About</a></li>
                        <li class="col-xs-6"><a href="{{ url('contact-us') }}">Contact</a></li>
                        <li class="col-xs-6"><a href="{{ url('faqs') }}">FAQs</a></li>
                        <li class="col-xs-6"><a href="{{ url('policy') }}">Policies</a></li>

                        <li class="col-xs-6"><a href="{{ url('hotels') }}">Hotels</a></li>
                        <li class="col-xs-6"><a href="{{ url('tours') }}">Tours</a></li>
                        <li class="col-xs-6"><a href="{{ url('cars') }}">Cars</a></li>
                        <li class="col-xs-6"><a href="#">Flights</a></li>
                        {{--<li class="col-xs-6"><a href="#">Blog Posts</a></li>--}}
                        {{--<li class="col-xs-6"><a href="#">Social Connect</a></li>--}}
                        {{--<li class="col-xs-6"><a href="#">Help Topics</a></li>--}}
                        {{--<li class="col-xs-6"><a href="#">Site Map</a></li>--}}
                    </ul>
                </div>
                <div class="col-sm-6 col-md-3">
                    <h2>Travel News</h2>
                    <ul class="travel-news">
                        <?php $count = 0; ?>
                        @foreach($latestNewses as $latestNews)
                            @if ($count<2)
                                    {{--{{dd($latestNews->images[0])}}--}}
                        <li>

                            <div class="thumb">
                                <a href="{{ url('articles/'.$latestNews->id) }}">
                                    <img src="{{ url($latestNews->images->path.'/'.$latestNews->images->name) }}" alt="" width="63" height="63" />
                                </a>
                            </div>
                            <div class="description">
                                <h5 class="s-title"><a href="{{ url('articles/'.$latestNews->id) }}">{{$latestNews->title }}</a></h5>
                                <p>{{ substr($latestNews->body, 0, 50)}}</p>
                                <span class="date">{{$latestNews->created_at}}</span>
                            </div>
                        </li>
                                @endif
                            <?php $count ++; ?>
                        @endforeach

                    </ul>
                </div>
                <div class="col-sm-6 col-md-3">
                    <h2>Stay Updated</h2>
                    <p>Enter your E-mail adrress to get our latest offers and updates.</p>
                    <br />
                    <div class="icon-check">
                        <input type="text" class="input-text full-width" placeholder="your email" />
                    </div>
                    <br />
                    <span>We respect your privacy</span>
                </div>
                <div class="col-sm-6 col-md-3">
                    <h2>Contact Us</h2>
                    <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                    <br />
                    <address class="contact-details">
                        <?php $phone_numbers = explode(',', $settings->phone_no) ?>
                        @foreach($phone_numbers as $number)
                        <span class="contact-phone"><i class="soap-icon-phone"></i> {!! $number !!}</span><br/>
                        @endforeach
                        <br />
                        <a href="#" class="contact-email">{{$settings->admin_email}}</a>
                    </address>

                    <ul class="social-icons clearfix">
                        {{--<li class="twitter"><a title="twitter" href="#" data-toggle="tooltip"><i class="soap-icon-twitter"></i></a></li>--}}
                        <li class="googleplus"><a title="googleplus" href={{"https://plus.google.com/".$settings->googleplus}} data-toggle="tooltip"><i class="soap-icon-googleplus"></i></a></li>
                        <li class="facebook"><a title="facebook" href={{"http://facebook.com/".$settings->facebook}} data-toggle="tooltip"><i class="soap-icon-facebook"></i></a></li>
                        {{--<li class="linkedin"><a title="linkedin" href="#" data-toggle="tooltip"><i class="soap-icon-linkedin"></i></a></li>--}}
                        {{--<li class="vimeo"><a title="vimeo" href="#" data-toggle="tooltip"><i class="soap-icon-vimeo"></i></a></li>--}}
                        {{--<li class="dribble"><a title="dribble" href="#" data-toggle="tooltip"><i class="soap-icon-dribble"></i></a></li>--}}
                        {{--<li class="flickr"><a title="flickr" href="#" data-toggle="tooltip"><i class="soap-icon-flickr"></i></a></li>--}}
                        {{--<li class="pinterest"><a title="pinterest" href="#" data-toggle="tooltip"><i class="soap-icon-interest"></i></a></li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom gray-area">
        <div class="container">
            <div class="logo pull-left">
                <a href="/" title="Momento - home">
                    <img src="{{ asset('/images/logo.png') }}" alt="" />
                </a>
            </div>
            <div class="pull-right">
                <a id="back-to-top" href="#" class="animated" data-animation-type="bounce"><i class="soap-icon-longarrow-up circle"></i></a>
            </div>
            <div class="copyright pull-right">
                <p>&copy; 2015 Momento</p>
            </div>
        </div>
    </div>
</footer>