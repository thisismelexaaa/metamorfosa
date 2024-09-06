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

        .fc-list-event-time {
            display: none;
        }

        .fc-event-time {
            font-weight: bold;
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

            <div class="card-footer">
                <table>
                    <tr>
                        <td>Keterangan</td>
                        <td>:</td>
                        <td>
                            <div class="badge badge-success">Sudah Konsultasi</div>
                        </td>
                        <td>
                            <div class="badge badge-warning">Sedang Konsultasi</div>
                        </td>
                        <td>
                            <div class="badge badge-primary">Akan Konsultasi</div>
                        </td>
                </table>
            </div>
        </div>
    </div>

    @foreach ($konsultasi as $key => $item)
        <?php $key += 1; ?>
        <div class="modal modalDetail{{ $key }} fade" id="modal{{ $key }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
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
                                    <td>Tanggal Masuk</td>
                                    <td>:</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tgl_masuk, 'Asia/Jakarta')->locale('id')->isoFormat('DD MMMM YYYY') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Layanan</td>
                                    <td>:</td>
                                    <td>{{ $item->layanan->layanan }}</td>
                                    <td>Tanggal Selesai</td>
                                    <td>:</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tgl_selesai, 'Asia/Jakarta')->locale('id')->isoFormat('DD MMMM YYYY') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sub Layanan</td>
                                    <td>:</td>
                                    <td>{{ $item->subLayanan->sub_layanan }}</td>
                                    <td>Sesi</td>
                                    <td>:</td>
                                    <td>{{ \Carbon\Carbon::parse($item->jam_mulai, 'Asia/Jakarta')->locale('id')->isoFormat('HH:mm') }}
                                        WIB s/d
                                        {{ \Carbon\Carbon::parse($item->jam_selesai, 'Asia/Jakarta')->locale('id')->isoFormat('HH:mm') }}
                                        WIB</td>
                                </tr>
                                <tr>
                                    <td>Keluhan</td>
                                    <td>:</td>
                                    <td>{{ $item->keluhan }}</td>
                                </tr>
                                <tr {{ Auth::user()->role != 'admin' ? 'hidden' : '' }}>
                                    <td>Support Teacher</td>
                                    <td>:</td>
                                    <td>{{ $item->supportTeacher->name }}</td>
                                </tr>
                            </table>
                            {{-- checkbox --}}
                            {{-- @dd(Auth::user()->role == 2 ? 'hidden' : '') --}}
                            <div {{ Auth::user()->role != 2 ? 'hidden' : '' }}>
                                <form action="{{ route('schedule.store') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    @php
                                        // Calculate duration in days
                                        $tgl_masuk = \Carbon\Carbon::parse($item->tgl_masuk)->day;
                                        $tgl_selesai = \Carbon\Carbon::parse($item->tgl_selesai)->day;
                                        $durasi = $tgl_selesai - $tgl_masuk;
                                        // dd($tgl_masuk, $tgl_selesai, $durasi);
                                    @endphp
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="isKonsul{{ $key }}"
                                            name="isKonsul" {{ $item->hasil_konsultasi != null ? 'checked' : '' }}>
                                        <label class="form-check-label" for="isKonsul{{ $key }}">
                                            Sudah Melakukan Konsultasi
                                        </label>
                                    </div>

                                    <div class="row {{ $item->hasil_konsultasi == null ? 'd-none' : '' }}"
                                        id="hasilKonsultasi{{ $key }}">
                                        <input type="hidden" name="id_konsultasi" value="{{ $item->id }}">
                                        <input type="hidden" name="id_layanan" value="{{ $item->id_layanan }}">
                                        <input type="hidden" name="id_sub_layanan" value="{{ $item->id_sub_layanan }}">
                                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="id_customer" value="{{ $item->id_customer }}">
                                        <div class="col-12" style="height: 200px; overflow-y: auto">
                                            {{-- Initial Form Group --}}
                                            <div class="form-group {{ $item->hasil_konsultasi != null ? 'd-none' : '' }}">
                                                <label for="hasilKonsultasi1" class="form-label">
                                                    Catatan / Hasil Konsultasi Hari Ke-1
                                                </label>
                                                <textarea class="form-control" id="hasilKonsultasi1" rows="3" placeholder="Hasil Konsultasi"
                                                    name="hasil_konsultasi[]" {{ $item->hasil_konsultasi != null ? 'disabled' : '' }}></textarea>
                                            </div>

                                            {{-- Iterating through existing consultation results --}}
                                            @foreach ($item->hasilKonsultasi as $hasil)
                                                <div
                                                    class="form-group {{ $item->hasil_konsultasi != null ? 'd-none' : '' }}">
                                                    <label for="hasilKonsultasi" class="form-label">
                                                        Catatan / Hasil Konsultasi Hari Ke-{{ $hasil->hari }}
                                                    </label>
                                                    <textarea class="form-control" id="hasilKonsultasi" rows="3" placeholder="Hasil Konsultasi"
                                                        name="hasil_konsultasi[]" {{ $item->hasil_konsultasi != null ? 'disabled' : '' }}></textarea>
                                                </div>

                                                {{-- Additional form group if this is the last entry and there are more days --}}
                                                @if ($loop->last && $hasil->hari <= $durasi)
                                                    <div class="form-group">
                                                        <label for="additionalHasilKonsultasi" class="form-label">
                                                            Catatan / Hasil Konsultasi Hari Ke-{{ $hasil->hari + 1 }}
                                                        </label>
                                                        <textarea class="form-control" id="additionalHasilKonsultasi" rows="3" placeholder="Hasil Konsultasi"
                                                            name="hasil_konsultasi[]"></textarea>
                                                    </div>
                                                    <button class="btn btn-sm btn-primary my-2 w-100">Submit Hasil
                                                        Konsultasi</button>
                                                @endif
                                            @endforeach

                                            {{-- Submit button for initial consultation results --}}
                                            {{-- <button
                                                class="btn btn-sm btn-primary my-2 w-100 {{ $item->hasil_konsultasi != null ? 'd-none' : '' }}">
                                                Submit Hasil Konsultasi
                                            </button> --}}
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            @if (Auth::user()->role == 2)
                                <form action="{{ route('konsultasi.update', encrypt($item->id)) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="button" class="btn btn-success" onclick="updateStatus(this)">
                                        Konsultasi Selesai
                                    </button>
                                    <input type="hidden" name="isDone">
                                </form>
                            @endif
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
            const calendarEl = document.getElementById('calendar');
            const dataJson = @json($konsultasi);

            // Map data to FullCalendar events
            const events = dataJson.map(item => {
                const startDateTime = `${item.tgl_masuk}T${item.jam_mulai}`;
                const endDateTime = item.jam_selesai ? `${item.tgl_selesai}T${item.jam_selesai}` :
                    startDateTime;

                return {
                    id: item.id,
                    title: `${item.kode_konsultasi} - ${item.customer.name}`,
                    start: startDateTime,
                    end: endDateTime,
                    allDay: false, // Time-based events
                    extendedProps: item,
                };
            });

            // Initialize FullCalendar
            const calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'id',
                customButtons: {
                    ChangeView: {
                        text: "Change View",
                        click: function() {
                            const newView = calendar.view.type === 'listWeek' ? 'dayGridMonth' :
                                'listWeek';
                            calendar.changeView(newView);
                        }
                    }
                },
                headerToolbar: {
                    left: 'ChangeView',
                    center: 'title',
                    right: 'today prev,next'
                },
                initialView: 'listWeek', // Default view
                timezone: 'local',
                height: 'auto',
                events: events,

                // Custom event rendering to show times
                eventContent: function(arg) {
                    const {
                        extendedProps
                    } = arg.event;
                    const startTime = extendedProps.jam_mulai;
                    const endTime = extendedProps.jam_selesai;
                    const title = `${extendedProps.kode_konsultasi} - ${extendedProps.customer.name}`;

                    return {
                        html: `
                            <div class="fc-event-time">${startTime} - ${endTime}</div>
                            <div class="fc-event-title">${title}</div>
                        `
                    };
                },

                eventClick: function(info) {
                    const id = info.event.id;
                    $(`.modalDetail${id}`).modal('show');

                    const isKonsul = document.getElementById(`isKonsul${id}`);
                    const hasilKonsultasi = document.getElementById(`hasilKonsultasi${id}`);

                    if (isKonsul) {
                        isKonsul.addEventListener('change', function() {
                            hasilKonsultasi.classList.toggle('d-none', !isKonsul.checked);
                        });
                    }
                },
                eventDidMount: function(info) {
                    const {
                        extendedProps
                    } = info.event;

                    // Kondisi berdasarkan status
                    if (extendedProps.status === 3) {
                        info.el.style.backgroundColor = '#7dc006';
                        info.el.style.borderColor = '#7dc006';
                    }

                    let dateEventStart = info.event.start; // Tanggal mulai acara
                    let dateEventEnd = info.event.end; // Tanggal akhir acara
                    let dateNow = new Date(); // Tanggal sekarang

                    // Pastikan tanggal tidak null atau undefined
                    if (dateEventStart && dateEventEnd) {
                        // Hilangkan komponen waktu (jam, menit, detik) untuk membandingkan hanya tanggal
                        dateEventStart = new Date(dateEventStart.toDateString());
                        dateEventEnd = new Date(dateEventEnd.toDateString());
                        dateNow = new Date(dateNow.toDateString());

                        // Perbandingan berdasarkan waktu
                        if (dateNow.getTime() > dateEventEnd.getTime()) {
                            // Hijau jika acara sudah selesai
                            info.el.style.backgroundColor = '#7dc006';
                            info.el.style.borderColor = '#7dc006';
                        } else if (dateNow.getTime() === dateEventStart.getTime()) {
                            // Kuning jika acara sedang berlangsung (tanggal mulai == tanggal sekarang)
                            info.el.style.backgroundColor = '#ff8819';
                            info.el.style.borderColor = '#ff8819';
                        } else if (dateNow.getTime() < dateEventStart.getTime()) {
                            // Biru jika acara belum dimulai
                            info.el.style.backgroundColor = '#6362e7';
                            info.el.style.borderColor = '#6362e7';
                        }
                    } else {
                        console.log("Event dates are missing");
                    }
                }

            });

            // Render the calendar
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
