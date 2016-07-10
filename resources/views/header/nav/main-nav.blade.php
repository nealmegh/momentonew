<a href="#mobile-menu-01" data-toggle="collapse" class="mobile-menu-toggle">
    Mobile Menu Toggle
</a>

<div class="container">
    <h1 class="logo navbar-brand">
        <a href="/" title="{{$settings->site_name}}">
            <img src="{{ asset('images/logo.png') }}" alt="{{$settings->site_name}}" />
        </a>
    </h1>

    <nav id="main-menu" role="navigation">
        <ul class="menu">
            <li class="menu-item-has-children">
                <a href="/">Home</a>
            </li>
            <li class="menu-item-has-children">
                {!! link_to('hotels', 'Hotels') !!}
            </li>

            <li class="menu-item-has-children">
                <a href="{{ url('tours') }}">Tours</a>
            </li>
            <li class="menu-item-has-children">
                <a href="{{ url('cars') }}">Cars</a>

            </li>
            {{--<li class="menu-item-has-children">--}}
                {{--<a href="{{ url('flights') }}">Flights</a>--}}
            {{--</li>--}}
            <li class="menu-item-has-children">
                <a href="{{ url('articles') }}">Stories</a>
            </li>
            <li class="menu-item-has-children">
                <a href="{{ url('about-us') }}">About Us</a>
            </li>
            <li class="menu-item-has-children">
                {!! link_to('contact-us', 'Contact') !!}
            </li>

        </ul>
    </nav>
</div>

<nav id="mobile-menu-01" class="mobile-menu collapse">
    <ul class="menu">
        <li class="menu-item-has-children">
            <a href="/">Home</a>
        </li>
        <li class="menu-item-has-children">
            {!! link_to('hotels', 'Hotels') !!}
        </li>

        <li class="menu-item-has-children">
            <a href="{{ url('tours') }}">Tours</a>
        </li>
        <li class="menu-item-has-children">
            <a href="{{ url('cars') }}">Cars</a>

        </li>
        {{--<li class="menu-item-has-children">--}}
            {{--<a href="{{ url('flights') }}">Flights</a>--}}
        {{--</li>--}}
        <li class="menu-item-has-children">
            <a href="{{ url('articles') }}">Stories</a>
        </li>
        <li class="menu-item-has-children">
            {!! link_to('contact-us', 'Contact') !!}
        </li>
    </ul>
</nav>