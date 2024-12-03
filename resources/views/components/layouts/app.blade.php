<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Poetra Sampoerna Foundation</title>
    <link rel="icon" type="image/webp" sizes="113x128" href="{{ asset("assets/img/Icon/Five%20Icon%20PSF.webp") }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset("assets/css/styles.min.css") }}">
</head>

<body>
{{-- Navbar --}}
@include("components.navbar")

{{ $slot }}

{{-- Footer --}}
@include("components.footer")

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset("assets/js/script.min.js") }}"></script>
</body>
</html>
