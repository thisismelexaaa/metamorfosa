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
        <div class="modal modalDetail{{ $item->id }} fade" id="modal{{ $item->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="labelModal">Detail Konsultasi {{ $item->kode_konsultasi }}</h1>
                        <a href="{{ route('konsultasi.show', encrypt($item->id)) }}" target="_blank"
                            class="btn btn-link">Lihat Riwayat
                            Konsultasi</a>
                        {{-- <div class="d-flex justify-content-between">
                        </div> --}}
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
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
                            <div {{ Auth::user()->role != 2 ? '' : '' }}>
                                <form action="{{ route('schedule.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')

                                    @php
                                        // Calculate duration in days
                                        $tgl_masuk = \Carbon\Carbon::parse($item->tgl_masuk)->day;
                                        $tgl_selesai = \Carbon\Carbon::parse($item->tgl_selesai)->day;
                                        $tgl_sekarang = \Carbon\Carbon::now()->day;

                                        // range dari tgl_masuk sampai tgl_selesai
                                        $range = range($tgl_masuk, $tgl_selesai);
                                        $days = count($range);
                                        $durasi = $days;
                                        // count beetween tgl_masuk and tgl_selesai
                                        if ($item->hasilKonsultasi != null) {
                                            $hari_konsultasi_selesai = $item->hasilKonsultasi->pluck('hari')->toArray();
                                        } else {
                                            $hari_konsultasi_selesai = [];
                                        }
                                        // dd(count($hari_konsultasi_selesai) == $durasi);
                                    @endphp

                                    <div
                                        class="form-check mt-2 {{ $item->status == 3 ? 'd-none' : '' }}
                                        {{ $tgl_sekarang > $tgl_selesai ? 'd-none' : '' }}
                                        ">
                                        <input class="form-check-input" type="checkbox" id="isKonsul{{ $item->id }}"
                                            name="isKonsul" {{ $item->hasil_konsultasi != null ? 'checked' : '' }}>
                                        <label class="form-check-label" for="isKonsul{{ $item->id }}">
                                            Absen Konsultasi
                                        </label>
                                    </div>

                                    <div class="row {{ $item->hasil_konsultasi == null ? 'd-none' : '' }} {{ $item->status == 3 ? 'd-none' : '' }} {{ count($hari_konsultasi_selesai) == $durasi ? 'd-none' : '' }}"
                                        id="hasilKonsultasi{{ $item->id }}">
                                        <input type="hidden" name="id_konsultasi" value="{{ $item->id }}">
                                        <input type="hidden" name="id_layanan" value="{{ $item->id_layanan }}">
                                        <input type="hidden" name="id_sub_layanan" value="{{ $item->id_sub_layanan }}">
                                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="id_customer" value="{{ $item->id_customer }}">
                                        <div class="col-12" style="height: auto; overflow-y: auto">
                                            {{-- Initial Form Group --}}
                                            <div class="form-group {{ $item->hasil_konsultasi != null ? 'd-none' : '' }}">
                                                <label for="hasilKonsultasi1" class="form-label d-flex align-items-center">
                                                    Catatan / Hasil Konsultasi Hari Ke-
                                                    <select name="hari" class="form-select w-25 ms-2"
                                                        id="hariKonsultasi">
                                                        @for ($i = 1; $i <= $durasi; $i++)
                                                            {{-- <option value="{{ $i }}">{{ $i }}
                                                            </option> --}}
                                                            @if (!in_array($i, $hari_konsultasi_selesai))
                                                                <option value="{{ $i }}">{{ $i }}
                                                                </option>
                                                            @endif
                                                        @endfor
                                                    </select>
                                                </label>
                                                <textarea class="form-control" id="hasilKonsultasi1" rows="3" placeholder="Hasil Konsultasi"
                                                    name="hasil_konsultasi" {{ $item->hasil_konsultasi != null ? 'disabled' : '' }}></textarea>

                                                <label for="hasilKonsultasi1" class="form-label mt-2">
                                                    Foto
                                                </label>
                                                <input type="file" name="fotoNotes" id="fotoNotes{{ $item->id }}"
                                                    class="form-control" accept="image/png, image/jpeg">
                                                {{-- display selected image --}}
                                                <img src="" alt="" id="imagePreview{{ $item->id }}"
                                                    class="mt-2" width="200">
                                            </div>

                                            <button
                                                class="btn btn-sm btn-primary my-2 w-100 {{ $item->hasil_konsultasi != null ? 'd-none' : '' }}">
                                                Submit Hasil Konsultasi
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            @if (Auth::user()->role == 2 && $item->status != 3)
                                <form action="{{ route('konsultasi.update', encrypt($item->id)) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="button"
                                        class="btn btn-success {{ $tgl_sekarang > $tgl_selesai ? 'd-none' : '' }} {{ $item->status == 3 ? 'd-none' : '' }} {{ $tgl_sekarang < $tgl_masuk ? 'd-none' : '' }}"
                                        onclick="updateStatus(this)">
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
                    const support_teacher = extendedProps.support_teacher;

                    return {
                        html: `
                            <div class="fc-event-time">${startTime} - ${endTime}</div>
                            <div class="fc-event-title">${support_teacher.name}</div>
                            <div class="fc-event-title">${title}</div>
                        `
                    };
                },

                eventClick: function(info) {
                    const id = info.event.id;
                    console.log(info);

                    $(`.modalDetail${id}`).modal('show');


                    const isKonsul = document.getElementById(`isKonsul${id}`);
                    const hasilKonsultasi = document.getElementById(`hasilKonsultasi${id}`);

                    if (isKonsul) {
                        isKonsul.addEventListener('change', function() {
                            hasilKonsultasi.classList.toggle('d-none', !isKonsul.checked);
                        });
                    }
                    const fotoNotes = document.getElementById(`fotoNotes${id}`);
                    const imagePreview = document.getElementById(`imagePreview${id}`);
                    // display image preview in modal
                    fotoNotes.addEventListener('change', function() {
                        const file = this.files[0];

                        if (file) {
                            const reader = new FileReader();

                            reader.onload = function() {
                                imagePreview.src = reader.result;
                            }

                            reader.readAsDataURL(file);
                        }
                    });

                },
                eventDidMount: function(info) {
                    const {
                        extendedProps
                    } = info.event;

                    let dateEventStart = info.event.start; // Tanggal mulai acara
                    let dateEventEnd = info.event.end; // Tanggal akhir acara
                    let dateNow = new Date(); // Tanggal sekarang

                    if (extendedProps.status === 3) {
                        info.el.style.backgroundColor = '#7dc006';
                        info.el.style.borderColor = '#7dc006';
                        info.el.style.color = '#ffff';

                        info.el.addEventListener('mouseover', function() {
                            info.el.style.backgroundColor = '#7dc006';
                            info.el.style.borderColor = '#7dc006';
                            info.el.style.color = '#000000';
                        });

                        info.el.addEventListener('mouseout', function() {
                            info.el.style.backgroundColor = '#7dc006';
                            info.el.style.borderColor = '#7dc006';
                            info.el.style.color = '#ffff';
                        });
                    } else if (dateEventStart && dateEventEnd) {
                        // Hilangkan komponen waktu (jam, menit, detik) untuk membandingkan hanya tanggal
                        const dateNow = new Date();
                        dateNow.setHours(0, 0, 0, 0); // Set ke awal hari

                        const start = new Date(dateEventStart);
                        start.setHours(0, 0, 0, 0); // Set ke awal hari

                        const end = new Date(dateEventEnd);
                        end.setHours(0, 0, 0, 0); // Set ke awal hari

                        if (dateNow > end) {
                            // Hijau jika acara sudah selesai
                            info.el.style.backgroundColor = '#7dc006';
                            info.el.style.borderColor = '#7dc006';
                            info.el.style.color = '#ffff';

                            info.el.addEventListener('mouseover', function() {
                                info.el.style.backgroundColor = '#7dc006';
                                info.el.style.borderColor = '#7dc006';
                                info.el.style.color = '#000000';
                            });

                            info.el.addEventListener('mouseout', function() {
                                info.el.style.backgroundColor = '#7dc006';
                                info.el.style.borderColor = '#7dc006';
                                info.el.style.color = '#ffff';
                            });
                        } else if (dateNow < start) {
                            // Biru jika acara belum dimulai
                            info.el.style.backgroundColor = '#6362e7';
                            info.el.style.borderColor = '#6362e7';
                            info.el.style.color = '#ffff';

                            info.el.addEventListener('mouseover', function() {
                                info.el.style.backgroundColor = '#6362e7';
                                info.el.style.borderColor = '#6362e7';
                                info.el.style.color = '#000000';
                            });

                            info.el.addEventListener('mouseout', function() {
                                info.el.style.backgroundColor = '#6362e7';
                                info.el.style.borderColor = '#6362e7';
                                info.el.style.color = '#ffff';
                            });
                        } else if (dateNow >= start && dateNow <= end) {
                            // Kuning jika acara sedang berlangsung
                            info.el.style.backgroundColor = '#ff8819';
                            info.el.style.borderColor = '#ff8819';
                            info.el.style.color = '#ffff';

                            info.el.addEventListener('mouseover', function() {
                                info.el.style.backgroundColor = '#ff8819';
                                info.el.style.borderColor = '#ff8819';
                                info.el.style.color = '#000000';
                            });

                            info.el.addEventListener('mouseout', function() {
                                info.el.style.backgroundColor = '#ff8819';
                                info.el.style.borderColor = '#ff8819';
                                info.el.style.color = '#ffff';
                            });
                        }
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
    <script></script>
@endsection
