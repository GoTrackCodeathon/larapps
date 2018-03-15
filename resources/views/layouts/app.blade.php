<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <base href="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('vis/vis-network.min.css') }}" rel="stylesheet">
</head>
    <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
        <div id="app"></div>
        <!-- built files will be auto injected -->
    </body>
    {{-- WebPack --}}
    <script src="{{ asset(mix('/js/manifest.js')) }}"></script>
    <script src="{{ asset(mix('/js/vendor.js')) }}"></script>
    <script src="{{ asset(mix('/js/app.js')) }}"></script>
</html>