@extends('admin.layout.admin-layout')

@section('page-title')
    @include('common.page-title', ['PageTitle'=>'User Profile'])
@stop

@section('admin-content')
    <div class="tab-container full-width-style arrow-left dashboard">
        @include('admin.users._left-menu')
        <div class="tab-content">
            <div id="profile" class="tab-pane fade active in">
                    <div class="view-profile">
                        @include('flash::message')
                        <article class="image-box style2 box innerstyle personal-details">
                            <figure>
                                <a title="" href="#">

                                        @if( $image = $user->profilePicture()->where('type','=','profile')->first())
                                            <img width="270" height="263" alt="" src="{{ asset($image->path.'/'.$image->name) }}">
                                        @else
                                            <img width="270" height="263" alt="" src="{{ asset('images/no-image.png') }}">
                                        @endif
                                </a>
                            </figure>
                            <div class="details">
                                <a href="{{ url('admin/users/'.$user->id.'/edit') }}" class="button btn-mini pull-right edit-profile-btn">EDIT PROFILE</a>
                                <h2 class="box-title fullname">{{ $user->first_name.' '.$user->last_name }}</h2>
                                <dl class="term-description">
                                    <dt>user name:</dt><dd>{{ $user->email }}</dd>
                                    <dt>first name:</dt><dd>{{ $user->first_name }}</dd>
                                    <dt>last name:</dt><dd>{{ $user->last_name }}</dd>
                                    <dt>phone number:</dt><dd>{{ $user->phone_no }}</dd>
                                    <dt>Date of birth:</dt><dd>{{ $user->birth_date }}</dd>
                                    <dt>Street Address and number:</dt><dd>{{ $user->address }}</dd>
                                    <dt>Town / City:</dt><dd>{{ $user->city }}</dd>
                                    <dt>ZIP code:</dt><dd>{{ $user->zip }}</dd>
                                    <dt>Country:</dt><dd>{{ $user->country }}</dd>
                                </dl>
                            </div>
                        </article>
                        <hr>
                        <h2>About You</h2>
                        <div class="intro">
                            <p>{!! $user->about !!}</p>
                        </div>
                        <hr>

                    </div>

                {{--<div id="edit-profile" class="tab-pane fade">--}}
                    {{--<div class="view-profile">--}}
                        {{--<article class="image-box style2 box innerstyle personal-details">--}}
                            {{--<figure>--}}
                                {{--<a title="" href="#"><img width="270" height="263" alt="" src="{{ asset('images/shortcodes/team/jessica.png') }}"></a>--}}
                            {{--</figure>--}}
                            {{--<div class="details">--}}
                                {{--<a href="#" class="button btn-mini pull-right edit-profile-btn">EDIT PROFILE</a>--}}
                                {{--<h2 class="box-title fullname">Jessica Brown</h2>--}}
                                {{--<dl class="term-description">--}}
                                    {{--<dt>user name:</dt><dd>info@jessica.com</dd>--}}
                                    {{--<dt>first name:</dt><dd>jessica</dd>--}}
                                    {{--<dt>last name:</dt><dd>brown</dd>--}}
                                    {{--<dt>phone number:</dt><dd>1-800-123-HELLO</dd>--}}
                                    {{--<dt>Date of birth:</dt><dd>15 August 1985</dd>--}}
                                    {{--<dt>Street Address and number:</dt><dd>353 Third floor Avenue</dd>--}}
                                    {{--<dt>Town / City:</dt><dd>Paris,France</dd>--}}
                                    {{--<dt>ZIP code:</dt><dd>75800-875</dd>--}}
                                    {{--<dt>Country:</dt><dd>United States of america</dd>--}}
                                {{--</dl>--}}
                            {{--</div>--}}
                        {{--</article>--}}
                        {{--<hr>--}}
                        {{--<h2>About You</h2>--}}
                        {{--<div class="intro">--}}
                            {{--<p>Vestibulum tristique, justo eu sollicitudin sagittis, metus dolor eleifend urna, quis scelerisque purus quam nec ligula. Suspendisse iaculis odio odio, ac vehicula nisi faucibus eu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse posuere semper sem ac aliquet. Duis vel bibendum tellus, eu hendrerit sapien. Proin fringilla, enim vel lobortis viverra, augue orci fringilla diam, sed cursus elit mi vel lacus. Nulla facilisi. Fusce sagittis, magna non vehicula gravida, ante arcu pulvinar arcu, aliquet luctus arcu purus sit amet sem. Mauris blandit odio sed nisi porttitor egestas. Mauris in quam interdum purus vehicula rutrum quis in sem. Integer interdum lectus at nulla dictum luctus. Sed risus felis, posuere id condimentum non, egestas pulvinar enim. Praesent pretium risus eget nisi ullamcorper fermentum. Duis lacinia nisi ac rhoncus vestibulum.</p>--}}
                        {{--</div>--}}
                        {{--<hr>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-4">--}}
                                {{--<h4>Benefits of Tavelo Account</h4>--}}
                                {{--<ul class="benefits triangle hover">--}}
                                    {{--<li><a href="#">Faster bookings with lesser clicks</a></li>--}}
                                    {{--<li><a href="#">Track travel history &amp; manage bookings</a></li>--}}
                                    {{--<li class="active"><a href="#">Manage profile &amp; personalize experience</a></li>--}}
                                    {{--<li><a href="#">Receive alerts &amp; recommendations</a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-4 previous-bookings image-box style14">--}}
                                {{--<h4>Your Previous Bookings</h4>--}}
                                {{--<article class="box">--}}
                                    {{--<figure class="no-padding">--}}
                                        {{--<a title="" href="#">--}}
                                            {{--<img alt="" src="{{ asset('images/dashboard/booking1.png') }}" width="63" height="59">--}}
                                        {{--</a>--}}
                                    {{--</figure>--}}
                                    {{--<div class="details">--}}
                                        {{--<h5 class="box-title"><a href="#">Half-Day Island Tour</a><small class="fourty-space"><span class="price">$35</span> Family Package</small></h5>--}}
                                    {{--</div>--}}
                                {{--</article>--}}
                                {{--<article class="box">--}}
                                    {{--<figure class="no-padding">--}}
                                        {{--<a title="" href="#">--}}
                                            {{--<img alt="" src="{{ asset('images/dashboard/booking2.png') }}" width="63" height="59">--}}
                                        {{--</a>--}}
                                    {{--</figure>--}}
                                    {{--<div class="details">--}}
                                        {{--<h5 class="box-title"><a href="#">Ocean Park Tour</a><small class="fourty-space"><span class="price">$26</span> Per Person</small></h5>--}}
                                    {{--</div>--}}
                                {{--</article>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-4">--}}
                                {{--<h4>Need Travelo Help?</h4>--}}
                                {{--<div class="contact-box">--}}
                                    {{--<p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>--}}
                                    {{--<address class="contact-details">--}}
                                        {{--<span class="contact-phone"><i class="soap-icon-phone"></i> 1-800-123-HELLO</span>--}}
                                        {{--<br>--}}
                                        {{--<a class="contact-email" href="#">help@travelo.com</a>--}}
                                    {{--</address>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--</div>--}}
                    {{--<div id="change-password" class="tab-pane fade">--}}
                        {{--<div class="view-profile">--}}
                            {{--<div class="row">--}}
                                {{--Change Password--}}

                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>

        </div>

    </div>

@endsection