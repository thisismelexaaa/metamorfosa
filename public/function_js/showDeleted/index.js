// document.addEventListener("DOMContentLoaded", () => {
//     const toggle = document.getElementById("showDeletedData");
//     const toggleLabel = document.getElementById("showDeletedDataLabel");
//     const rows = document.querySelectorAll(".tableRow");

//     // Set initial label
//     toggleLabel.textContent = "Tampilkan data yang di hapus";

//     // Event listener for the toggle switch
//     toggle.addEventListener("change", () => {
//         const isChecked = toggle.checked;
//         toggleLabel.textContent = isChecked
//             ? "Sembunyikan Data yang di hapus"
//             : "Tampilkan data yang di hapus";

//         rows.forEach((row) => {
//             row.classList.toggle("d-none", !isChecked);
//         });
//     });
// });


document.addEventListener("DOMContentLoaded", () => {
    const toggle = document.getElementById("showDeletedData");
    const toggleLabel = document.getElementById("showDeletedDataLabel");
    const table = $("#datatable").DataTable(); // Initialize DataTable
    const rows = document.querySelectorAll(".tableRow");

    // Set initial label
    toggleLabel.textContent = "Tampilkan data yang di hapus";

    // Function to update the DataTable and merge rows
    function updateTable() {
        const isChecked = toggle.checked;
        const rowsToHide = [];
        const rowsToShow = [];

        rows.forEach(row => {
            if (isChecked) {
                row.classList.remove("d-none");
                rowsToShow.push(row);
            } else {
                row.classList.add("d-none");
                rowsToHide.push(row);
            }
        });

        // Re-render the table to remove gaps
        table.rows().invalidate().draw();

        // Merge visible rows
        mergeRows(rowsToShow);
    }

    // Function to merge visible rows
    function mergeRows(visibleRows) {
        let lastRow;
        visibleRows.forEach(row => {
            if (lastRow) {
                // Implement your merging logic here, for example:
                if (lastRow.querySelector(".some-class").textContent === row.querySelector(".some-class").textContent) {
                    lastRow.querySelector(".some-class").colSpan++;
                    $(row).remove();
                } else {
                    lastRow = row;
                }
                // lastRow = row; // Update the reference to the last row
            } else {
                lastRow = row;
            }
        });
    }

    // Event listener for the toggle switch
    toggle.addEventListener("change", () => {
        toggleLabel.textContent = toggle.checked ? "Sembunyikan Data yang di hapus" : "Tampilkan data yang di hapus";
        updateTable();
    });

    // Initial table update
    updateTable();
});
