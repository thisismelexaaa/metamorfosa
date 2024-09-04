@extends('landingpage.layouts.app')

@section('home')
    <div class="untree_co-section bg-light" id="layanan-section">
        <div class="container">

            <div class="row pricing-title">
                <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="0">
                    <h2 class="heading">Layanan</h2>
                </div>
            </div> <!-- /.row -->

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row">
                        @foreach ($layanan as $layananItem)
                            <div class="col-lg-4 my-2" data-aos="fade-up" data-aos-delay="100">
                                <div class="pricing">
                                    <div class="body">
                                        <div class="price">
                                            <span class="d-block plan mb-4">{{ $layananItem->layanan }}</span>
                                        </div>
                                        <ul class="list-unstyled ul-check primary">
                                            @foreach ($layananItem->getSubLayanan as $subLayananItem)
                                                <li>{{ $subLayananItem->sub_layanan }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div> <!-- /.pricing -->
                            </div> <!-- /.col-lg-4 -->
                        @endforeach
                    </div> <!-- /.row -->
                </div> <!-- /.col-lg-8 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.untree_co-section -->
@endsection
