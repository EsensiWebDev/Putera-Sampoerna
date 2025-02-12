<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="google-site-verification" content="CVRSko63NpmBbj8wZevCow5jfiDXDWpvaNdtOvLCum8" />
    <meta name="google-site-verification" content="H2kM2QZ8IVxJ3kk8xSIi2ZJVOwxoUvr1MDeas9SypW0" />
    <meta name="google-site-verification" content="gTOEOzHk2oAYuPK9IgJeZSMrgJ1GzXoRQwLnCiKcBHQ" />
    <meta name="description" content="@yield('meta_description', 'Default description here')">
    <meta name="keywords" content="@yield('meta_keywords', 'default, keywords, here')">
    
    <!-- Open Graph for Social Media -->
    <meta property="og:title" content="@yield('og_title', 'Default OG Title')">
    <meta property="og:description" content="@yield('og_description', 'Default OG Description')">
    <meta property="og:image" content="@yield('og_image', asset('default-image.jpg'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <title>Putera Sampoerna Foundation</title>
    <link rel="icon" type="image/webp" sizes="113x128" href="{{ asset("assets/img/Icon/Five%20Icon%20PSF.webp") }}">
    <link rel="preload" as="style" onload="this.onload=null; this.rel='stylesheet'" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"></noscript>

    <link rel="stylesheet" href="{{ asset("assets/css/styles.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/app.css") }}">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    @stack('head')
    @yield("style")
</head>

<body>
{{-- Navbar --}}
@include("components.navbar")

{{ $slot }}
@include("components.toolbox")
{{-- Footer --}}
@include("components.footer")

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset("assets/js/script.min.js") }}"></script>
@yield("script")
</body>
</html>
