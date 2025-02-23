<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="google-site-verification" content="CVRSko63NpmBbj8wZevCow5jfiDXDWpvaNdtOvLCum8" />
    <meta name="google-site-verification" content="H2kM2QZ8IVxJ3kk8xSIi2ZJVOwxoUvr1MDeas9SypW0"  />
    <meta name="google-site-verification" content="gTOEOzHk2oAYuPK9IgJeZSMrgJ1GzXoRQwLnCiKcBHQ"  />
    <meta name="description" content="@yield('meta_description', '')">
    <meta name="keywords" content="@yield('meta_keywords', '')">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">

    <!-- Open Graph for Social Media -->
    <meta property="og:locale" content="{{ app()->getLocale() . '_' . strtoupper(app()->getLocale()) }}">
    <meta property="og:title" content="@yield('og_title', 'Putera Sampoerna Foundation - Article')">
    <meta property="og:type" content="article">
    <meta property="og:description" content="@yield('og_description', '')">
    <meta property="og:image" content="@yield('og_image', '')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image:alt" content="@yield('og_image', '')">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="article:publisher" content="">
    <meta property="article:author" content="@yield('author', 'admin')">
    <meta property="article:published_time" content="@yield('published_at', '')">
    <meta property="article:modified_time" content="@yield('published_at', '')">

    <meta name="twitter:card" content="">
    <meta name="twitter:site" content="">
    <meta name="twitter:creator" content="">
    <meta name="twitter:title" content="@yield('og_title', 'Putera Sampoerna Foundation - Article')">
    <meta name="twitter:description" content="@yield('og_description', '')">
    <meta name="twitter:image" content="@yield('og_image', '')">
    <meta name="twitter:image:alt" content="">

    <link rel="alternate" hreflang="id" href="{{ url('/') }}/id/media/news/@yield('href_slug_ind', '')" />
    <link rel="alternate" hreflang="en" href="{{ url('/') }}/media/news/@yield('href_slug_en', '')" />
    <link rel="alternate" hreflang="x-default" href="{{ url('/') }}/media/news/@yield('href_slug_en', '')" />

    <link rel="icon" type="image/webp" sizes="113x128" href="{{ asset('assets/img/Icon/Five%20Icon%20PSF.webp') }}">
    <link rel="preload" as="style" onload="this.onload=null; this.rel='stylesheet'"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <noscript>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    </noscript>

    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <title>@yield('title', 'Putera Sampoerna Foundation')</title>

    @stack('head')
    @yield('style')
</head>

<body>
    {{-- Navbar --}}
    @include('components.navbar')

    {{ $slot }}
    @include('components.toolbox')
    {{-- Footer --}}
    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/script.min.js') }}"></script>
    @yield('script')
</body>

</html>
