<div class="view-profile">
    @include('flash::message')
    <article class="image-box style2 box innerstyle personal-details">
        <figure>
            <a title="" href="#">
                @if( $image = Auth::user()->profilePicture()->where('type','=','profile')->first())
                    <img width="270" height="263" alt="" src="{{ asset($image->path.'/'.$image->name) }}">
                @else
                    <img width="270" height="263" alt="" src="{{ asset('images/no-image.png') }}">
                @endif
            </a>
        </figure>
        <div class="details">
            <a href="#" class="button btn-mini pull-right edit-profile-btn">EDIT PROFILE</a>
            <h2 class="box-title fullname">{{ Auth::user()->first_name.' '.Auth::user()->last_name }}</h2>
            <dl class="term-description">
                <dt>user name:</dt><dd>{{ Auth::user()->email }}</dd>
                <dt>first name:</dt><dd>{{ Auth::user()->first_name }}</dd>
                <dt>last name:</dt><dd>{{ Auth::user()->last_name }}</dd>
                <dt>phone number:</dt><dd>{{ Auth::user()->phone_no }}</dd>
                <dt>Date of birth:</dt><dd>{{ Auth::user()->birth_date }}</dd>
                <dt>Street Address and number:</dt><dd>{{ Auth::user()->address }}</dd>
                <dt>Town / City:</dt><dd>{{ Auth::user()->city }}</dd>
                <dt>ZIP code:</dt><dd>{{ Auth::user()->zip }}</dd>
                <dt>Country:</dt><dd>{{ Auth::user()->country }}</dd>
            </dl>
        </div>
    </article>
    <hr>
    <h2>About You</h2>
    <div class="intro">
        <p>{!! Auth::user()->about !!}</p>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <h4>Benefits of Tavelo Account</h4>
            <ul class="benefits triangle hover">
                <li><a href="#">Faster bookings with lesser clicks</a></li>
                <li><a href="#">Track travel history &amp; manage bookings</a></li>
                <li class="active"><a href="#">Manage profile &amp; personalize experience</a></li>
                <li><a href="#">Receive alerts &amp; recommendations</a></li>
            </ul>
        </div>
        <div class="col-md-4 previous-bookings image-box style14">
            <h4>Your Previous Bookings</h4>
            <article class="box">
                <figure class="no-padding">
                    <a title="" href="#">
                        <img alt="" src="{{ asset('images/dashboard/booking1.png') }}" width="63" height="59">
                    </a>
                </figure>
                <div class="details">
                    <h5 class="box-title"><a href="#">Half-Day Island Tour</a><small class="fourty-space"><span class="price">$35</span> Family Package</small></h5>
                </div>
            </article>
            <article class="box">
                <figure class="no-padding">
                    <a title="" href="#">
                        <img alt="" src="{{ asset('images/dashboard/booking2.png') }}" width="63" height="59">
                    </a>
                </figure>
                <div class="details">
                    <h5 class="box-title"><a href="#">Ocean Park Tour</a><small class="fourty-space"><span class="price">$26</span> Per Person</small></h5>
                </div>
            </article>
        </div>
        <div class="col-md-4">
            <h4>Need Travelo Help?</h4>
            <div class="contact-box">
                <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                <address class="contact-details">
                    <span class="contact-phone"><i class="soap-icon-phone"></i> 1-800-123-HELLO</span>
                    <br>
                    <a class="contact-email" href="#">help@momento.com</a>
                </address>
            </div>
        </div>
    </div>
</div>
<div class="edit-profile">
    @include('errors.list')

    @if($user = Auth::user())
        {!! Form::model($user ,[ 'method' => 'PATCH', 'files'=>'true', 'url'=>'agents/profile/'.$user->id] ) !!}
            @include('common.template._form-profile', ['SubmitButtonText' => 'Update User'])
        {!! Form::close() !!}
    @endif
</div>