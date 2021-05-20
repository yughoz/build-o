<!DOCTYPE html>
<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title', 'Pages')</title>

    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/ui/prism.min.css') }}">
    @yield('vendor-style')
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
    @yield('page-style')
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body 
    class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static" 
    data-open="click" 
    data-menu="vertical-menu-modern" 
    data-col="2-columns">
        {{-- Include Sidebar --}}
        <!-- ============================================================== -->
        <!-- Left Sidebar  -->
        <!-- ============================================================== -->
        <section>
            <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
                <div class="navbar-header">
                    <ul class="nav navbar-nav flex-row">
                        <li class="nav-item mr-auto">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <h2 class="brand-text mb-0">{{ config('template.aliasNameApps', 'Laravel') }}</h2>
                            </a></li>
                        <li class="nav-item nav-toggle">
                            <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                                <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                                <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block primary collapse-toggle-icon" data-ticon="icon-disc"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="shadow-bottom"></div>
                <div class="main-menu-content">
                    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                        @each('panels.sidebar', config('template.menu'), 'menu')
                    </ul>
                </div>
            </div>
        </section>
        <!-- ============================================================== -->
        <!-- END: Left Sidebar  -->
        <!-- ============================================================== -->

        {{-- Start Main Content --}}
        <!-- ============================================================== -->
        <!-- Navbar Content  -->
        <!-- ============================================================== -->
        <!-- BEGIN: Navbar Content-->
        <div class="app-content content">
            <!-- BEGIN: Header-->
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>

            {{-- Include Navbar --}}
            @include('panels.navbar')

            <!-- ============================================================== -->
            <!-- Main Pages Content  -->
            <!-- ============================================================== -->
            <!-- BEGIN: Pages Content -->
            <div class="content-wrapper">
                {{-- Include Breadcrumb --}}
                @include('panels.breadcrumb')
                

                <div class="content-body">
                    {{-- Include Page Content --}}
                    @yield('content')
                </div>
            </div>
            <!-- End: Page Content-->

        </div>
        <!-- End: Navbar Content-->

        <!-- ============================================================== -->
        <!-- Footer & Script Content  -->
        <!-- ============================================================== -->
        <!-- BEGIN: Footer Content -->
        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>

        {{-- include footer --}}
        @include('panels/footer')

        {{-- include default scripts --}}
        @include('panels/scripts')
        <!-- End: Footer & Script Content-->
    </body>
</html>