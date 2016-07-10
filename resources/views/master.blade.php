<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]-->

<head>
    @include('header.head')
</head>
<body class="@if(isset($bodyClass)) {{ $bodyClass }} @endif">
    <div id="page-wrapper">
        <header id="header" class="navbar-static-top">
            @include('header.header')
        </header>
        @yield('slider')
        @yield('page-title')
        <section id="content" class="">
            @yield('content')
        </section>

        @include('footer.footer')
    </div>
    @include('footer.footer-script')
</body>
</html>

