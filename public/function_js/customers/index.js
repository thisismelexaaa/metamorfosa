document.addEventListener('DOMContentLoaded', () => {
    // Menghitung jumlah kolom di tabel
    const columns = document.querySelectorAll('.table th').length;
    const totalColumns = columns - 1;

    // Inisialisasi DataTable
    $('#datatable').DataTable({
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, 'All']
        ],
        dom: 'Blfrtip',
        fixedColumns: {
            start: 0,
            end: 1,
        },
        select: true,
        scrollCollapse: true,
        scrollX: true,
        pageLength: 5,
        buttons: [{
                text: 'Tambah Data',
                className: 'btn btn-primary me-2 mb-2',
                action: () => {
                    window.location.href = "customers/create";
                }
            },
            {
                extend: 'collection',
                text: 'Ekspor ke',
                className: 'btn btn-primary me-2 mb-2',
                buttons: [{
                        extend: 'copy',
                        text: 'Salin',
                        title: `Data customers Metamorfosa, tanggal ${new Date().toLocaleDateString()}`,
                        exportOptions: {
                            columns: [...Array(totalColumns).keys()],
                            modifier: {
                                page: 'current'
                            }
                        }
                    },
                    {
                        extend: 'excel',
                        text: 'XLSX',
                        title: `Data customers Metamorfosa, tanggal ${new Date().toLocaleDateString()}`,
                        exportOptions: {
                            columns: [...Array(totalColumns).keys()],
                            modifier: {
                                page: 'current'
                            }
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        text: 'PDF',
                        title: `Data customers Metamorfosa, tanggal ${new Date().toLocaleDateString()}`,
                        exportOptions: {
                            columns: [...Array(totalColumns).keys()],
                            modifier: {
                                page: 'current'
                            }
                        },
                        orientation: 'landscape',
                        pageSize: 'A4'
                    },
                    {
                        extend: 'csv',
                        text: 'CSV',
                        title: `Data customers Metamorfosa, tanggal ${new Date().toLocaleDateString()}`,
                        exportOptions: {
                            columns: [...Array(totalColumns).keys()],
                            modifier: {
                                page: 'current'
                            }
                        }
                    },
                ]
            }
        ]
    });
});
