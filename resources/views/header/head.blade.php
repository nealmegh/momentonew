<!-- Page Title -->
<title>{{ $settings->site_title }}</title>

<!-- Meta Tags -->
<meta charset="utf-8">
<meta name="keywords" content="{{ $settings->meta_tag }}" />
<meta name="description" content="{{ $settings->meta_description }}">
<meta name="author" content="Momento">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Theme Styles -->
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">

@yield('current-page-styles')

<!-- Responsive Styles -->
<link rel="stylesheet" href="{{ asset('css/responsive.css') }}">


<!-- Main Style -->
<link id="main-style" rel="stylesheet" href="{{ asset('css/style.css') }}">

<!-- Updated Styles -->
<link rel="stylesheet" href="{{ asset('css/updates.css') }}">

<!-- CSS for IE -->
<!--[if lte IE 9]>
<link rel="stylesheet" type="text/css" href="{{ asset('css/ie.css') }}" />
<![endif]-->


<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
<![endif]-->

<!-- Javascript Page Loader -->
<!--
    <script type="text/javascript" src="{{ asset('js/pace.min.js') }}" data-pace-options='{ "ajax": false }'></script>
    <script type="text/javascript" src="{{ asset('js/page-loading.js') }}"></script>
    -->

<!-- CK EDITOR 4 -->
<!-- <script src="//cdn.ckeditor.com/4.5.3/standard/ckeditor.js"></script> --!>



<!-- Custom Styles -->

@yield('head')
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
