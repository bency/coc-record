<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
        <title>COC Record - {{ $title or ""}}</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-blue.min.css" />
        <!--     Fonts and icons     -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- CSS Files -->
        <link href="/assets/css/screen.css" rel="stylesheet">

        @stack('head-scripts')
    </head>
    <body class="index">
        <div class="header-image">
            <h1>COC record</h1>
        </div>
        <div class="mdl-grid">
            @yield('content')
        </div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
</body>
</html>
