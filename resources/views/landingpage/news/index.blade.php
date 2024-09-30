@extends('landingpage.layouts.app')

@section('home')
    <div class="untree_co-section bg-light">
        <div class="container">
            <div class="row">
                <!-- Bagian Artikel Utama -->
                <div class="col-md-8 pr-5">
                    <h1 class="text-capitalize heading">{{ $news->judul }}</h1>
                    <div class="row">
                        <!-- Gambar Berita -->
                        <div class="col-md-12 text-center">
                            <img src="{{ asset('assets/image/news/' . $news->image) }}" alt="Gambar Berita"
                                class="img-fluid w-50 mb-4 rounded shadow">
                        </div>
                        <!-- Paragraf Konten Berita -->
                        <div class="col-md-12">
                            {!! $news->content !!}
                        </div>
                    </div>
                </div>

                <!-- Bagian Samping: Berita Terkait -->
                <div class="col-md-4" data-aos="fade-up">
                    <div class="sticky-sidebar">
                        <h1 class="heading">Berita Terkait</h1>
                        <div class="related-news-scroll">
                            @foreach ($berita as $item)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->judul }}</h5>
                                        <p class="card-text">{!! Str::limit($item->content, 60) !!}</p>
                                        <a href="{{ route('home.news', encrypt($item->id)) }}" class="btn btn-primary">Baca
                                            Selengkapnya</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Bagian Samping: Acara Selanjutnya (Scroll Horizontal) -->
                <div class="col-md-12" data-aos="fade-up">
                    <h1 class="heading">Acara Selanjutnya</h1>
                    <div class="next-events-scroll">
                        @foreach ($acara as $item)
                            <div class="card mb-3 mr-3">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->judul }}</h5>
                                    <p class="card-text">{!! Str::limit($item->content, 60) !!}</p>
                                    <a href="{{ route('home.news', encrypt($item->id)) }}" class="btn btn-primary">Baca
                                        Selengkapnya</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

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
