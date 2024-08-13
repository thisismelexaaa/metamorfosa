document.addEventListener("DOMContentLoaded", () => {
    // Count columns in the table
    const columns = document.querySelectorAll(".table th").length;
    const totalColumns = columns - 1;
    console.log(columns, totalColumns);

    // Initialize DataTable
    $("#datatable").DataTable({
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"],
        ],
        dom: "Blfrtip",
        // fixedColumns: {
        //     start: 0,
        //     end: 1,
        // },
        select: true,
        // scrollCollapse: true,
        // scrollX: true,
        pageLength: 5,
        buttons: [
            {
                text: "Add Data",
                className: "btn btn-primary me-2 mb-2",
                action: () => {
                    const customersRouteCreate = "konsultasi/create";
                    window.location.href = customersRouteCreate;
                },
            },
            {
                extend: "collection",
                text: "Export",
                className: "btn btn-primary me-2 mb-2",
                buttons: [
                    {
                        extend: "copy",
                        title: `Data customers Metamorfosa, tanggal ${new Date().toLocaleDateString()}`,
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
                        title: `Data customers Metamorfosa, tanggal ${new Date().toLocaleDateString()}`,
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
                        title: `Data customers Metamorfosa, tanggal ${new Date().toLocaleDateString()}`,
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
                        title: `Data customers Metamorfosa, tanggal ${new Date().toLocaleDateString()}`,
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

    const currencyFormatter = new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        minimumFractionDigits: 0,
    });

    // Format currency for each element with the 'currency' class
    $(".currency").each(function () {
        const value = $(this).data("value"); // Get the raw value from data attribute
        const formattedValue = currencyFormatter.format(value); // Format the value
        $(this).text(formattedValue); // Update the cell text with formatted value
    });
});
