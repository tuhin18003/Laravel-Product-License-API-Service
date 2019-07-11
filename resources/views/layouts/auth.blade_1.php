<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ __('') }} - {{ config('app.name', 'My Portal') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/auth.css') }}" rel="stylesheet">
    
    <!-- Scripts -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}" defer></script>
    
</head>
<body>
    <div id="app">
        <div class="container register">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
