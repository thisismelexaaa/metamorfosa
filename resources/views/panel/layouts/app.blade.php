<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Zeta admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Zeta admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('./assets/panel/images/logo/favicon-icon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('./assets/panel/images/logo/favicon-icon.png') }}" type="image/x-icon">
    <title>Metamorfosa - @yield('title')</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('./assets/panel/css/vendors/font-awesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('./assets/panel/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('./assets/panel/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('./assets/panel/css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('./assets/panel/css/vendors/feather-icon.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('./assets/panel/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('./assets/panel/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('./assets/panel/css/vendors/date-picker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('./assets/panel/css/vendors/photoswipe.css') }}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('./assets/panel/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('./assets/panel/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('./assets/panel/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('./assets/panel/css/responsive.css') }}">
    <!-- Bootstrap Icon-->
    <link rel="stylesheet" href="{{ asset('./assets/bootstrap-icons/font/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/DataTables/datatables.min.css') }}">
</head>

<body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="loader">
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-ball"></div>
        </div>
    </div>
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- Loader ends-->
    <main class="page-wrapper compact-wrapper" id="pageWrapper">
        <x-panel.page-header />
        <div class="page-body-wrapper">
            <x-panel.side-bar />
            <div class="page-body">
                @yield('content')
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0">Metamorforosa © 2021. All rights reserved. </p>
                    </div>
                </div>
            </div>
        </footer>
    </main>

    <script src="{{ asset('assets/panel/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/panel/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- Feather icon js-->
    <script src="{{ asset('assets/panel/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/panel/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- Scrollbar js-->
    <script src="{{ asset('assets/panel/js/scrollbar/simplebar.js') }}"></script>
    <script src="{{ asset('assets/panel/js/scrollbar/custom.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('assets/panel/js/config.js') }}"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset('assets/panel/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('assets/panel/js/chart/knob/knob.min.js') }}"></script>
    <script src="{{ asset('assets/panel/js/chart/knob/knob-chart.js') }}"></script>
    <script src="{{ asset('assets/panel/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('assets/panel/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('assets/panel/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/panel/js/dashboard/default.js') }}"></script>
    <script src="{{ asset('assets/panel/js/notify/index.js') }}"></script>
    <script src="{{ asset('assets/panel/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('assets/panel/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/panel/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
    <script src="{{ asset('assets/panel/js/photoswipe/photoswipe.min.js') }}"></script>
    <script src="{{ asset('assets/panel/js/photoswipe/photoswipe-ui-default.min.js') }}"></script>
    <script src="{{ asset('assets/panel/js/photoswipe/photoswipe.js') }}"></script>
    <script src="{{ asset('assets/panel/js/typeahead/handlebars.js') }}"></script>
    <script src="{{ asset('assets/panel/js/typeahead/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('assets/panel/js/typeahead/typeahead.custom.js') }}"></script>
    <script src="{{ asset('assets/panel/js/typeahead-search/handlebars.js') }}"></script>
    <script src="{{ asset('assets/panel/js/typeahead-search/typeahead-custom.js') }}"></script>
    <script src="{{ asset('assets/panel/js/height-equal.js') }}"></script>
    <script src="{{ asset('assets/panel/js/script.js') }}"></script>
    <script src="{{ asset('assets/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/fullcalendar-6.1.15/dist/index.global.min.js') }}"></script>

    @yield('scripts')
</body>

</html>
