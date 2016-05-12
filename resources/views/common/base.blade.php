<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>COC Record - {{ $title or ""}}</title>
        <link rel="stylesheet" href="{{ asset('/components/bootstrap/dist/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('/components/bootstrap-material-design/dist/css/bootstrap-material-design.css') }}">
        <link rel="stylesheet" href="{{ asset('/components/bootstrap-material-design/dist/css/ripples.css') }}">
        @stack('head-scripts')
    </head>
    <body>
        @include('common.navbar')
        <div class="container">
        @yield('content')
        </div>
        <script src="{{ asset('/components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('/components/bootstrap/dist/js/bootstrap.js') }}"></script>
        <script src="{{ asset('/components/bootstrap-material-design/dist/js/ripples.min.js') }}"></script>
        <script src="{{ asset('/components/bootstrap-material-design/dist/js/material.min.js') }}"></script>
        @stack('tail-scripts')
		<script>
		$.material.init()
		</script>
    </body>
</html>
