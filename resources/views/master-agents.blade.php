<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->
<head>
    @include('header.head')
</head>
<body class="dashboard style1 agent">
<div id="page-wrapper">
    <header id="header" class="navbar-static-top">
        @include('header.header-agents')
    </header>

    <section id="content" class="">
        <div class="container">
            <div class="tab-container full-width-style arrow-left dashboard">
                @yield('content')
            </div>
        </div>
    </section>


    <footer id="footer">
        <div class="footer-wrapper">
            <div class="container">
                <div class="main-menu tab-container full-width-style clearfix">
                    <div class="tab-content pull-right">
                        {{--<nav id="main-menu" role="navigation" class="hidden-mobile inline-block">--}}
                            {{--<ul class="menu">--}}
                                {{--<li class="menu-item-has-children menu-color-yellow">--}}
                                    {{--<a href="index.html">Home</a>--}}
                                    {{--<ul>--}}
                                        {{--<li><a href="index.html">Home Layout 1</a></li>--}}

                                    {{--</ul>--}}
                                {{--</li>--}}
                                {{--<li class="menu-item-has-children menu-color-yellow">--}}
                                    {{--<a href="hotel-index.html">Hotels</a>--}}
                                    {{--<ul>--}}
                                        {{--<li><a href="hotel-index.html">Home Hotels</a></li>--}}

                                    {{--</ul>--}}
                                {{--</li>--}}
                                {{--<li class="menu-item-has-children menu-color-yellow">--}}
                                    {{--<a href="flight-index.html">Flights</a>--}}
                                    {{--<ul>--}}
                                        {{--<li><a href="flight-index.html">Home Flights</a></li>--}}

                                    {{--</ul>--}}
                                {{--</li>--}}
                                {{--<li class="menu-item-has-children menu-color-yellow">--}}
                                    {{--<a href="car-index.html">Cars</a>--}}
                                    {{--<ul>--}}
                                        {{--<li><a href="car-index.html">Home Cars</a></li>--}}

                                    {{--</ul>--}}
                                {{--</li>--}}
                                {{--<li class="menu-item-has-children menu-color-yellow">--}}
                                    {{--<a href="cruise-index.html">Cruises</a>--}}
                                    {{--<ul>--}}
                                        {{--<li><a href="cruise-index.html">Home Cruises</a></li>--}}

                                    {{--</ul>--}}
                                {{--</li>--}}


                                {{--<li class="menu-item-has-children menu-color-yellow">--}}
                                    {{--<a href="#">Bonus</a>--}}
                                    {{--<ul>--}}
                                        {{--<li><a href="dashboard1.html">Dashboard 1</a></li>--}}


                                    {{--</ul>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</nav>--}}
                        <div class="copyright" style="color: #ffffff;">
                            <p>&copy; 2015 Momento</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- Javascript -->
<script type="text/javascript" src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.noconflict.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/modernizr.2.7.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.placeholder.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui.1.10.4.min.js') }}"></script>

<!-- Twitter Bootstrap -->
<script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>

<!-- Flex Slider -->
<script type="text/javascript" src="{{ asset('components/flexslider/jquery.flexslider-min.js') }}"></script>

<script type="text/javascript">
    enableChaser = 0;
</script>

<!-- waypoint -->
<script type="text/javascript" src="{{ asset('js/waypoints.min.js') }}"></script>

<!-- load page Javascript -->
<script type="text/javascript" src="{{ asset('js/theme-scripts.js') }}"></script>

<script type="text/javascript">
    tjq(document).ready(function() {
        tjq("#profile .edit-profile-btn").click(function(e) {
            e.preventDefault();
            tjq(".view-profile").fadeOut();
            tjq(".edit-profile").fadeIn();
        });

        setTimeout(function() {
            tjq(".notification-area").append('<div class="info-box block"><span class="close"></span><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus ab quis a dolorem, placeat eos doloribus esse repellendus quasi libero illum dolore. Esse minima voluptas magni impedit, iusto, obcaecati dignissimos.</p></div>');
        }, 10000);
    });
    tjq('a[href="#profile"]').on('shown.bs.tab', function (e) {
        tjq(".view-profile").show();
        tjq(".edit-profile").hide();
    });
</script>
</body>
</html>

