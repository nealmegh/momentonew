            <div class="topnav hidden-xs">

                <div class="container">
                    <ul class="quick-menu pull-left">
                        @if(Auth::check())
                        @if(Auth::user()->hasRole('owner'))
                            <li><a href="{{ url('admin/dashboard') }}">My Account</a></li>
                        @elseif(Auth::user()->hasRole('agent'))
                            <li><a href="{{ url('agents/dashboard') }}">My Account</a></li>
                        @elseif(Auth::user()->hasRole('register'))
                            <li><a href="{{ url('user/dashboard') }}">My Account</a></li>
                        @endif
                        @else
                            <li><a href="{{ url('/auth/login') }}">My Account</a></li>
                        @endif
                        <li class="ribbon">
                            <a href="#">English</a>
                            {{--<ul class="menu mini">--}}
                                {{--<li><a href="#" title="Dansk">Dansk</a></li>--}}
                                {{--<li><a href="#" title="Deutsch">Deutsch</a></li>--}}
                            {{--</ul>--}}
                        </li>
                    </ul>
                    <ul class="quick-menu pull-right">
                        @if(Auth::check())
                            <li><a href="/auth/logout" class="">logout</a></li>
                        @else
                            <li><a href="#travelo-login" class="soap-popupbox">LOGIN</a></li>
                            <li><a href="#travelo-signup" class="soap-popupbox">SIGNUP</a></li>
                        @endif

                        <li class="ribbon currency">
                            <a href="#" title="">BDT</a>
                            {{--<ul class="menu mini">--}}
                                {{--<li><a href="#" title="AUD">AUD</a></li>--}}
                              {{----}}
                            {{--</ul>--}}
                        </li>
                    </ul>
                </div>

            </div>

            <div class="main-header">
                @if ((Request::is('admin/*') OR Request::is('admin')) AND Auth::check())
                    @include('common.template.admin-top-nav')
                @else
                    @include('header.nav.main-nav')
                @endif
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
                    <p class="description">By signing up, I agree to Momento's Terms of Service, Privacy Policy, Guest Refund olicy, and Host Guarantee Terms.</p>
                </div>
                <div class="email-signup">
                    @include('auth.master.register')
                </div>
                <div class="seperator"></div>
                <p>Already a Momento member? <a href="#travelo-login" class="goto-login soap-popupbox">Login</a></p>
            </div>



            <div id="travelo-login" class="travelo-login-box travelo-box">

                    @include('auth.master.login')

            </div>