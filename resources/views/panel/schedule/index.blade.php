@extends('panel.layouts.app')

@section('title')
    Jadwal
@endsection

@section('content')
    <style>
        .fc-event {
            cursor: pointer;
        }

        .fc-event-dot {
            background-color: #f0f0f0;
        }
    </style>

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
            const calendarEl = document.getElementById('calendar');
            const dataJson = @json($konsultasi);
            const data = dataJson.map(item => ({
                id: item.id,
                title: item.kode_konsultasi,
                start: item.tgl_masuk + 'T00:00:00',
                end: item.tgl_selesai + 'T23:59:59',
                allDay: item.tgl_masuk === item.tgl_selesai
            }));

            let title = "Change View";

            const calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'id',
                customButtons: {
                    ChangeView: {
                        text: title,
                        click: function() {
                            if (calendar.view.type === 'listWeek') {
                                calendar.changeView('dayGridMonth');
                            } else {
                                calendar.changeView('listWeek');
                            }
                        }
                    }
                },
                headerToolbar: {
                    left: 'ChangeView',
                },
                initialView: 'dayGridMonth',
                timezone: 'local',
                height: 700,
                contentHeight: 25,
                events: data
            });

            console.log(data);

            calendar.render();
        });
    </script>
@endsection
