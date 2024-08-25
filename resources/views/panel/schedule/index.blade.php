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

        <div class="card">
            <div class="card-body">
                <div id='calendar'></div>
            </div>
        </div>
    </div>

    @foreach ($konsultasi as $key => $item)
        <?php $key += 1; ?>
        <div class="modal modalDetail{{ $key }} fade" id="modal{{ $key }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <tr>
                                    <td>Keluhan</td>
                                    <td>:</td>
                                    <td>{{ $item->keluhan }}</td>
                                </tr>

                                <tr {{ Auth::user()->role != 'admin' ? 'hidden' : '' }}>
                                    <td>Support Teacher</td>
                                    <td>:</td>
                                    <td>{{ $item->supportTeacher->name  }}</td>
                                </tr>
                            </table>
                            {{-- checkbox --}}
                            {{-- @dd(Auth::user()->role == 2 ? 'hidden' : '') --}}
                            <div {{ Auth::user()->role != 2 ? 'hidden' : '' }}>
                                <form action="{{ route('konsultasi.update', encrypt($item->id)) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="isKonsul{{ $key }}"
                                            name="isKonsul" {{ $item->hasil_konsultasi != null ? 'checked' : '' }}>
                                        <label class="form-check-label" for="isKonsul{{ $key }}">
                                            Sudah Melakukan Konsultasi
                                        </label>
                                    </div>
                                    <div class="row {{ $item->hasil_konsultasi == null ? 'd-none' : '' }}"
                                        id="hasilKonsultasi{{ $key }}">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1" class="form-label">Catatan / Hasil
                                                    Konsultasi</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Hasil Konsultasi"
                                                    name="hasil_konsultasi">{{ $item->hasil_konsultasi != null ? $item->hasil_konsultasi : '' }}</textarea>
                                            </div>
                                            <button class="btn btn-sm btn-primary my-2 w-100">Submit Hasil
                                                Konsultasi</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('konsultasi.update', encrypt($item->id)) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="button" class="btn btn-success" onclick="updateStatus(this)">
                                    Konsultasi Selesai
                                </button>
                                <input type="hidden" name="isDone">
                            </form>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

{{-- @section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            let isKonsul = document.getElementById('isKonsul');
            let hasilKonsultasi = document.getElementById('hasilKonsultasi');

            isKonsul.addEventListener('change', function() {
                if (isKonsul.checked) {
                    hasilKonsultasi.classList.remove('d-none');
                } else {
                    hasilKonsultasi.classList.add('d-none');
                }
            });

            const calendarEl = document.getElementById('calendar');
            const dataJson = @json($konsultasi);
            const data = dataJson.map(item => ({
                id: item.id,
                title: item.kode_konsultasi + ' - ' + item.customer.name,
                start: item.tgl_masuk + 'T00:00:00',
                end: item.tgl_selesai + 'T23:59:59',
                allDay: item.tgl_masuk === item.tgl_selesai,
                extendedProps: item,
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
                    let id = info.event.id;
                    let event = info.event.extendedProps;

                    // Check the status of the event
                    let button = document.querySelector('.modalDetail' + id);

                    $(button).modal('show');
                },
                eventRender: function(info, element) {
                    let event = info.event.extendedProps;
                    console.log(event);

                    if (event.status == 3) {
                        element.css('background-color', '#fffff');
                    }
                },
            });

            calendar.render();
        });
    </script>
@endsection --}}

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Prepare calendar data
            const calendarEl = document.getElementById('calendar');
            const dataJson = @json($konsultasi);
            const data = dataJson.map(item => ({
                id: item.id,
                title: `${item.kode_konsultasi} - ${item.customer.name}`,
                start: `${item.tgl_masuk}T00:00:00`,
                end: `${item.tgl_selesai}T23:59:59`,
                allDay: item.tgl_masuk === item.tgl_selesai,
                extendedProps: item,
            }));

            // Custom button title
            let title = "Change View";

            // Initialize FullCalendar
            const calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'id',
                customButtons: {
                    ChangeView: {
                        text: title,
                        click: function() {
                            calendar.changeView(calendar.view.type === 'listWeek' ? 'dayGridMonth' :
                                'listWeek');
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
                    let id = info.event.id;

                    $('.modalDetail' + id).modal('show');

                    // Show/hide consultation result based on checkbox
                    let isKonsul = document.getElementById('isKonsul' + id);
                    let hasilKonsultasi = document.getElementById(
                        'hasilKonsultasi' + id);

                    isKonsul.addEventListener('change', function() {
                        hasilKonsultasi.classList.toggle('d-none', !isKonsul
                            .checked);
                    })
                },
                eventDidMount: function(info) {
                    let event = info.event.extendedProps;

                    if (event.status == 3) {
                        info.el.style.backgroundColor =
                            '#28a745'; // Change the background color to green
                        info.el.style.borderColor = '#28a745'; // Ensure the border color matches
                    }
                },
            });

            calendar.render();
        });

        function updateStatus(id) {
            console.log(id);

            // form prevent default
            event.preventDefault();
            const form = id.closest('form');
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan mengubah status bayar konsultasi ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Ubah Status!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        }
    </script>
@endsection
