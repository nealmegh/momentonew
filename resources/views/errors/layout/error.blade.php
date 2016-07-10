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
        <a href="#mobile-menu-01" data-toggle="collapse" class="mobile-menu-toggle blue-bg">Mobile Menu Toggle</a>
        <div class="container">
            <h1 class="logo">
                <a href="" title="{{ $settings->site_name }}">
                    <img src="{{ asset('images/logo2.png') }}" alt="{{ $settings->site_name }}">
                </a>
            </h1>
        </div>
    </header>
    <section id="content" class="">
        @yield('content')
    </section>

</div>
@include('footer.footer-script')
</body>
</html>
