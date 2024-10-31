document.addEventListener("DOMContentLoaded", () => {
    const { jsPDF } = window.jspdf;
    const XLSX = window.XLSX;
    const Swal = window.Swal;
    const titleDocs = $(".titleDocs").text();

    // Function to format currency
    function formatCurrency(num) {
        return num.toLocaleString("id-ID", {
            style: "currency",
            currency: "IDR",
        });
    }

    // Initialize select2 for elements with the class 'select2'
    $(".select2").select2({
        theme: "bootstrap-5",
        width: "100%",
        placeholder: "Select an option",
        minimumResultsForSearch: Infinity,
    });

    // Format currency for elements with the class 'currency'
    $(".currency").each(function () {
        $(this).text(formatCurrency($(this).data("value")));
    });

    // Initialize DataTable
    const $datatable = $("#datatable").DataTable({
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"],
        ],
        // scrollCollapse: true,
        scrollX: true,
        pageLength: 5,
    });

    // Function to extract data from the table including tfoot
    function extractTableData() {
        const table = document.querySelector("#datatable");

        // Extract header data
        const theadRows = Array.from(table.querySelectorAll("thead tr"));
        const headers = theadRows.map(
            (row) =>
                Array.from(row.querySelectorAll("th")).map((cell) =>
                    cell.innerText.trim()
                ) // Exclude last column
        );

        // Extract body data
        const tbodyRows = Array.from(table.querySelectorAll("tbody tr"));
        const body = tbodyRows.map(
            (row) =>
                Array.from(row.querySelectorAll("td")).map((cell) =>
                    cell.innerText.trim()
                ) // Exclude last column
        );

        // Extract footer data
        const tfootRows = Array.from(table.querySelectorAll("tfoot tr"));
        const footer = tfootRows.map(
            (row) =>
                Array.from(row.querySelectorAll("th")).map((cell) =>
                    cell.innerText.trim()
                ) // Exclude last column
        );

        // Combine header, body, and footer data
        return {
            header: headers,
            body: body,
            footer: footer,
        };
    }

    // Copy Data From Table
    window.CopyToClipboard = function () {
        const data = extractTableData();
        const textToCopy = [
            ...data.header.map((row) => row.join("\t")),
            ...data.body.map((row) => row.join("\t")),
            ...data.footer.map((row) => row.join("\t")),
        ].join("\n");
        navigator.clipboard
            .writeText(textToCopy)
            .then(() => {
                Swal.fire({
                    icon: "success",
                    title: "Copied!",
                    text: "Table data copied to clipboard!",
                });
            })
            .catch(() => {
                Swal.fire({
                    icon: "error",
                    title: "Failed!",
                    text: "Failed to copy table data.",
                });
            });
    };

    // Export to CSV
    window.ExportToCSV = function () {
        const data = extractTableData();
        const csvContent = [
            ...data.header.map((row) => row.join(",")),
            ...data.body.map((row) => row.join(",")),
            ...data.footer.map((row) => row.join(",")),
        ].join("\n");
        const blob = new Blob([csvContent], {
            type: "text/csv;charset=utf-8;",
        });
        const link = document.createElement("a");
        link.href = URL.createObjectURL(blob);
        link.download = `${titleDocs}.csv`;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    };

    // Export to PDF
    window.ExportToPDF = function () {
        const data = extractTableData();
        const doc = new jsPDF("l", "mm", "a4"); // Landscape orientation

        // Add Title
        doc.setFontSize(18);
        doc.text(titleDocs, 14, 20);

        // Add Table
        doc.autoTable({
            startY: 30, // Position the table below the title
            head: data.header, // Header row
            body: [...data.body, ...data.footer], // Body rows + Footer
            theme: "striped", // Optional: striped rows
        });

        doc.save(`${titleDocs}.pdf`);
    };

    // Export to Excel
    window.ExportToXLSX = function () {
        const data = extractTableData();
        const worksheet = XLSX.utils.aoa_to_sheet([
            ...data.header,
            ...data.body,
            ...data.footer,
        ]);
        const workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, worksheet, "Table Data");
        XLSX.writeFile(workbook, `${titleDocs}.xlsx`);
    };
});

document.addEventListener("DOMContentLoaded", () => {
    // Define months in Indonesian
    const bulan = {
        1: "Januari",
        2: "Februari",
        3: "Maret",
        4: "April",
        5: "Mei",
        6: "Juni",
        7: "Juli",
        8: "Agustus",
        9: "September",
        10: "Oktober",
        11: "November",
        12: "Desember",
    };

    // Append options for bulan and tahun
    // $("#bulan").append(`<option value="all">Semua</option>`);
    // $("#tahun").append(`<option value="all">Semua</option>`);

    // Get current year and month
    const yearNow = new Date().getFullYear();
    const monthNow = new Date().getMonth() + 1;

    // Get URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    const paramMonth = parseInt(urlParams.get("bulan"), 10);
    const paramYear = parseInt(urlParams.get("tahun"), 10);

    // Populate bulan dropdown
    for (let i = 1; i <= 12; i++) {
        const isSelected =
            (paramMonth && paramMonth === i) || (!paramMonth && monthNow === i);
        $("#bulan").append(
            `<option value="${i}" ${isSelected ? "selected" : ""}>${
                bulan[i]
            }</option>`
        );
    }

    // Populate tahun dropdown
    for (let i = 2015; i <= yearNow; i++) {
        const isSelected =
            (paramYear && paramYear === i) || (!paramYear && yearNow === i);
        $("#tahun").append(
            `<option value="${i}" ${isSelected ? "selected" : ""}>${i}</option>`
        );
    }
});

// Function to update status with confirmation
function updateStatus(e) {
    const form = e.closest("form");
    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Anda akan mengubah status bayar konsultasi ini!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Ubah Status!",
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
}
