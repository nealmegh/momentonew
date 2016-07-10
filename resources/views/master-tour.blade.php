<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->

<head>
    @include('header.head')
</head>
<body>
    <div id="page-wrapper">
        <header id="header" class="navbar-static-top">
                @include('header.header')
        </header>
        <section id="content" class="tour">
            @yield('slider')
            @yield('page-title')
            @yield('content')
        </section>
        @include('footer.footer')
    </div>


    @include('footer.footer-script')

</body>
</html>

