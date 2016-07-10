<div class="container">
    <div class="section">
        <h2>Featured Hotels</h2>

        <div class="flexslider image-carousel style2 row-2" data-animation="slide" data-item-width="370" data-item-margin="30">
<?php $count = 0?>
            <div class="flex-viewport" style="overflow: hidden; position: relative;"><ul class="slides image-box style11" style="width: 800%; -webkit-transition-duration: 0.6s; transition-duration: 0.6s; -webkit-transform: translate3d(0px, 0px, 0px); transform: translate3d(0px, 0px, 0px);">
                    @foreach($hotels as $hotel)<?php $count++; ?>
                @if($count<9)
                    <li style="width: 370px; float: left; display: block;">
                        {{--<article class="box">--}}
                            {{--<figure>--}}
                                {{--<a title="" href="#"><img width="370" height="161" alt="" src="images/shortcodes/image-box/style11/4.png" draggable="false"></a>--}}
                                {{--<figcaption>--}}
                                    {{--<h3 class="caption-title">Orlando</h3>--}}
                                    {{--<span>orlando hotels</span>--}}
                                {{--</figcaption>--}}
                            {{--</figure>--}}
                        {{--</article>--}}
                        <article class="box">
                            <figure>
                                <a title="" href="/hotels/detail/{{$hotel->id}}"><img width="370" height="161" alt="" src="{{$hotel->images[1]->path}}/{{$hotel->images[1]->name}}" draggable="false"></a>
                                <figcaption>
                                    <h3 class="caption-title">{{$hotel->city}}</h3>
                                    <span>{{$hotel->name}}</span>
                                </figcaption>
                            </figure>
                        </article>
                    </li>
                    @endif
                    @endforeach
                    {{--<li style="width: 370px; float: left; display: block;">--}}
                        {{--<article class="box">--}}
                            {{--<figure>--}}
                                {{--<a title="" href="#"><img width="370" height="161" alt="" src="images/shortcodes/image-box/style11/5.png" draggable="false"></a>--}}
                                {{--<figcaption>--}}
                                    {{--<h3 class="caption-title">Bangkok</h3>--}}
                                    {{--<span>Bangkok hotels</span>--}}
                                {{--</figcaption>--}}
                            {{--</figure>--}}
                        {{--</article>--}}
                        {{--<article class="box">--}}
                            {{--<figure>--}}
                                {{--<a title="" href="#"><img width="370" height="161" alt="" src="images/shortcodes/image-box/style11/2.png" draggable="false"></a>--}}
                                {{--<figcaption>--}}
                                    {{--<h3 class="caption-title">Los Angeles</h3>--}}
                                    {{--<span>Los Angeles hotels</span>--}}
                                {{--</figcaption>--}}
                            {{--</figure>--}}
                        {{--</article>--}}
                    {{--</li>--}}
                    {{--<li style="width: 370px; float: left; display: block;">--}}
                        {{--<article class="box">--}}
                            {{--<figure>--}}
                                {{--<a title="" href="#"><img width="370" height="161" alt="" src="images/shortcodes/image-box/style11/6.png" draggable="false"></a>--}}
                                {{--<figcaption>--}}
                                    {{--<h3 class="caption-title">Miami</h3>--}}
                                    {{--<span>Miami beach hotels</span>--}}
                                {{--</figcaption>--}}
                            {{--</figure>--}}
                        {{--</article>--}}
                        {{--<article class="box">--}}
                            {{--<figure>--}}
                                {{--<a title="" href="#"><img width="370" height="161" alt="" src="images/shortcodes/image-box/style11/3.png" draggable="false"></a>--}}
                                {{--<figcaption>--}}
                                    {{--<h3 class="caption-title">Washington</h3>--}}
                                    {{--<span>Washington hotels</span>--}}
                                {{--</figcaption>--}}
                            {{--</figure>--}}
                        {{--</article>--}}
                    {{--</li>--}}
                    {{--<li style="width: 370px; float: left; display: block;">--}}
                        {{--<article class="box">--}}
                            {{--<figure>--}}
                                {{--<a title="" href="#"><img width="370" height="161" alt="" src="images/shortcodes/image-box/style11/4.png" draggable="false"></a>--}}
                                {{--<figcaption>--}}
                                    {{--<h3 class="caption-title">Orlando</h3>--}}
                                    {{--<span>orlando hotels</span>--}}
                                {{--</figcaption>--}}
                            {{--</figure>--}}
                        {{--</article>--}}
                        {{--<article class="box">--}}
                            {{--<figure>--}}
                                {{--<a title="" href="#"><img width="370" height="161" alt="" src="images/shortcodes/image-box/style11/1.png" draggable="false"></a>--}}
                                {{--<figcaption>--}}
                                    {{--<h3 class="caption-title">Boston</h3>--}}
                                    {{--<span>Boston hotels</span>--}}
                                {{--</figcaption>--}}
                            {{--</figure>--}}
                        {{--</article>--}}
                    {{--</li>--}}
                </ul></div><ol class="flex-control-nav flex-control-paging"><li><a class="flex-active">1</a></li><li><a class="">2</a></li></ol><ul class="flex-direction-nav"><li><a class="flex-prev" href="#">Previous</a></li><li><a class="flex-next" href="#">Next</a></li></ul></div>
        {{--<h2>Travel Guide and Tips</h2>--}}
        {{--<div class="row">--}}
            {{--<div class="col-sms-6 col-sm-6 col-md-3">--}}
                {{--<div class="travelo-box">--}}
                    {{--<h4 class="s-title animated fadeInLeft" data-animation-type="fadeInLeft" style="-webkit-animation-duration: 1s; visibility: visible;">Plan your Travels</h4>--}}
                    {{--<p>Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam elerisque mi id faucibus iaculis vitae pulvinar.</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-sms-6 col-sm-6 col-md-3">--}}
                {{--<div class="travelo-box">--}}
                    {{--<h4 class="s-title animated fadeInLeft" data-animation-type="fadeInLeft" style="-webkit-animation-duration: 1s; visibility: visible;">Check Availability</h4>--}}
                    {{--<p>Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam elerisque mi id faucibus iaculis vitae pulvinar.</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-sms-6 col-sm-6 col-md-3">--}}
                {{--<div class="travelo-box">--}}
                    {{--<h4 class="s-title animated fadeInLeft" data-animation-type="fadeInLeft" style="-webkit-animation-duration: 1s; visibility: visible;">Get Insurance</h4>--}}
                    {{--<p>Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam elerisque mi id faucibus iaculis vitae pulvinar.</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-sms-6 col-sm-6 col-md-3">--}}
                {{--<div class="travelo-box">--}}
                    {{--<h4 class="s-title animated fadeInLeft" data-animation-type="fadeInLeft" style="-webkit-animation-duration: 1s; visibility: visible;">Secure your Bookings</h4>--}}
                    {{--<p>Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam elerisque mi id faucibus iaculis vitae pulvinar.</p>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
</div>