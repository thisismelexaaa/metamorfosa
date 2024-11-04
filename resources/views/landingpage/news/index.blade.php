@extends('landingpage.layouts.app')

@section('styles')
    <style>
        .related-news-scroll {
            max-height: 70vh;
            overflow-y: auto;
        }

        .related-news-scroll::-webkit-scrollbar {
            height: 8px;
            width: 8px;
        }

        .related-news-scroll::-webkit-scrollbar-thumb {
            background-color: rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        .related-news-scroll::-webkit-scrollbar-track {
            background-color: #f1f1f1;
        }

        /* Bagian Scroll Horizontal Acara Selanjutnya */
        .next-events-scroll {
            display: flex;
            overflow-x: auto;
            gap: 15px;
            padding-bottom: 15px;
            padding-left: 5px;
        }

        /* Gaya untuk card di scroll horizontal */
        .next-events-scroll .card {
            min-width: 250px;
            flex-shrink: 0;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .next-events-scroll::-webkit-scrollbar {
            height: 8px;
        }

        .next-events-scroll::-webkit-scrollbar-thumb {
            background-color: rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        .next-events-scroll::-webkit-scrollbar-track {
            background-color: #f1f1f1;
        }

        /* Gaya untuk sticky sidebar */
        .sticky-sidebar {
            position: -webkit-sticky;
            /* Safari */
            position: sticky;
            top: 85px;
            /* Jarak dari atas viewport */
        }
    </style>
@endsection

@section('home')
    <div class="untree_co-section bg-light">
        <div class="container">
            <div class="row">
                <!-- Bagian Artikel Utama -->
                <div class="col-md-8 pr-5">
                    <h1 class="text-capitalize heading">{{ $news->judul }}</h1>
                    <p class="text-secondary">By: {{ $news->author }} -
                        {{ \Carbon\Carbon::parse($news->created_at)->format('d F Y H:i') }}</p>
                    <div class="row">
                        <!-- Gambar Berita -->
                        <div class="col-md-12 text-center">
                            <img src="{{ asset('assets/image/news/' . $news->image) }}" alt="Gambar Berita"
                                class="img-fluid w-100 mb-4 rounded shadow-md">
                        </div>

                        <!-- Paragraf Konten Berita -->
                        <div class="col-md-12">
                            <div class="newsImages owl-carousel owl-theme">
                                @foreach ($newsImages as $newsImage)
                                    <div class="item py-3" data-aos="fade-up" data-aos-delay="100">
                                        <div class="carousel-item-content">
                                            <img src="{{ asset('assets/image/news/' . $newsImage->image) }}"
                                                alt="{{ $newsImage->alt_text }}" class="img-fluid">
                                            {{-- <span class="partner-name">{{ $partner->name }}</span> --}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="pb-5">
                                <span class="text-justify">
                                    {!! $news->content !!}
                                </span>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex align-items-center justify-content-between fw-bold mb-3">
                                        <span style="font-weight: 800">Acara Mendatang</span>
                                        <span class="bg-dark" style="height: 2px; width: 78%;"></span>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            @foreach ($acara as $itemAcara)
                                                <div class="p-3">
                                                    <div class="d-flex">
                                                        <div class="mr-3"
                                                            style="width: 350px; overflow: hidden;">
                                                            <img src="{{ asset('assets/image/news/' . $itemAcara->image) }}"
                                                                class="img-fluid rounded"
                                                                style="width: 100%; height: 100%; object-fit: cover;">
                                                        </div>

                                                        <div class="w-50">
                                                            <a href="{{ route('home.news', encrypt($itemAcara->id)) }}"
                                                                class="text-dark"
                                                                style="font-weight: 600; font-size: .9em;">
                                                                {{ $itemAcara->judul }}
                                                            </a>
                                                            <p class="text-muted" style="font-size: .9em;">By
                                                                <b>{{ $itemAcara->author }}</b>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="13"
                                                                    height="13" fill="currentColor"
                                                                    class="bi bi-clock-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                                                                </svg>
                                                                {{ $itemAcara->created_at->diffForHumans() }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Bagian Samping: Berita Terkait -->
                <div class="col-md-4" data-aos="fade-up">
                    <div class="sticky-sidebar">
                        <div class="d-flex align-items-center justify-content-between fw-bold mb-3">
                            <span>Berita Terkait</span>
                            <span class="bg-dark" style="height: 2px; width: 68%;"></span>
                        </div>
                        <div class="related-news-scroll">
                            @foreach ($berita as $item)
                                <div class="card mb-3 border-0">
                                    <div class="card-body d-flex align-items-center">
                                        <!-- Konten Teks Berita -->
                                        <div class="w-100">
                                            <a href="{{ route('home.news', encrypt($item->id)) }}" class="text-dark"
                                                style="font-weight: 600; font-size: .9em;">
                                                {{ $item->judul }}
                                            </a>
                                            <div class="text-muted d-flex align-items-center" style="font-size: 0.9em;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-clock-fill mr-2" viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                                                </svg>
                                                <span>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                        <!-- Thumbnail Gambar -->
                                        <div class="" style="width: 200px; height: 80px; overflow: hidden;">
                                            <img src="{{ asset('assets/image/news/' . $item->image) }}"
                                                class="img-fluid rounded"
                                                style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.newsImages').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                dots: false
            });
        });
    </script>
@endsection
