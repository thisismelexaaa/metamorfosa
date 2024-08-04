<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="" />

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


    <div class="untree_co-hero pb-0" id="home-section">
        @yield('home')
    </div> <!-- /.untree_co-hero -->

    <div class="untree_co-section">
        @yield('co-home')
    </div> <!-- /.untree_co-section -->


    <div class="untree_co-section" id="features-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-4">
                    <span class="caption" data-aos="fade-up" data-aos-delay="0">Digital Services</span>
                    <h3 class="heading mb-4" data-aos="fade-up" data-aos-delay="100">A complete solution for your
                        business website.</h3>
                    <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts.</p>

                        <ul class="list-unstyled ul-check primary">
                            <li>There live the blind texts</li>
                            <li>Far far away behind the word</li>
                        </ul>
                    </div> <!-- /.mb-4 -->
                </div>
                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="400">
                    <a href="https://vimeo.com/342333493" class="btn-video" data-fancybox>

                        <span class="wrap-icon-play">
                            <svg class="bi bi-play-fill" width="1em" height="1em" viewBox="0 0 16 16"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.596 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                            </svg>
                        </span>
                        <img src="{{ asset('../assets/landingpage/images/dashboard.jpg') }}" alt="Image"
                            class="img-fluid img-shadow">
                    </a>
                </div> <!-- /.col-md-4 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.untree_co-section -->

    <div class="untree_co-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="untree_co-testimonial d-flex">

                            <div class="text">
                                <div class="author d-flex mb-3">
                                    <div class="pic mr-3">
                                        <img src="{{ asset('../assets/landingpage/images/person_1.jpg') }}"
                                            alt="Image" class="img-fluid">
                                    </div>
                                    <div>
                                        <strong class="d-block font-weight-bold h5 mb-0">Cameron Fisher</strong><span
                                            class="d-block">Facebook, Product Lead</span>
                                    </div>

                                </div>
                                <blockquote>
                                    &ldquo;Separated they <span class="highlight">live in Bookmarksgrove right at the
                                        coast of the Semantics</span>, a large language ocean. A small river named Duden
                                    flows by their place and supplies it with the necessary regelialia. &rdquo;
                                </blockquote>

                            </div>
                        </div> <!-- /.untree_co-testimonial -->
                    </div> <!-- /.mb-4 -->
                </div>
                <div class="col-lg-6">
                    <div class="mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="untree_co-testimonial d-flex">

                            <div class="text">
                                <div class="author d-flex mb-3">
                                    <div class="pic mr-3">
                                        <img src="{{ asset('../assets/landingpage/images/person_2.jpg') }}"
                                            alt="Image" class="img-fluid">
                                    </div>
                                    <div>
                                        <strong class="d-block font-weight-bold h5 mb-0">Jenny Wilson</strong><span
                                            class="d-block">Facebook, Product Lead</span>
                                    </div>

                                </div>
                                <blockquote>
                                    &ldquo;Separated they <span class="highlight">live in Bookmarksgrove right at the
                                        coast of the Semantics</span>, a large language ocean. A small river named Duden
                                    flows by their place and supplies it with the necessary regelialia. &rdquo;
                                </blockquote>

                            </div>
                        </div> <!-- /.untree_co-testimonial -->
                    </div> <!-- /.mb-4 -->
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section bg-light">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5 order-lg-2 js-custom-dots">

                    <a href="#" class="service link horizontal d-flex active" data-aos="fade-left"
                        data-aos-delay="0">
                        <div class="service-icon color-1 mb-4">
                            <svg class="bi bi-app-indicator" width="1em" height="1em" viewBox="0 0 16 16"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z" />
                                <path d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            </svg>
                        </div> <!-- /.icon -->
                        <div class="service-contents">
                            <h3>Built for Developers</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.
                            </p>
                        </div> <!-- /.service-contents-->
                    </a> <!-- /.service -->

                    <a href="#" class="service link horizontal d-flex" data-aos="fade-left"
                        data-aos-delay="100">
                        <div class="service-icon color-2 mb-4">
                            <svg class="bi bi-arrow-repeat" width="1em" height="1em" viewBox="0 0 16 16"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M2.854 7.146a.5.5 0 0 0-.708 0l-2 2a.5.5 0 1 0 .708.708L2.5 8.207l1.646 1.647a.5.5 0 0 0 .708-.708l-2-2zm13-1a.5.5 0 0 0-.708 0L13.5 7.793l-1.646-1.647a.5.5 0 0 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0 0-.708z" />
                                <path fill-rule="evenodd"
                                    d="M8 3a4.995 4.995 0 0 0-4.192 2.273.5.5 0 0 1-.837-.546A6 6 0 0 1 14 8a.5.5 0 0 1-1.001 0 5 5 0 0 0-5-5zM2.5 7.5A.5.5 0 0 1 3 8a5 5 0 0 0 9.192 2.727.5.5 0 1 1 .837.546A6 6 0 0 1 2 8a.5.5 0 0 1 .501-.5z" />
                            </svg>
                        </div> <!-- /.icon -->
                        <div class="service-contents">
                            <h3>Modern Design</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.
                            </p>
                        </div> <!-- /.service-contents-->
                    </a> <!-- /.service -->


                    <a href="#" class="service link horizontal d-flex" data-aos="fade-left"
                        data-aos-delay="200">
                        <div class="service-icon color-3 mb-4">
                            <svg class="bi bi-briefcase" width="1em" height="1em" viewBox="0 0 16 16"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-6h-1v6a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-6H0v6z" />
                                <path fill-rule="evenodd"
                                    d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5v2.384l-7.614 2.03a1.5 1.5 0 0 1-.772 0L0 6.884V4.5zM1.5 4a.5.5 0 0 0-.5.5v1.616l6.871 1.832a.5.5 0 0 0 .258 0L15 6.116V4.5a.5.5 0 0 0-.5-.5h-13zM5 2.5A1.5 1.5 0 0 1 6.5 1h3A1.5 1.5 0 0 1 11 2.5V3h-1v-.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5V3H5v-.5z" />
                            </svg>
                        </div> <!-- /.icon -->
                        <div class="service-contents">
                            <h3>Build Stunning Websites</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.
                            </p>
                        </div> <!-- /.service-contents-->
                    </a> <!-- /.service -->


                </div>
                <div class="col-lg-7">
                    <div class="img-shadow">
                        <div class="owl-single no-dots owl-carousel">
                            <div class="item">
                                <span class="number">1/3</span>
                                <img src="{{ asset('../assets/landingpage/images/dashboard.jpg') }}" alt="Image"
                                    class="img-fluid">
                            </div>
                            <div class="item">
                                <span class="number">2/3</span>
                                <img src="{{ asset('../assets/landingpage/images/dashboard.jpg') }}" alt="Image"
                                    class="img-fluid">
                            </div>
                            <div class="item">
                                <span class="number">3/3</span>
                                <img src="{{ asset('../assets/landingpage/images/dashboard.jpg') }}" alt="Image"
                                    class="img-fluid">
                            </div>

                        </div>

                    </div>

                </div> <!-- /.col-md-4 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.untree_co-section -->

    <div class="untree_co-section">
        <div class="container">

            <div class="row">
                <div class="col-12 mb-5" data-aos="fade-up">
                    <span class="caption">Features</span>
                    <h2 class="heading">More Features</h2>
                </div>

                <div class="col-md-6 mb-4 mb-lg-0 col-lg-3" data-aos="fade-up" data-aos-delay="0">
                    <div class="service">
                        <div class="service-icon color-1 mb-4">
                            <svg class="bi bi-app-indicator" width="1em" height="1em" viewBox="0 0 16 16"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z" />
                                <path d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            </svg>
                        </div> <!-- /.icon -->
                        <div class="service-contents">
                            <h3>Built for Developers</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                        </div> <!-- /.service-contents-->
                    </div> <!-- /.service -->
                </div> <!-- /.col-lg-3 -->

                <div class="col-md-6 mb-4 mb-lg-0 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="service">
                        <div class="service-icon color-2 mb-4">
                            <svg class="bi bi-arrow-repeat" width="1em" height="1em" viewBox="0 0 16 16"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M2.854 7.146a.5.5 0 0 0-.708 0l-2 2a.5.5 0 1 0 .708.708L2.5 8.207l1.646 1.647a.5.5 0 0 0 .708-.708l-2-2zm13-1a.5.5 0 0 0-.708 0L13.5 7.793l-1.646-1.647a.5.5 0 0 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0 0-.708z" />
                                <path fill-rule="evenodd"
                                    d="M8 3a4.995 4.995 0 0 0-4.192 2.273.5.5 0 0 1-.837-.546A6 6 0 0 1 14 8a.5.5 0 0 1-1.001 0 5 5 0 0 0-5-5zM2.5 7.5A.5.5 0 0 1 3 8a5 5 0 0 0 9.192 2.727.5.5 0 1 1 .837.546A6 6 0 0 1 2 8a.5.5 0 0 1 .501-.5z" />
                            </svg>
                        </div> <!-- /.icon -->
                        <div class="service-contents">
                            <h3>Modern Design</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                        </div> <!-- /.service-contents-->
                    </div> <!-- /.service -->
                </div> <!-- /.col-lg-3 -->

                <div class="col-md-6 mb-4 mb-lg-0 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="service">
                        <div class="service-icon color-3 mb-4">
                            <svg class="bi bi-briefcase" width="1em" height="1em" viewBox="0 0 16 16"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-6h-1v6a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-6H0v6z" />
                                <path fill-rule="evenodd"
                                    d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5v2.384l-7.614 2.03a1.5 1.5 0 0 1-.772 0L0 6.884V4.5zM1.5 4a.5.5 0 0 0-.5.5v1.616l6.871 1.832a.5.5 0 0 0 .258 0L15 6.116V4.5a.5.5 0 0 0-.5-.5h-13zM5 2.5A1.5 1.5 0 0 1 6.5 1h3A1.5 1.5 0 0 1 11 2.5V3h-1v-.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5V3H5v-.5z" />
                            </svg>
                        </div> <!-- /.icon -->
                        <div class="service-contents">
                            <h3>Build Stunning Websites</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                        </div> <!-- /.service-contents-->
                    </div> <!-- /.service -->
                </div> <!-- /.col-lg-3 -->

                <div class="col-md-6 mb-4 mb-lg-0 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="service">
                        <div class="service-icon color-4 mb-4">
                            <svg class="bi bi-collection" width="1em" height="1em" viewBox="0 0 16 16"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M14.5 13.5h-13A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5zm-13 1A1.5 1.5 0 0 1 0 13V6a1.5 1.5 0 0 1 1.5-1.5h13A1.5 1.5 0 0 1 16 6v7a1.5 1.5 0 0 1-1.5 1.5h-13zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z" />
                            </svg>
                        </div> <!-- /.icon -->
                        <div class="service-contents">
                            <h3>Bring Ideas to Life</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                        </div> <!-- /.service-contents-->
                    </div> <!-- /.service -->
                </div> <!-- /.col-lg-3 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.untree_co-section -->

    <div class="untree_co-section bg-light" id="pricing-section">
        <div class="container">

            <div class="row pricing-title">
                <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="0">
                    <span class="caption">Plans</span>
                    <h2 class="heading">Pricing</h2>
                    <p>Pricing for everyone. Choose your plan now!</p>
                </div>
            </div> <!-- /.row -->

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="pricing">
                                <div class="body">
                                    <div class="price">
                                        <span class="price"><sup>$</sup><span>0</span></span>
                                        <span class="d-block plan mb-4">Free</span>
                                    </div>
                                    <ul class="list-unstyled ul-check primary mb-5">
                                        <li>There live the blind texts</li>
                                        <li>Far far away behind the word</li>
                                        <li>Far from the countries Vokalia and Consonantia</li>
                                    </ul>
                                    <p class="text-center mb-0"><a href="#" class="btn btn-outline-primary">Get
                                            Started</a></p>
                                </div>
                            </div> <!-- /.pricing -->
                        </div> <!-- /.col-lg-4 -->

                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="pricing active">
                                <div class="body">
                                    <div class="price">
                                        <span class="price"><sup>$</sup><span>19.99</span></span>
                                        <span class="d-block plan mb-4">Standard</span>
                                    </div>
                                    <ul class="list-unstyled ul-check primary mb-5">
                                        <li>There live the blind texts</li>
                                        <li>Far far away behind the word</li>
                                        <li>Far from the countries Vokalia and Consonantia</li>
                                    </ul>
                                    <p class="text-center mb-0"><a href="#" class="btn btn-primary">Get
                                            Started</a></p>
                                </div>
                            </div> <!-- /.pricing -->

                        </div> <!-- /.col-lg-4 -->

                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="pricing">

                                <div class="body">
                                    <div class="price">
                                        <span class="price"><sup>$</sup><span>79.99</span></span>
                                        <span class="d-block plan mb-4">Premium</span>
                                    </div>
                                    <ul class="list-unstyled ul-check primary mb-5">
                                        <li>There live the blind texts</li>
                                        <li>Far far away behind the word</li>
                                        <li>Far from the countries Vokalia and Consonantia</li>
                                    </ul>
                                    <p class="text-center mb-0"><a href="#" class="btn btn-outline-primary">Get
                                            Started</a></p>
                                </div>
                            </div> <!-- /.pricing -->
                        </div> <!-- /.col-lg-4 -->
                    </div> <!-- /.row -->
                </div> <!-- /.col-lg-8 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.untree_co-section -->

    <div class="untree_co-section" id="testimonials-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-12 text-center">
                    <span class="caption">Testimonials</span>
                    <h2 class="heading">What Our Client Says..</h2>

                    <div>
                        <a href="#" class="js-custom-prev-v2 cusotm-slider-nav custom-prev"><span><svg
                                    class="bi bi-arrow-left" width="1em" height="1em" viewBox="0 0 16 16"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.854 4.646a.5.5 0 0 1 0 .708L3.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z" />
                                    <path fill-rule="evenodd"
                                        d="M2.5 8a.5.5 0 0 1 .5-.5h10.5a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                                </svg></span></a>
                        <a href="#" class="js-custom-next-v2 cusotm-slider-nav custom-next"><span>
                                <svg class="bi bi-arrow-right" width="1em" height="1em" viewBox="0 0 16 16"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L12.793 8l-2.647-2.646a.5.5 0 0 1 0-.708z" />
                                    <path fill-rule="evenodd"
                                        d="M2 8a.5.5 0 0 1 .5-.5H13a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8z" />
                                </svg></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">

                <div class="col-lg-12" data-aos="fade" data-aos-delay="200">
                    <div class="owl-2-slider owl-carousel">
                        <div class="item">
                            <div class="untree_co-testimonial d-flex">

                                <div class="text">
                                    <blockquote>
                                        &ldquo;Separated they <span class="highlight">live in Bookmarksgrove right at
                                            the coast of the Semantics</span>, a large language ocean. A small river
                                        named Duden flows by their place and supplies it with the necessary regelialia.
                                        &rdquo;
                                    </blockquote>
                                    <div class="author d-flex">
                                        <div class="pic mr-3">
                                            <img src="{{ asset('../assets/landingpage/images/person_1.jpg') }}"
                                                alt="Image" class="img-fluid">
                                        </div>
                                        <div>
                                            <strong class="d-block">Cameron Fisher</strong><span
                                                class="d-block">Facebook, Product Lead</span>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- /.untree_co-testimonial -->
                        </div>

                        <div class="item">
                            <div class="untree_co-testimonial d-flex">

                                <div class="text">
                                    <blockquote>
                                        &ldquo;Separated they <span class="highlight">live in Bookmarksgrove right at
                                            the coast of the Semantics</span>, a large language ocean. A small river
                                        named Duden flows by their place and supplies it with the necessary regelialia.
                                        &rdquo;
                                    </blockquote>
                                    <div class="author d-flex">
                                        <div class="pic mr-3">
                                            <img src="{{ asset('../assets/landingpage/images/person_2.jpg') }}"
                                                alt="Image" class="img-fluid">
                                        </div>
                                        <div>
                                            <strong class="d-block">Jenny Wilson</strong><span
                                                class="d-block">Facebook, Product Lead</span>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- /.untree_co-testimonial -->
                        </div>

                        <div class="item">
                            <div class="untree_co-testimonial d-flex">

                                <div class="text">
                                    <blockquote>
                                        &ldquo;Separated they <span class="highlight">live in Bookmarksgrove right at
                                            the coast of the Semantics</span>, a large language ocean. A small river
                                        named Duden flows by their place and supplies it with the necessary regelialia.
                                        &rdquo;
                                    </blockquote>
                                    <div class="author d-flex">
                                        <div class="pic mr-3">
                                            <img src="{{ asset('../assets/landingpage/images/person_3.jpg') }}"
                                                alt="Image" class="img-fluid">
                                        </div>
                                        <div>
                                            <strong class="d-block">James Anderson</strong><span
                                                class="d-block">Facebook, Product Lead</span>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- /.untree_co-testimonial -->
                        </div>
                    </div>
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.untree_co-section -->

    <div class="untree_co-section" id="about-section">
        <div class="container">
            <div class="row justify-content-between mb-5">
                <div class="col-lg-8 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('../assets/landingpage/images/undraw_getting_coffee_re_f2do.svg') }}"
                        alt="Image" class="img-fluid">
                </div> <!-- /.col-lg-6 -->
                <div class="col-lg-4">
                    <div class="mb-4" data-aos="fade-up" data-aos-delay="0">
                        <span class="caption">About</span>
                        <h2 class="heading">The Company</h2>
                    </div>
                    <div class="mb-4" data-aos="fade-up" data-aos-delay="100">
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts. Separated they live in Bookmarksgrove right at the coast</p>
                        <p>Separated they <span class="highlight">live in Bookmarksgrove right at the coast of the
                                Semantics</span>, a large language ocean. A small river named Duden flows by their place
                            and supplies it with the necessary regelialia.</p>
                    </div>

                    <ul class="list-unstyled ul-check primary mb-4" data-aos="fade-up" data-aos-delay="200">
                        <li>There live the blind texts</li>
                        <li>Far far away behind the word</li>
                        <li>Their place and supplies</li>
                    </ul>


                    <div class="row count-numbers">
                        <div class="col-6 col-lg-6" data-aos="fade-up" data-aos-delay="0">
                            <span class="counter d-block"><span data-number="24">0</span><span>M</span></span>
                            <span class="caption-2">Members</span>
                        </div>
                        <div class="col-6 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <span class="counter d-block"><span data-number="121">0</span><span></span></span>
                            <span class="caption-2">Team</span>
                        </div>
                    </div>
                </div> <!-- /.col-lg-6 -->
            </div> <!-- /.row -->

            <div class="row pt-5">
                <div class="col-12 mb-5" data-aos="fade-up">
                    <span class="caption">Team</span>
                    <h2 class="heading">The Team</h2>
                </div>
                <div class="col-6 col-lg-4" data-aos="fade-up" data-aos-delayt="100">
                    <img src="{{ asset('../assets/landingpage/images/person_1.jpg') }}" alt="Image"
                        class="img-fluid mb-3 w-50 rounded-circle">
                    <h3 class="h5 font-weight-bold">Job Smith</h3>
                    <p>Separated they <span class="highlight">live in Bookmarksgrove right at the coast of the
                            Semantics</span>, a large language ocean. A small river named Duden flows by their place and
                        supplies it with the necessary regelialia.</p>
                </div>
                <div class="col-6 col-lg-4" data-aos="fade-up" data-aos-delayt="200">
                    <img src="{{ asset('../assets/landingpage/images/person_2.jpg') }}" alt="Image"
                        class="img-fluid mb-3 w-50 rounded-circle">
                    <h3 class="h5 font-weight-bold">Jenny Wilson</h3>
                    <p>Separated they <span class="highlight">live in Bookmarksgrove right at the coast of the
                            Semantics</span>, a large language ocean. A small river named Duden flows by their place and
                        supplies it with the necessary regelialia.</p>
                </div>
                <div class="col-6 col-lg-4" data-aos="fade-up" data-aos-delayt="300">
                    <img src="{{ asset('../assets/landingpage/images/person_3.jpg') }}" alt="Image"
                        class="img-fluid mb-3 w-50 rounded-circle">
                    <h3 class="h5 font-weight-bold">Richard Cruise</h3>
                    <p>Separated they <span class="highlight">live in Bookmarksgrove right at the coast of the
                            Semantics</span>, a large language ocean. A small river named Duden flows by their place and
                        supplies it with the necessary regelialia.</p>
                </div>
            </div>
        </div> <!-- /.container -->
    </div> <!-- /.untree_co-section -->

    <div class="untree_co-section bg-light">
        <div class="container">

            <div class="row mb-5">
                <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="0">
                    <span class="caption">Blog</span>
                    <h2 class="heading">Recent Blog Posts</h2>
                    <p>Far from the countries Vokalia and Consonantia</p>
                </div>
            </div> <!-- /.row -->

            <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="news-item">
                        <div class="vcard d-flex align-items-center mb-4">
                            <div class="img-wrap">
                                <img src="{{ asset('../assets/landingpage/images/person_1.jp') }}g" alt="Image"
                                    class="img-fluid">
                            </div>

                            <div class="post-meta">
                                <strong>Posted by Job</strong>
                                <span>Jun 14, 2020</span>
                            </div>
                        </div>
                        <div class="news-contents mb-4">

                            <h3><a href="#">Managing the risks of deploying software</a></h3>
                            <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
                                language ocean. A small river named Duden flows by their place and supplies it with the
                                necessary regelialia.</p>
                            <span class="post-meta-2">Digital Service, 4 min read</span>
                        </div>
                        <p class="mb-0"><a href="#" class="read-more-arrow">
                                <svg class="bi bi-arrow-right" width="1em" height="1em" viewBox="0 0 16 16"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L12.793 8l-2.647-2.646a.5.5 0 0 1 0-.708z" />
                                    <path fill-rule="evenodd"
                                        d="M2 8a.5.5 0 0 1 .5-.5H13a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8z" />
                                </svg>
                            </a></p>
                    </div> <!-- /.news-item -->
                </div>


                <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="news-item">
                        <div class="vcard d-flex align-items-center mb-4">
                            <div class="img-wrap">
                                <img src="{{ asset('../assets/landingpage/images/person_2.jpg') }}" alt="Image"
                                    class="img-fluid">
                            </div>

                            <div class="post-meta">
                                <strong>Posted by Jenny</strong>
                                <span>Jun 14, 2020</span>
                            </div>
                        </div>
                        <div class="news-contents mb-4">
                            <h3><a href="#">Using an integration broker with SaaS</a></h3>
                            <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
                                language ocean. A small river named Duden flows by their place and supplies it with the
                                necessary regelialia.</p>
                            <span class="post-meta-2">Digital Service, 4 min read</span>
                        </div>
                        <p class="mb-0"><a href="#" class="read-more-arrow">
                                <svg class="bi bi-arrow-right" width="1em" height="1em" viewBox="0 0 16 16"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L12.793 8l-2.647-2.646a.5.5 0 0 1 0-.708z" />
                                    <path fill-rule="evenodd"
                                        d="M2 8a.5.5 0 0 1 .5-.5H13a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8z" />
                                </svg>
                            </a></p>
                    </div> <!-- /.news-item -->
                </div>


                <div class="col-md-12 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="news-item">
                        <div class="vcard d-flex align-items-center mb-4">
                            <div class="img-wrap">
                                <img src="{{ asset('../assets/landingpage/images/person_3.jpg') }}" alt="Image"
                                    class="img-fluid">
                            </div>

                            <div class="post-meta">
                                <strong>Posted by Matt</strong>
                                <span>Jun 14, 2020</span>
                            </div>
                        </div>
                        <div class="news-contents mb-4">
                            <h3><a href="#">Would a cloud outage cripple your business?</a></h3>
                            <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
                                language ocean. A small river named Duden flows by their place and supplies it with the
                                necessary regelialia.</p>

                            <span class="post-meta-2">Digital Service, 4 min read</span>
                        </div>
                        <p class="mb-0"><a href="#" class="read-more-arrow">
                                <svg class="bi bi-arrow-right" width="1em" height="1em" viewBox="0 0 16 16"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L12.793 8l-2.647-2.646a.5.5 0 0 1 0-.708z" />
                                    <path fill-rule="evenodd"
                                        d="M2 8a.5.5 0 0 1 .5-.5H13a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8z" />
                                </svg>
                            </a></p>
                    </div> <!-- /.news-item -->
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section" id="contact-section">
        <div class="container">
            <div class="row mb-5" data-aos="fade-up" data-aos-delay="0">
                <div class="col-12 text-center">
                    <span class="caption">Contact</span>
                    <h2 class="heading">Get In Touch</h2>
                    <p>Far from the countries Vokalia and Consonantia</p>
                </div>
            </div> <!-- /.row -->
            <div class="row">

                <div class="col-lg-7">


                    <form class="contact-form" data-aos="fade-up" data-aos-delay="100">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="" for="fname">First name</label>
                                    <input type="text" class="form-control" id="fname">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="" for="lname">Last name</label>
                                    <input type="text" class="form-control" id="lname">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="" for="email">Email address</label>
                            <input type="email" class="form-control" id="email">
                        </div>

                        <div class="form-group">
                            <label class="" for="message">Message</label>
                            <textarea name="" class="form-control" id="message" cols="30" rows="5"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div> <!-- /.col-lg-7 -->
                <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
                    <div class="quick-contact">
                        <h3 class="h5 mb-4">Contact Info</h3>
                        <address class="text-black d-flex"><span class="mt-1 icon-room mr-2"></span><span>43 Raymouth
                                Rd. Baltemoer, London 3910</span></address>
                        <ul class="list-unstyled ul-links mb-4">
                            <li><a href="tel://11234567890" class="d-flex"><span
                                        class="mt-1 icon-phone mr-2"></span><span>+1(123)-456-7890</span></a></li>

                            <li><a href="tel://11234567890" class="d-flex"><span
                                        class="mt-1 icon-phone mr-2"></span><span>+1(123)-456-7890</span></a></li>

                            <li><a href="mailto:info@mydomain.com" class="d-flex"><span
                                        class="mt-1 icon-envelope mr-2"></span><span>info@mydomain.com</span></a></li>

                            <li><a href="https://untree.co/" target="_blank" class="d-flex"><span
                                        class="mt-1 icon-globe mr-2"></span><span>https://untree.co/</span></a></li>
                        </ul>
                    </div>
                </div> <!-- /.col-lg-4 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.untree_co-section bg-light -->


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

</body>

</html>
