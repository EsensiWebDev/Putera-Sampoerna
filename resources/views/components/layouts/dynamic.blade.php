<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Putera Sampoerna Foundation {{ ' - ' . $page->title}}</title>
    <link rel="icon" type="image/webp" sizes="113x128" href="{{ asset("assets/img/Icon/Five%20Icon%20PSF.webp") }}">
    <link rel="preload" as="style" onload="this.onload=null; this.rel='stylesheet'"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <noscript>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    </noscript>

    <link rel="stylesheet" href="{{ asset("assets/css/styles.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/app.css") }}">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
            integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <style>
        {!! $content['css'] ?? '' !!}
    </style>
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
