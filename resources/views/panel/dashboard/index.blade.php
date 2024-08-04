@extends('panel.layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>{{ __('Dashboard') }}</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="home-item" href="{{ route('dashboard.index') }}">
                                <i class="bi bi-house-door-fill"></i>
                            </a>
                        </li>
                        {{-- <li class="breadcrumb-item active"> Dashboard</li> --}}
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid default-dash">
        <div class="row">
            <div class="col-xl-6 col-md-6 dash-xl-50">
                <div class="card profile-greeting">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <div class="greeting-user">
                                    <h1>Hello, {{ auth()->user()->username }}</h1>
                                    <p>Welcome back, your dashboard is ready!</p>
                                    {{-- <a class="btn btn-outline-white_color" href="blog-single.html">
                                        Get Started
                                        <i class="icon-arrow-right"></i>
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="cartoon-img">
                            <img class="img-fluid" src="https://admin.pixelstrap.com/zeta/assets/images/images.svg"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 dash-xl-50">
                <div class="card yearly-chart">
                    <div class="card-header card-no-border pb-0">
                        <div class="d-flex justify-content-between">
                            <h6 class="f-w-600">Monthly Income</h6>
                            <h6 class="pb-2">Rp. 3.500.000</h6>
                        </div>
                        <h6 class="font-theme-light f-14 m-0">November 2024</h6>
                    </div>
                    <div class="card-body pt-0">
                        <div>
                            <div id="yearly-chart"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h6 class="f-w-600">Total Customers</h6>
                            <h6>50.000</h6>
                        </div>
                    </div>
                </div>
                {{-- <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h6 class="f-w-600">Total Pelanggan</h6>
                            <h6>$3,500,000</h6>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
