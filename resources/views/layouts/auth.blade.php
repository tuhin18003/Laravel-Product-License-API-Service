<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'My Portal') }}</title>
    <!-- Touch Icons -->
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/favicon/favicon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/favicon/favicon.png') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('app-assets/vendors/vendors.min.css') }}" rel="stylesheet">
    <link href="{{ asset('app-assets/css/themes/vertical-modern-menu-template/materialize.css') }}" rel="stylesheet">
    <link href="{{ asset('app-assets/css/themes/vertical-modern-menu-template/style.css') }}" rel="stylesheet">
    <link href="{{ asset('app-assets/css/pages/register.css') }}" rel="stylesheet">
    <link href="{{ asset('app-assets/css/custom/custom.css') }}" rel="stylesheet">
</head>
<body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 1-column register-bg  blank-page blank-page" data-open="click" data-menu="vertical-modern-menu" data-col="1-column">
    <div class="row">
        <div class="col s12">
            <div class="container"><div id="register-page" class="row">
                    @yield('content')
<!--                <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 register-card bg-opacity-8">
                </div>-->
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scripts -->
    <script src="{{ asset('app-assets/js/vendors.min.js') }}" defer></script>
    <script src="{{ asset('app-assets/js/plugins.js') }}" defer></script>
    <script src="{{ asset('app-assets/js/custom/custom-script.js') }}" defer></script>
</body>
</html>
