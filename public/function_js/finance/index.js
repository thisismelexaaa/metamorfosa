document.addEventListener("DOMContentLoaded", () => {
    // Count columns in the table
    const columns = document.querySelectorAll(".table th").length;
    const totalColumns = columns - 1;

    // Initialize DataTable
    const table = $("#datatable").DataTable({
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"],
        ],
        dom: "Blfrtip",
        scrollX: false,
        pageLength: 5,
        buttons: [
            {
                extend: "collection",
                text: "Export",
                className: "btn btn-primary me-2 mb-2",
                buttons: [
                    {
                        extend: "copy",
                        title: `Data customers Metamorfosa, tanggal ${new Date().toLocaleDateString()}`,
                    },
                    {
                        extend: "excel",
                        title: `Data customers Metamorfosa, tanggal ${new Date().toLocaleDateString()}`,
                    },
                    {
                        extend: "pdfHtml5",
                        title: `Data customers Metamorfosa, tanggal ${new Date().toLocaleDateString()}`,
                        orientation: "landscape",
                        pageSize: "A4",
                    },
                    {
                        extend: "csv",
                        title: `Data customers Metamorfosa, tanggal ${new Date().toLocaleDateString()}`,
                    },
                ],
            },
        ],
    });

    // Currency Formatter
    const currencyFormatter = new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        minimumFractionDigits: 0,
    });

    function formatCurrency(value) {
        return currencyFormatter.format(value);
    }

    // Apply currency formatting to all elements with the class 'currency'
    $(".currency").each(function () {
        const value = $(this).data("value");
        if (value !== undefined) {
            const formattedValue = formatCurrency(value);
            $(this).text(formattedValue);
        }
    });

    // Adjust colspan for the total label row
    const labelTotal = document.getElementById("label-total");
    if (labelTotal) {
        labelTotal.setAttribute("colspan", totalColumns - 2);
    }
});
