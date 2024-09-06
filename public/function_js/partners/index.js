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
        scrollCollapse: true,
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
                Array.from(row.querySelectorAll("th"))
                    .map((cell) => cell.innerText.trim())
                    .slice(0, -1) // Exclude last column
        );

        // Extract body data
        const tbodyRows = Array.from(table.querySelectorAll("tbody tr"));
        const body = tbodyRows.map(
            (row) =>
                Array.from(row.querySelectorAll("td"))
                    .map((cell) => cell.innerText.trim())
                    .slice(0, -1) // Exclude last column
        );

        // Extract footer data
        const tfootRows = Array.from(table.querySelectorAll("tfoot tr"));
        const footer = tfootRows.map(
            (row) =>
                Array.from(row.querySelectorAll("th"))
                    .map((cell) => cell.innerText.trim())
                    .slice(0, -1) // Exclude last column
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
