document.addEventListener("DOMContentLoaded", () => {
    // Count columns in the table
    const columns = document.querySelectorAll(".table th").length;
    const totalColumns = columns - 1;

    console.log("Ready");

    // Initialize DataTable
    $("#datatable").DataTable({
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"],
        ],
        dom: "Blfrtip",
        fixedColumns: {
            start: 0,
            end: 1,
        },
        select: true,
        scrollCollapse: true,
        scrollX: true,
        pageLength: 5,
        buttons: [
            {
                text: "Tambah Data",
                className: "btn btn-primary me-2 mb-2",
                action: () => {
                    const customersRouteCreate = "partners/create";
                    window.location.href = customersRouteCreate;
                },
            },
            {
                extend: "collection",
                text: "Ekspor ke",
                className: "btn btn-primary me-2 mb-2",
                buttons: [
                    {
                        extend: "copy",
                        text: "Salin",
                        title: `Data partners Metamorfosa, tanggal ${new Date().toLocaleDateString()}`,
                        exportOptions: {
                            columns: [...Array(totalColumns).keys()],
                            modifier: {
                                page: "current",
                            },
                        },
                    },
                    {
                        extend: "excel",
                        text: "XLSX",
                        title: `Data partners Metamorfosa, tanggal ${new Date().toLocaleDateString()}`,
                        exportOptions: {
                            columns: [...Array(totalColumns).keys()],
                            modifier: {
                                page: "current",
                            },
                        },
                    },
                    {
                        extend: "pdfHtml5",
                        text: "PDF",
                        title: `Data partners Metamorfosa, tanggal ${new Date().toLocaleDateString()}`,
                        exportOptions: {
                            columns: [...Array(totalColumns).keys()],
                            modifier: {
                                page: "current",
                            },
                        },
                        orientation: "landscape",
                        pageSize: "A4",
                        // customize: function(doc) {
                        //     doc.pageMargins = [10, 10, 10,
                        //     10]; // Optional: Customize page margins
                        // }
                    },
                    {
                        extend: "csv",
                        text: "CSV",
                        title: `Data partners Metamorfosa, tanggal ${new Date().toLocaleDateString()}`,
                        exportOptions: {
                            columns: [...Array(totalColumns).keys()],
                            modifier: {
                                page: "current",
                            },
                        },
                    },
                ],
            },
        ],
    });
});
