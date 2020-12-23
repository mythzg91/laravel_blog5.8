<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="{{ $meta_description }}">
  <meta name="author" content="{{ config('blog.author') }}">

  <title>{{ config('blog.title') }}</title>
  <link rel="alternate" type="application/rss+xml" href="{{ url('rss') }}"
        title="RSS Feed {{ config('blog.title') }}">

  {{-- Styles --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-clean-blog/1.0.0/css/clean-blog.min.css" integrity="sha512-cUGypWHQbQrqwYnNzDPtoi6vBw4xcSXrZ+C5GIfdlRfP75wQ5P6yzGF/YueZ9FVIaBFkwJWEC7OeKGJc7h206w==" crossorigin="anonymous" />
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
  @yield('styles')

  {{-- HTML5 Shim and Respond.js for IE8 support --}}
  <!--[if lt IE 9]>
  <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
@include('blog.partials.page-nav')

@yield('page-header')
@yield('content')

@include('blog.partials.page-footer')

{{-- Scripts --}}
<script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-clean-blog/1.0.0/js/clean-blog.min.js" integrity="sha512-P/eAVqo7dLvUv1OJRhMa/4+S16K/T8eeaMelCdVWKH1j3Flmahczj1dShpmr0RrOtM2dAy1K7B8mbtTGUeo1EQ==" crossorigin="anonymous"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

@yield('scripts')

</body>
</html>
