@extends('panel.layouts.app')

@section('title')
    Customers
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>{{ __('Pelanggan') }}</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="home-item" href="{{ route('dashboard.index') }}">
                                <i data-feather="home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Customers</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive overflow-auto">
                    <table class="table nowrap table-striped table-hover align-middle" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No Daftar</th>
                                <th>Nama Lengkap</th>
                                <th>NIK</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Nama Bapak</th>
                                <th>Nama Ibu</th>
                                <th>Layanan</th>
                                <th>Tanggal Masuk</th>
                                <th>Durasi Konsultasi</th>
                                <th>Profesional</th>
                                <th>Hasil Konsul</th>
                                <th>Biaya</th>
                                <th class="bg-white text-dark">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <= 100; $i++)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>12345</td>
                                    <td>John Doe</td>
                                    <td>1234567890123456</td>
                                    <td>Laki-laki</td>
                                    <td>01/01/1980</td>
                                    <td>123 Main St</td>
                                    <td>Jane Doe</td>
                                    <td>Mary Doe</td>
                                    <td>layanan 1</td>
                                    <td>01/01/2023</td>
                                    <td>01/02/2023</td>
                                    <td>profesional 1</td>
                                    <td>Good progress</td>
                                    <td>500000</td>
                                    <td class="bg-white text-dark">
                                        <div class="d-flex gap-2">
                                            <a href="#" class="btn btn-sm btn-primary">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash3-fill"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Count columns in the table
            const columns = document.querySelectorAll('.table th').length;
            const totalColumns = columns - 1;
            console.log(columns, totalColumns);

            // Initialize DataTable
            $('#datatable').DataTable({
                lengthMenu: [
                    [5, 10, 15, 20],
                    [5, 10, 15, 20]
                ],
                dom: 'Blfrtip',
                fixedColumns: {
                    start: 0,
                    end: 1,
                },
                scrollCollapse: true,
                scrollX: true,
                pageLength: 5,
                buttons: [{
                        text: 'Add Data',
                        className: 'btn btn-primary me-2 mb-2',
                        action: function() {
                            const customersRouteCreate = "{{ route('customers.create') }}";
                            window.location.href = customersRouteCreate;
                        }
                    },
                    {
                        extend: 'collection',
                        text: 'Export',
                        className: 'btn btn-primary me-2 mb-2',
                        buttons: [{
                                extend: 'copy',
                                title: `Data customers Metamorfosa, tanggal ${new Date().toLocaleDateString()}`,
                                exportOptions: {
                                    columns: [...Array(totalColumns).keys()]
                                }
                            },
                            {
                                extend: 'excel',
                                text: 'XLSX',
                                title: `Data customers Metamorfosa, tanggal ${new Date().toLocaleDateString()}`,
                                exportOptions: {
                                    columns: [...Array(totalColumns).keys()]
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                text: 'PDF',
                                title: `Data customers Metamorfosa, tanggal ${new Date().toLocaleDateString()}`,
                                exportOptions: {
                                    columns: [...Array(totalColumns).keys()]
                                },
                                orientation: 'landscape',
                                pageSize: 'A4'
                                // customize: function(doc) {
                                //     doc.pageMargins = [10, 10, 10,
                                //     10]; // Optional: Customize page margins
                                // }
                            },
                            {
                                extend: 'csv',
                                text: 'CSV',
                                title: `Data customers Metamorfosa, tanggal ${new Date().toLocaleDateString()}`,
                                exportOptions: {
                                    columns: [...Array(totalColumns).keys()]
                                }
                            },
                        ]
                    }
                ]
            });
        });
    </script>
@overwrite
