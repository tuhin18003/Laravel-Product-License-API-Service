<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name', 'My Portal') }}</title>
    <!-- Touch Icons -->
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/favicon/favicon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/favicon/favicon.png') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('app-assets/vendors/vendors.min.css') }}" rel="stylesheet">
    <link href="{{ asset('app-assets/css/themes/vertical-modern-menu-template/materialize.css') }}" rel="stylesheet">
    <link href="{{ asset('app-assets/css/themes/vertical-modern-menu-template/style.css') }}" rel="stylesheet">
    <!--<link href="{{ asset('app-assets/css/pages/register.css') }}" rel="stylesheet">-->
    @yield('header')
    <link href="{{ asset('app-assets/css/custom/custom.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->
</head>
<body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 2-columns" data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">
    <!-- BEGIN: Header-->
    <header class="page-topbar" id="header">
      <div class="navbar navbar-fixed"> 
        <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark gradient-45deg-indigo-purple no-shadow">
          <div class="nav-wrapper">
            <ul class="navbar-list right">
              <li class="hide-on-large-only"><a class="waves-effect waves-block waves-light search-button" href="javascript:void(0);"><i class="material-icons">search</i></a></li>
              <li><a class="waves-effect waves-block waves-light notification-button" href="javascript:void(0);" data-target="notifications-dropdown"><i class="material-icons">notifications_none</i></a></li>
              <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><span class="avatar-status avatar-online"><img src="../../../app-assets/images/avatar/avatar-7.png" alt="avatar"><i></i></span></a></li>
              <li><a class="waves-effect waves-block waves-light sidenav-trigger" href="#" data-target="slide-out-right"><i class="material-icons">format_indent_increase</i></a></li>
            </ul>
            
            <!-- notifications-dropdown-->
            <ul class="dropdown-content" id="notifications-dropdown">
              <li>
                <h6>NOTIFICATIONS</h6>
              </li>
              <li class="divider"></li>
              <li>
                  No New Notification!
              </li>
            </ul>
            <!-- profile-dropdown-->
            <ul class="dropdown-content" id="profile-dropdown">
              <li><a class="grey-text text-darken-1" href="{{ route('my-profile') }}"><i class="material-icons">person_outline</i> Profile</a></li>
              <li><a class="grey-text text-darken-1" href="https://codesolz.net" target="_blank"><i class="material-icons">chat_bubble_outline</i> Chat</a></li>
              <li><a class="grey-text text-darken-1" href="https://codesolz.net" target="_blank"><i class="material-icons">help_outline</i> Help</a></li>
              <li class="divider"></li>
              <li><a class="grey-text text-darken-1" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons">keyboard_tab</i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- END: Header-->
    
    <!-- BEGIN: SideNav-->
    <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-active-square sidenav-dark">
      <div class="brand-sidebar">
            <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="index.html"><img src="{{ asset('app-assets/images/favicon/favicon.png') }}" alt="materialize logo"/><span class="logo-text hide-on-med-and-down">My Portal</span></a></h1>
      </div>
      <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
        <li class="@if( $cmenu == 'home' ) active gradient-shadow gradient-45deg-purple-amber @else bold @endif"><a class="waves-effect waves-cyan " href="/dashboard"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="">Dashboard</span></a>
        </li>
        <li class="navigation-header"><a class="navigation-header-text">Applications</a><i class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        <li class="@if( $cmenu == 'api' ) active gradient-shadow gradient-45deg-purple-amber @else bold @endif"><a class="waves-effect waves-cyan " href="{{ route('api') }}"><i class="material-icons">mail_outline</i><span class="menu-title" data-i18n="">API Keys</span></a>
        </li>
        <li class="@if( $cmenu == 'key-generator' ) active gradient-shadow gradient-45deg-purple-amber @else bold @endif"><a class="waves-effect waves-cyan " href="{{ route('key-generator') }}"><i class="material-icons">mail_outline</i><span class="menu-title" data-i18n="">Generate API Key</span></a>
        </li>
        <li class="@if( $cmenu == 'integrated_websites' ) active gradient-shadow gradient-45deg-purple-amber @else bold @endif"><a class="waves-effect waves-cyan " href="{{ route('integrated-websites') }}"><i class="material-icons">star_border</i><span class="menu-title" data-i18n="">Integrated Websites</span></a>
        </li>
        
        <li class="navigation-header"><a class="navigation-header-text">Upgrade</a><i class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        <li class="@if( $cmenu == 'upgrade' ) active gradient-shadow gradient-45deg-purple-amber @else bold @endif"><a class="waves-effect waves-cyan " href="{{ route('upgrade') }}"><i class="material-icons">add_shopping_cart</i><span class="menu-title" data-i18n="">Pricing</span></a>
        </li>
        <li class="@if( $cmenu == 'purchase_history' ) active gradient-shadow gradient-45deg-purple-amber @else bold @endif"><a class="waves-effect waves-cyan " href="{{ route('purchase-history') }}"><i class="material-icons">list</i><span class="menu-title" data-i18n="">Purchase History</span></a>
        </li>
      </ul>
      <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
    </aside>
    <!-- END: SideNav-->
    
    <!-- BEGIN: Page Main-->
    <div id="main">
        <div class="row">
            <div class="col s12">
                <div class="container">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    
    <!-- BEGIN: Footer-->
    <footer class="page-footer footer footer-static footer-dark gradient-45deg-indigo-purple gradient-shadow navbar-border navbar-shadow">
      <div class="footer-copyright">
        <div class="container"><span>&copy; 2019 <a href="https://codesolz.net" target="_blank">CodeSolz.net</a> All rights reserved.</span></div>
      </div>
    </footer>
    
<!-- Scripts -->
<script src="{{ asset('app-assets/js/vendors.min.js') }}" ></script>
<script src="{{ asset('app-assets/js/plugins.js') }}" defer></script>
<script src="{{ asset('app-assets/js/custom/custom-script.js') }}" defer></script>
<script src="{{ asset('app-assets/js/scripts/customizer.js') }}" defer></script>
<script src="{{ asset('app-assets/js/scripts/dashboard-ecommerce.js') }}" defer></script>
@yield('footer_script')
</body>
</html>
