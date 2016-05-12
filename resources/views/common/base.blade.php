<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>COC Record - {{ $title or ""}}</title>
        <link rel="stylesheet" href="{{ asset('/components/Bootflat/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/css/screen.css') }}">
        @stack('head-scripts')
    </head>
    <body>
        @include('common.navbar')
        <div class="container">
        @yield('content')
        </div>
        <script src="{{ asset('/components/Bootflat/js/jquery-1.10.1.min.js') }}"></script>
        <script src="{{ asset('/components/Bootflat/js/bootstrap.min.js') }}"></script>
        @stack('tail-scripts')
    </body>
</html>
