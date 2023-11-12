<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="manifest" href="{{ asset('manifest.json') }}">
  <meta name="msapplication-config" content="{{ asset('msapplication-config.xml') }}">

  <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('img/icons/android-icon-192x192.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/icons/favicon-32x32.png') }}">

  {{-- COnfig Safari browser --}}
  <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/icons/apple-icon-120x120.png') }}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/icons/apple-icon-152x152.png') }}">
  <link rel="apple-touch-icon" sizes="167x167" href="{{ asset('img/icons/apple-icon-167x167.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/icons/apple-icon-180x180.png') }}">

  {{-- Hide Safari User Interface Components & Change status bar color --}}
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="#1e2a78">

  <title>@hasSection('title')@yield('title'){{ ' — Spey' }}@else{{ 'Spey' }}@endif</title>

  <meta property="og:site_name" content="Spey">
  <meta property="og:type" content="object">
  <meta name="twitter:card" content="summary_large_image">

  @hasSection ('meta-tags')
    @yield('meta-tags')
  @else
    <meta name="description" content="Spey — это международная компания, деятельность которой направлена на улучшение жизни людей путем предоставления инновационной и востребованной продукции в сфере здравоохранения. Компания Spey ведет свою деятельность на международном фармацевтическом рынке уже более 15 лет.">
    <meta property="og:title" content="Spey">
    <meta property="og:description" content="Spey — это международная компания, деятельность которой направлена на улучшение жизни людей путем предоставления инновационной и востребованной продукции в сфере здравоохранения. Компания Spey ведет свою деятельность на международном фармацевтическом рынке уже более 15 лет.">
    <meta property="og:image" content="{{ asset('img/main/logo-share.png') }}">
    <meta property="og:image:alt" content="Spey logo">
  @endif

  {{-- Google Roboto Fonts --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

  {{-- Material Icons --}}
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Icons">

  {{-- Owl Carousel --}}
  <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/owl.theme.default.min.css') }}">

  {{-- Selectize --}}
  <link rel="stylesheet" href="{{ asset('plugins/selectize/selectize.css') }}">

  {{-- Plyr --}}
  <link rel="stylesheet" href="{{ asset('plugins/plyr/plyr.css') }}">

  {{-- Normalize CSS --}}
  <link rel="stylesheet" href="{{ asset('plugins/normalize.css') }}">

  {{-- <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('css/media.css') }}"> --}}

  {{-- App bundled stlyes --}}
  @vite('public/js/styles.js')
</head>

<body>
  @include('layouts.header')
  <main class="main @isset($pageClass){{ $pageClass }}@endisset">
    @yield('main')
  </main>
  @include('layouts.footer')
  <x-svg-sprite />

  {{-- JQuery --}}
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  {{-- Owl Carousel --}}
  <script src="{{ asset('plugins/owl-carousel/owl.carousel.min.js') }}"></script>

  {{-- Selectize --}}
  <script src="{{ asset('plugins/selectize/selectize.min.js') }}"></script>

  {{-- Yandex share buttons --}}
  <script src="https://yastatic.net/share2/share.js"></script>

  {{-- Appear JQ --}}
  <script src="{{ asset('plugins/appear.js') }}"></script>

  {{-- Plyr --}}
  <script src="{{ asset('plugins/plyr/plyr.polyfilled.js') }}"></script>

  @production
    @include('layouts.analytics')
  @endproduction

  {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
  {{-- App bundled scripts --}}
  @vite('public/js/app.js')
</body>

</html>
