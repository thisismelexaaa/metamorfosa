@extends('panel.layouts.app')

@section('title')
    Dashboard
@endsection

@section('styles')
    <style>
        #incomeChart {
            width: 100% !important;
            height: auto;
        }

        #filter {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 10;
            background-color: white;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .chart-container {
            height: 400px;
            /* Set tinggi sama untuk kedua chart */
        }
    </style>
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
                                    <h1>Hello, {{ auth()->user()->name }}</h1>
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
            <div class="col-xl-6 col-md-6 dash-xl-50">
                <div class="row">
                    <div class="col-xl-6 col-md-6 dash-xl-50">
                        <div class="card yearly-chart">
                            <div class="card-header card-no-border pb-0">
                                <div class="d-flex justify-content-between">
                                    <h6 class="f-w-600">Total Pendapatan Bulan Ini</h6>
                                    <h6 class="pb-2 currency" data-value="{{ $total_harga }}"></h6>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <h6 class="font-theme-light f-14 m-0">
                                    {{ \Carbon\Carbon::now()->locale('id')->isoFormat('MMMM YYYY') }}
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 dash-xl-50">
                        <div class="card yearly-chart">
                            <div class="card-header card-no-border pb-0">
                                <div class="d-flex justify-content-between">
                                    <h6 class="f-w-600">Total Pendapatan Tahun Ini</h6>
                                    <h6 class="pb-2 currency" data-value="{{ $total_harga_year }}"></h6>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <h6 class="font-theme-light f-14 m-0">
                                    {{ \Carbon\Carbon::now()->locale('id')->isoFormat('YYYY') }}
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 dash-xl-50">
                        <div class="card yearly-chart">
                            <div class="card-header card-no-border pb-0">
                                <div class="d-flex justify-content-between">
                                    <h6 class="f-w-600">Total Pendapatan Keseluruhan</h6>
                                    <h6 class="pb-2 currency" data-value="{{ $total_harga_full }}"></h6>
                                </div>
                            </div>
                            <div class="card-body pt-0">

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h6 class="f-w-600">Total Pelanggan</h6>
                                    <h6>{{ $pelanggan->where('status', '1')->count() }}</h6>
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
        </div>
        <div class="row">
            <!-- Grafik Pendapatan -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title d-inline">Grafik Pendapatan</h5>
                        <select id="filter" style="position: absolute; top: 10px; right: 10px; z-index: 10;">
                            <option value="monthly">Per Bulan</option>
                            <option value="quarterly">Per 3 Bulan</option>
                            <option value="yearly">Per Tahun</option>
                        </select>
                    </div>
                    <div class="card-body">
                        <div class="chart-container" style="position: relative; width: 100%;">
                            <canvas id="incomeChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grafik Pendapatan Pelanggan -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title d-inline">Grafik Konsultasi</h5>
                    </div>
                    <div class="card-body">
                        <div class="chart-container" style="position: relative; width: 100%;">
                            <canvas id="customerIncomeChart"></canvas>
                        </div>
                        <div id="targetMessage" style="text-align: center; margin-top: 10px; font-weight: bold;"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // format currency
            $('.currency').each(function() {
                $(this).text(formatCurrency($(this).data('value')));
            });

            function formatCurrency(value) {
                const formatter = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                });
                return formatter.format(value);
            }
        })
    </script>

    <script>
        const ctx = document.getElementById('incomeChart').getContext('2d');
        const customerIncomeCtx = document.getElementById('customerIncomeChart').getContext('2d');
        let chart, customerIncomeChart;
        const userRoles = @json(auth()->user()->role);

        // Function to update chart
        function updateChart(filter) {
            fetch(`/chart-filter?filter=${filter}`, {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': `${document.querySelector('meta[name="csrf-token"]').getAttribute('content')}`,
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {

                    const labels = data.map(item => item.month || item.quarter || item.year);
                    const values = data.map(item => item.total);

                    if (chart) {
                        chart.destroy();
                    }

                    chart = new Chart(ctx, {
                        type: 'bar', // Bisa diganti jadi 'line' atau lainnya
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Total Pendapatan',
                                data: values,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                })
                .catch(error => console.error('Error:', error));
        }

        // Default load chart (per bulan)
        updateChart('monthly');

        // Update chart when filter is changed
        document.getElementById('filter').addEventListener('change', function() {
            updateChart(this.value);
        });

        // Fetch data pendapatan pelanggan per tahun
        fetch(`/chart-filter-cust`, {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': `${document.querySelector('meta[name="csrf-token"]').getAttribute('content')}`,
                    'Content-Type': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                const labels = data.map(item => item.month);
                const values = data.map(item => item.total);

                // Hitung total customer selama tahun ini
                const totalCustomers = values.reduce((sum, value) => sum + value, 0);

                // Set target customer
                const targetCustomer = 40;

                if (customerIncomeChart) {
                    customerIncomeChart.destroy();
                }

                customerIncomeChart = new Chart(customerIncomeCtx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Konsultasi',
                            data: values,
                            backgroundColor: 'rgba(255, 159, 64, 0.2)',
                            borderColor: 'rgba(255, 159, 64, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
                if(userRoles != 'admin'){

                    const targetMessage = document.getElementById('targetMessage');
                    if (totalCustomers >= targetCustomer) {
                        targetMessage.textContent =
                            `Target tercapai: ${totalCustomers} pelanggan (Target: ${targetCustomer} pelanggan)`;
                        targetMessage.style.color = 'green';
                    } else {
                        targetMessage.textContent =
                            `Total pelanggan: ${totalCustomers} (Target: ${targetCustomer} pelanggan)`;
                        targetMessage.style.color = 'red';
                    }
                }
            });
    </script>
@endsection
