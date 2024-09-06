document.addEventListener("DOMContentLoaded", () => {
    const { jsPDF } = window.jspdf;

    // Initialize DataTable (without export buttons)
    $("#datatable").DataTable({
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"],
        ],
        fixedColumns: {
            start: 0,
            end: 1,
        },
        select: true,
        scrollCollapse: true,
        scrollX: true,
        pageLength: 5,
    });

    // Function to extract data from the table excluding the last column
    const extractTableData = () => {
        const table = document.querySelector("#datatable");
        const rows = Array.from(table.querySelectorAll("tr"));
        return rows.map((row) => {
            const cells = Array.from(row.querySelectorAll("th, td"));
            return cells.slice(0, -1).map((cell) => cell.innerText.trim());
        });
    };

    // Copy Data From Table
    window.CopyToClipboard = function () {
        const data = extractTableData();
        const textToCopy = data.map((row) => row.join("\t")).join("\n");
        navigator.clipboard.writeText(textToCopy).then(() => {
            alert("Table data copied to clipboard!");
        });
    };

    // Export to CSV
    window.ExportToCSV = function () {
        const data = extractTableData();
        let csvContent = data.map((e) => e.join(",")).join("\n");
        const blob = new Blob([csvContent], {
            type: "text/csv;charset=utf-8;",
        });
        const link = document.createElement("a");
        link.href = URL.createObjectURL(blob);
        link.download = "table_data.csv";
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    };

    // Export to PDF
    window.ExportToPDF = function () {
        const data = extractTableData();
        const doc = new jsPDF();

        // Add Title
        doc.setFontSize(18);
        doc.text("Data Customer Metamorfosa", 14, 20);

        // Add Table
        doc.autoTable({
            startY: 30, // Position the table below the title
            head: [data[0]], // Header row
            body: data.slice(1), // Body rows
            theme: "striped", // Optional: striped rows
        });

        doc.save("table_data.pdf");
    };

    // Export to Excel
    window.ExportToXLSX = function () {
        const data = extractTableData();
        const worksheet = XLSX.utils.aoa_to_sheet(data);
        const workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, worksheet, "Table Data");
        XLSX.writeFile(workbook, "table_data.xlsx");
    };
});
