@extends('landingpage.layouts.app')

@section('home')
    <style>
        .card {
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .card .pic {
            width: 120px;
            height: 120px;
            overflow: hidden;
            border-radius: 50%;
            border: 3px solid #f1f1f1;
        }

        .card .text {
            margin-top: 15px;
        }

        .blockquote {
            font-style: italic;
            color: #666;
            border-left: 5px solid #ddd;
            padding-left: 10px;
        }

        .blockquote p {
            margin-bottom: 0;
        }

        /* News Feed */
        .news-feed {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .news-item {
            display: flex;
            align-items: center;
            gap: 20px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .news-item:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .news-image {
            width: 150px;
            height: auto;
            border-radius: 8px;
            object-fit: cover;
        }

        .news-content {
            flex: 1;
        }

        .news-date {
            font-size: 14px;
            color: #888;
            margin-bottom: 10px;
        }

        .news-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .news-description {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Detail View */
        .detail-view {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            text-align: center;
        }

        #detail-image {
            max-width: 100%;
            border-radius: 8px;
        }

        .carousel-item-content {
            text-align: center;
        }

        .carousel-item-content img {
            max-width: 100%;
            height: auto;
        }

        .partner-name {
            display: block;
            margin-top: 10px;
            font-size: 16px;
            font-weight: bold;
        }
    </style>

    <div class="untree_co-hero pb-0" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="dots"></div>
                    <div class="row justify-content-center">
                        <div class="col-md-7 text-center mb-5">
                            <h1 class="heading" data-aos="fade-up" data-aos-delay="0" style="font-size: 3rem;">Selamat Datang
                                di<span class="d-block"><a href="/">Metamorfosa</a></span>
                            </h1>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <div class="intro">
                                <div class="excerpt"data-aos="fade-up" data-aos-delay="100">
                                    {{-- <span class="caption">Selamat Datang</span> --}}
                                    <h2 class="font-weight-bold">Metamorfosa Community Learning!</h2>
                                    <p>
                                        Tempat inovatif untuk mencapai pertumbuhan dan perubahan positif dalam
                                        pembelajaran masyarakat.
                                    </p>
                                </div> <!-- /.excerpt -->
                                <p data-aos="fade-up" data-aos-delay="200">
                                    <a href="#about-section" class="btn btn-primary smoothscroll mr-1">Tentang Kami</a>
                                    <a href="#layanan-section" class="btn btn-outline-primary smoothscroll">Layanan</a>
                                </p>
                            </div>
                        </div> <!-- /.col-lg-5 -->
                        <div class="col-lg-8">
                            <div class="illustration">
                                <img src="{{ asset('../assets/landingpage/images/graphs-statistics_outline.svg') }}"
                                    alt="Image" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.untree_co-hero -->

    <div class="untree_co-section" id="about-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="0">
                    <h2 class="heading">Metamorfosa Community Learning!</h2>
                </div>
            </div> <!-- /.row -->

            <div class="row">
                <div class="col-lg mb-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="service horizontal d-flex flex-column">
                        <div class="service-contents text-center">
                            <p>Metamorfosa Community Learning berkomitmen untuk menciptakan lingkungan belajar kolaboratif
                                yang mengakomodasi setiap individu mengembangkan potensinya dengan cara yang unik. Melalui
                                program kami, peserta belajar dengan bimbingan mentor berpengalaman yang memahami
                                kebutuhan dan aspirasi mereka. Kami mengadakan berbagai kegiatan pengembangan diri yang
                                dirancang untuk meningkatkan
                                kreativitas, kolaborasi, serta meningkatkan pemahaman terhadap diri sendiri dan lingkungan
                                sekitar. Kolaborasi adalah inti dari semua yang kami lakukan, memungkinkan pertukaran ide
                                yang
                                mendalam dan membantu mewujudkan visi bersama untuk masa depan yang lebih baik. Kami bangga
                                menjadi rumah bagi komunitas yang beragam, di mana setiap suara dihargai dan
                                dihormati.</p>

                            <p> <b>Bergabunglah dengan kami di Metamorfosa Community Learning</b> dan bersama mengukir
                                jejak perubahan diri sendiri dan organisasi. Kami yakin bahwa setiap langkah kecil membawa
                                kita lebih dekat kepada perubahan besar yang akan membawa manfaat bagi banyak orang. Selamat
                                belajar, berkembang, dan bermetamorfosa bersama kami di Metamorfosa Community Learning!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /.row -->

    </div>

    <div class="untree_co-section" id="visimisi-section">
        <div class="container">

            <div class="row mb-5">
                <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="0">
                    {{-- <span class="caption">Features</span> --}}
                    <h2 class="heading">Visi & Misi</h2>
                </div>
            </div> <!-- /.row -->

            <div class="row">
                <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="service horizontal d-flex">
                        <div class="service-icon color-1 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                <path
                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                            </svg>
                        </div>
                        <!-- /.icon -->
                        <div class="service-contents">
                            <h3>Visi</h3>
                            <p>Visi kami adalah menjadi pionir dalam revolusi pendidikan, dengan fokus utama pada
                                keterlibatan, inklusivitas, dan transformasi. </p>
                            {{-- <p><a href="#" class="read-more">Learn More</a></p> --}}
                        </div> <!-- /.service-contents-->
                    </div> <!-- /.service -->
                </div>

                <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="service horizontal d-flex">
                        <div class="service-icon color-2 mb-4">
                            {{-- <svg class="bi bi-arrow-repeat" width="1em" height="1em" viewBox="0 0 16 16"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M2.854 7.146a.5.5 0 0 0-.708 0l-2 2a.5.5 0 1 0 .708.708L2.5 8.207l1.646 1.647a.5.5 0 0 0 .708-.708l-2-2zm13-1a.5.5 0 0 0-.708 0L13.5 7.793l-1.646-1.647a.5.5 0 0 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0 0-.708z" />
                                <path fill-rule="evenodd"
                                    d="M8 3a4.995 4.995 0 0 0-4.192 2.273.5.5 0 0 1-.837-.546A6 6 0 0 1 14 8a.5.5 0 0 1-1.001 0 5 5 0 0 0-5-5zM2.5 7.5A.5.5 0 0 1 3 8a5 5 0 0 0 9.192 2.727.5.5 0 1 1 .837.546A6 6 0 0 1 2 8a.5.5 0 0 1 .501-.5z" />
                            </svg> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-bullseye" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                <path d="M8 13A5 5 0 1 1 8 3a5 5 0 0 1 0 10m0 1A6 6 0 1 0 8 2a6 6 0 0 0 0 12" />
                                <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8" />
                                <path d="M9.5 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                            </svg>
                        </div> <!-- /.icon -->
                        <div class="service-contents">
                            <h3>Misi</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts.</p>
                            {{-- <p><a href="#" class="read-more">Learn More</a></p> --}}
                        </div> <!-- /.service-contents-->
                    </div> <!-- /.service -->
                </div>
            </div> <!-- /.row -->

        </div> <!-- /.container -->
    </div>

    {{-- TIM KAMI SECTION --}}
    <div class="untree_co-section" id="team-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="0">
                    <h2 class="heading">Tim Kami</h2>
                </div>
            </div>

            <!-- Founder Section -->
            <div class="row mb-5">
                <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="0">
                    <h3 class="subheading">Founder</h3>
                </div>
                <div class="col-lg-12">
                    <div class="mb-4 text-center" data-aos="fade-up" data-aos-delay="300">
                        <div class="untree_co-testimonial d-flex flex-column align-items-center">
                            <div class="pic mb-3">
                                <img src="{{ asset('../assets/landingpage/images/person_1.jpg') }}" alt="Image"
                                    class="img-fluid" style="max-width: 150px; border-radius: 50%;">
                            </div>
                            <div class="text">
                                <strong class="d-block font-weight-bold h5 mb-1">Citra Sabrina, M.Psi., Psikolog</strong>
                                <span class="d-block mb-3">Founder Metamorfosa</span>
                                <blockquote class="text-center">
                                    &ldquo;Separated they <span class="highlight">live in Bookmarksgrove right at the coast
                                        of the Semantics</span>, a large language ocean. A small river named Duden flows by
                                    their place and supplies it with the necessary regelialia. &rdquo;
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Co-Founders Section -->
            <div class="row mb-5">
                <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="0">
                    <h3 class="subheading">Co-Founder</h3>
                </div>
                <div class="col-lg-4">
                    <div class="mb-4 text-center" data-aos="fade-up" data-aos-delay="300">
                        <div class="untree_co-testimonial d-flex flex-column align-items-center">
                            <div class="pic mb-3">
                                <img src="{{ asset('../assets/landingpage/images/person_1.jpg') }}" alt="Image"
                                    class="img-fluid" style="max-width: 150px; border-radius: 50%;">
                            </div>
                            <div class="text">
                                <strong class="d-block font-weight-bold h5 mb-1">Micki Watulandi, S.E., M.M.,
                                    C.P.S</strong>
                                <span class="d-block mb-3">Co-Founder Metamorfosa</span>
                                <blockquote class="text-center">
                                    &ldquo;Separated they <span class="highlight">live in Bookmarksgrove right at the coast
                                        of the Semantics</span>, a large language ocean. A small river named Duden flows by
                                    their place and supplies it with the necessary regelialia. &rdquo;
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mb-4 text-center" data-aos="fade-up" data-aos-delay="300">
                        <div class="untree_co-testimonial d-flex flex-column align-items-center">
                            <div class="pic mb-3">
                                <img src="{{ asset('../assets/landingpage/images/person_1.jpg') }}" alt="Image"
                                    class="img-fluid" style="max-width: 150px; border-radius: 50%;">
                            </div>
                            <div class="text">
                                <strong class="d-block font-weight-bold h5 mb-1">Ervi Amaliyah, S.Pd</strong>
                                <span class="d-block mb-3">Co-Founder Metamorfosa</span>
                                <blockquote class="text-center">
                                    &ldquo;Separated they <span class="highlight">live in Bookmarksgrove right at the coast
                                        of the Semantics</span>, a large language ocean. A small river named Duden flows by
                                    their place and supplies it with the necessary regelialia. &rdquo;
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mb-4 text-center" data-aos="fade-up" data-aos-delay="300">
                        <div class="untree_co-testimonial d-flex flex-column align-items-center">
                            <div class="pic mb-3">
                                <img src="{{ asset('../assets/landingpage/images/person_1.jpg') }}" alt="Image"
                                    class="img-fluid" style="max-width: 150px; border-radius: 50%;">
                            </div>
                            <div class="text">
                                <strong class="d-block font-weight-bold h5 mb-1">Dr. Widya, MKN</strong>
                                <span class="d-block mb-3">Co-Founder Metamorfosa</span>
                                <blockquote class="text-center">
                                    &ldquo;Separated they <span class="highlight">live in Bookmarksgrove right at the coast
                                        of the Semantics</span>, a large language ocean. A small river named Duden flows by
                                    their place and supplies it with the necessary regelialia. &rdquo;
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Support Teachers Section -->
            <div class="row mb-5">
                <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="0">
                    <h3 class="subheading">Support Teachers</h3>
                </div>
                <div class="col-lg-12">
                    <div class="owl-3-slider owl-carousel" data-aos="fade-up">
                        @foreach ($users as $support_teacher)
                            <div class="item">
                                <div class="card text-center border-0 shadow-md">
                                    <div class="card-body">
                                        <div class="pic mb-3 mx-auto">
                                            <img src="{{ asset('../assets/landingpage/images/person_1.jpg') }}"
                                                alt="Image" class="img-fluid"
                                                style="max-width: 120px; border-radius: 50%;">
                                        </div>
                                        <div class="text">
                                            <strong
                                                class="d-block font-weight-bold h5 mb-1">{{ $support_teacher->name }}</strong>
                                            <span class="d-block mb-3 text-muted">{{ $support_teacher->role }}</span>
                                            <blockquote class="blockquote">
                                                <p class="mb-0">"{{ $support_teacher->bio ?? 'No Bio Available' }}"</p>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- LAYANAN KAMI --}}
    <div class="untree_co-section bg-light" id="layanan-section">
        <div class="container">
            <div class="row pricing-title">
                <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="0">
                    <h2 class="heading">Layanan Kami</h2>
                    {{-- <div>
                        <a href="#" class="js-custom-prev-v3 cusotm-slider-nav custom-prev"><span><svg
                                    class="bi bi-arrow-left" width="1em" height="1em" viewBox="0 0 16 16"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.854 4.646a.5.5 0 0 1 0 .708L3.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z" />
                                    <path fill-rule="evenodd"
                                        d="M2.5 8a.5.5 0 0 1 .5-.5h10.5a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                                </svg></span></a>
                        <a href="#" class="js-custom-next-v3 cusotm-slider-nav custom-next"><span>
                                <svg class="bi bi-arrow-right" width="1em" height="1em" viewBox="0 0 16 16"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L12.793 8l-2.647-2.646a.5.5 0 0 1 0-.708z" />
                                    <path fill-rule="evenodd"
                                        d="M2 8a.5.5 0 0 1 .5-.5H13a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8z" />
                                </svg></span>
                        </a>
                    </div> --}}
                </div>
            </div> <!-- /.row -->

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="owl-3-slider owl-carousel">
                        @foreach ($layanan as $layananItem)
                            <div class="item py-5">
                                <div class="pricing active" data-aos="fade-up" data-aos-delay="100">
                                    <div class="body">
                                        <div class="price">
                                            <span class="d-block plan mb-4">{{ $layananItem->layanan }}</span>
                                        </div>
                                        <ul class="list-unstyled ul-check primary mb-5">
                                            @foreach ($layananItem->getSubLayanan->take(4) as $subLayananItem)
                                                <li>{{ $subLayananItem->sub_layanan }}</li>
                                            @endforeach
                                            @if ($layananItem->getSubLayanan->count() >= 4)
                                                <li>Dan Layanan Lainnya</li>
                                            @endif
                                        </ul>
                                        <p class="text-center mb-0">
                                            <a href="/detail-layanan" class="btn btn-outline-primary">Selengkap</a>
                                        </p>
                                    </div>
                                </div> <!-- /.pricing -->
                            </div>
                        @endforeach
                    </div>
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div>

    {{-- AKTIVITAS SELANJUTNYA --}}
    <div class="untree_co-section bg-light" id="aktivitas-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 text-center mb-5" data-aos="fade-up" data-aos-delay="0">
                    <h2 class="heading">Aktivitas Selanjutnya</h2>
                </div>
                <div class="col-lg">
                    <div class="news-feed">
                        @foreach ($news as $i => $item)
                            @if ($item->category == 2)
                                <div class="news-item" data-aos="fade-up" data-aos-delay="100">
                                    <img src="{{ asset('assets/image/news/' . $item->image) }}"
                                        alt="Thumbnail Aktivitas {{ $i }}" class="news-image">
                                    <div class="news-content">
                                        <div class="news-date">{{ $item->created_at->format('d M Y') }}</div>
                                        <h3 class="news-title">{{ $item->judul }}</h3>
                                        <p class="news-description">{!! Str::limit($item->content, 100) !!}</p>
                                        <a href="#" class="btn btn-primary view-details"
                                            data-id="{{ $i }}">Baca
                                            Selengkapnya</a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Right Side: Detail View -->
                <div class="col-lg">
                    <div class="detail-view">
                        <img src="" alt="Detail Image" class="detail-image w-100" id="detail-image"
                            class="img-fluid">
                    </div>
                </div>

            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div>

    {{-- PARTNER --}}
    <div class="container-fluid px-5" id="partner">
        <div class="row justify-content-center">
            <div class="container col-12 text-center mt-5" data-aos="fade-up" data-aos-delay="100">
                <h2 class="heading">Partner Kami</h2>
            </div>
            <div class="col-lg-12">
                <!-- Carousel untuk arah kiri -->
                <div class="partner-slider-rtl owl-carousel owl-theme">
                    @foreach ($partners as $partner)
                        @if ($partner->tipe == 1 || $partner->tipe == 2 || $partner->tipe == 3)
                            <div class="item py-3" data-aos="fade-up" data-aos-delay="100">
                                <div class="carousel-item-content">
                                    <img src="{{ asset('assets/panel/partners/' . $partner->image) }}"
                                        alt="{{ $partner->name }}" class="img-fluid">
                                    <span class="partner-name">{{ $partner->name }}</span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Carousel untuk arah kanan -->
                <div class="partner-slider owl-carousel owl-theme">
                    @foreach ($partners as $partner)
                        @if ($partner->tipe == 4 || $partner->tipe == 5)
                            <div class="item py-3" data-aos="fade-up" data-aos-delay="100">
                                <div class="carousel-item-content">
                                    <img src="{{ asset('assets/panel/partners/' . $partner->image) }}"
                                        alt="{{ $partner->name }}" class="img-fluid">
                                    <span class="partner-name">{{ $partner->name }}</span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="untree_co-section" id="klien-section">
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
                                            <strong class="d-block">Cameron Fisher</strong><span class="d-block">Facebook,
                                                Product Lead</span>
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
                                            <strong class="d-block">Jenny Wilson</strong><span class="d-block">Facebook,
                                                Product Lead</span>
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
                                            <strong class="d-block">James Anderson</strong><span class="d-block">Facebook,
                                                Product Lead</span>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- /.untree_co-testimonial -->
                        </div>
                    </div>
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> --}}

    {{-- <div class="untree_co-section" id="about-section">
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
    </div>  --}}

    {{-- <div class="untree_co-section bg-light">
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
    </div> --}}

    {{-- <div class="untree_co-section" id="contact-section">
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
    </div> <!-- /.untree_co-section bg-light --> --}}
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Select all news items and detail image
            const newsItems = document.querySelectorAll('.news-item');
            const detailImage = document.querySelector('.detail-image');
            const detailView = document.querySelector('.detail-view');

            // Check if detailImage exists
            if (!detailImage) return;

            detailImage.src = newsItems[0].querySelector('.news-image').src;

            newsItems.forEach(item => {
                item.addEventListener('mouseover', () => {
                    // Avoid adding 'hover' class if it already exists
                    if (item.classList.contains('hover')) return;

                    item.classList.add('hover');

                    // Find and update news-image if it exists
                    const newsImage = item.querySelector('.news-image');
                    if (newsImage) {
                        detailImage.src = newsImage.src;
                        detailImage.classList.remove('d-none');
                        detailView.classList.remove('d-none');
                    }
                });

                item.addEventListener('mouseout', () => {
                    // Only remove 'hover' class if it exists
                    if (item.classList.contains('hover')) {
                        item.classList.remove('hover');
                    }
                });
            });

            // carousel
            const owlCarouselOptions = {
                loop: true, // Enable loop
                margin: 10, // Margin between items
                nav: false, // Show navigation arrows
                autoplay: true, // Enable autoplay
                autoplayTimeout: 3000, // Delay between slides (in milliseconds)
                autoplayHoverPause: false, // Pause on hover
                items: 4, // Number of items to show
                navText: ["<", ">"], // Navigation text
                touchDrag: false,
                mouseDrag: false,
                dots: false
            };

            $('.partner-slider').owlCarousel({
                ...owlCarouselOptions,
                rtl: false // Left-to-right direction
            });

            $('.partner-slider-rtl').owlCarousel({
                ...owlCarouselOptions,
                rtl: true // Right-to-left direction
            });
        });
    </script>
@endsection
