<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/landingpage/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landingpage/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landingpage/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landingpage/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landingpage/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landingpage/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landingpage/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landingpage/css/style.css') }}">

    <title>{{ env('APP_NAME') }}</title>
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="100">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav dark js-site-navbar mb-5 site-navbar-target">
        <x-landingpage.navbar />
    </nav>

    @yield('home')

    <div class="site-footer">
        <x-landingpage.footer />
    </div> <!-- /.site-footer -->

    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <script src="{{ asset('assets/landingpage/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/landingpage/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('assets/landingpage/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/landingpage/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/landingpage/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/landingpage/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('assets/landingpage/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('assets/landingpage/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/landingpage/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('assets/landingpage/js/aos.js') }}"></script>
    <script src="{{ asset('assets/landingpage/js/custom.js') }}"></script>

    @yield('scripts')
</body>

</html>
