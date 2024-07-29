@extends('panel.layouts.app')

@section('title')
    Jadwal
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>{{ __('Jadwal') }}</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="home-item" href="index.html">
                                <i class="bi bi-house-door-fill"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Jadwal</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid calendar-basic">
        <div class="card">
            <div class="card-body">
                <div id='calendar'></div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let calendarEl = document.getElementById('calendar');
            let customers = @json($customer);
            let dataCustomer = customers.map(item => ({
                id: item.id,
                title: item.name,
                start: item.tgl_masuk + 'T00:00:00',
                end: item.tgl_selesai + 'T23:59:59',
            }));

            let calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                timezone: 'local',
                height: 700,
                contentHeight: 25,
                events: dataCustomer,
            });

            console.log(dataCustomer);

            calendar.render();
        });
    </script>
@endsection
