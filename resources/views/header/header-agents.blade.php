<a href="#mobile-menu-01" data-toggle="collapse" class="mobile-menu-toggle yellow-bg">Mobile Menu Toggle</a>
<div class="container">
    <h1 class="logo navbar-brand">
        <a href="/" title="{{$settings->site_name}}">
            <img src="{{ asset('images/logo.png') }}" alt="{{$settings->site_name}}" style="height: 30px;"/>
        </a>
    </h1>
    <ul class="quick-menu pull-right hidden-mobile">
        <li class="ribbon menu-color-yellow">
            <a href="#">{{ Auth::user()->first_name.' '.Auth::user()->last_name }}</a>
            <ul class="menu mini uppercase">
                <li><a href="dashboard3.html#dashboard" class="location-reload">Dashboard</a></li>
                <li><a href="dashboard3.html#profile" class="location-reload">Profile</a></li>
                <li><a href="dashboard3.html#booking" class="location-reload">Bookings</a></li>
                <li><a href="dashboard3.html#wishlist" class="location-reload">wishlist</a></li>
                <li><a href="dashboard3.html#travel-stories" class="location-reload">travel stories</a></li>
                <li><a href="dashboard3.html#settings" class="location-reload">settings</a></li>
                <li><a href="#">signout</a></li>
            </ul>
        </li>
    </ul>
</div>

<div id="travelo-signup" class="travelo-signup-box travelo-box">
    {{--<div class="login-social">--}}
        {{--<a href="#" class="button login-facebook"><i class="soap-icon-facebook"></i>Login with Facebook</a>--}}
        {{--<a href="#" class="button login-googleplus"><i class="soap-icon-googleplus"></i>Login with Google+</a>--}}
    {{--</div>--}}
    {{--<div class="seperator"><label>OR</label></div>--}}
    <h1 class="logo navbar-brand">
        <a href="/" title="{{$settings->site_name}}">
            <img src="{{ asset('images/logo.png') }}" alt="{{$settings->site_name}}" />
        </a>
    </h1>
    <div class="simple-signup">
        <div class="text-center signup-email-section">
            <a href="#" class="signup-email"><i class="soap-icon-letter"></i>Sign up with Email</a>
        </div>
        <p class="description">By signing up, I agree to Travelo's Terms of Service, Privacy Policy, Guest Refund olicy, and Host Guarantee Terms.</p>
    </div>
    <div class="email-signup">
        <form>
            <div class="form-group">
                <input type="text" class="input-text full-width" placeholder="first name">
            </div>
            <div class="form-group">
                <input type="text" class="input-text full-width" placeholder="last name">
            </div>
            <div class="form-group">
                <input type="text" class="input-text full-width" placeholder="email address">
            </div>
            <div class="form-group">
                <input type="password" class="input-text full-width" placeholder="password">
            </div>
            <div class="form-group">
                <input type="password" class="input-text full-width" placeholder="confirm password">
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Tell me about Travelo news
                    </label>
                </div>
            </div>
            <div class="form-group">
                <p class="description">By signing up, I agree to Travelo's Terms of Service, Privacy Policy, Guest Refund Policy, and Host Guarantee Terms.</p>
            </div>
            <button type="submit" class="full-width btn-medium">SIGNUP</button>
        </form>
    </div>
    <div class="seperator"></div>
    <p>Already a Momento member? <a href="#travelo-login" class="goto-login soap-popupbox">Login</a></p>
</div>
<div id="travelo-login" class="travelo-login-box travelo-box">
    {{--<div class="login-social">--}}
        {{--<a href="#" class="button login-facebook"><i class="soap-icon-facebook"></i>Login with Facebook</a>--}}
        {{--<a href="#" class="button login-googleplus"><i class="soap-icon-googleplus"></i>Login with Google+</a>--}}
    {{--</div>--}}
    {{--<div class="seperator"><label>OR</label></div>--}}

    <h1 class="logo navbar-brand">
        <a href="/" title="{{$settings->site_name}}">
            <img src="{{ asset('images/logo.png') }}" alt="{{$settings->site_name}}" />
        </a>
    </h1>
    <form>
        <div class="form-group">
            <input type="text" class="input-text full-width" placeholder="email address">
        </div>
        <div class="form-group">
            <input type="password" class="input-text full-width" placeholder="password">
        </div>
        <div class="form-group">
            <a href="#" class="forgot-password pull-right">Forgot password?</a>
            <div class="checkbox checkbox-inline">
                <label>
                    <input type="checkbox"> Remember me
                </label>
            </div>
        </div>
    </form>
    <div class="seperator"></div>
    <p>Don't have an account? <a href="#travelo-signup" class="goto-signup soap-popupbox">Sign up</a></p>
</div>