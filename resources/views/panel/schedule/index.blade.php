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

    @foreach ($konsultasi as $item)
        <div class="modal fade" id="modal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="labelModal">Detail Konsultasi {{ $item->kode_konsultasi }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="dataPelanggan">
                            <table class="table table-hovered table-striped">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>{{ $item->customer->name }}</td>
                                </tr>
                                <tr>
                                    <td>Layanan</td>
                                    <td>:</td>
                                    <td>{{ $item->layanan->layanan }}</td>
                                </tr>
                                <tr>
                                    <td>Sub Layanan</td>
                                    <td>:</td>
                                    <td>{{ $item->subLayanan->sub_layanan }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
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
                allDay: item.tgl_masuk === item.tgl_selesai,
                extendedProps: item
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
                    center: 'title',
                    right: 'today prev,next'
                },
                initialView: 'dayGridMonth',
                timezone: 'local',
                height: 700,
                contentHeight: 25,
                events: data,
                eventClick: function(info) {
                    let dataEventId = info.event.id;
                    $(`#modal${dataEventId}`).modal('show');
                }
            });

            calendar.render();
        });
    </script>
@endsection
