function deleteData(button) {
    // Prevent the default form submission
    event.preventDefault();

    // Get the form element
    const form = button.closest("form");

    // Show confirmation dialog
    Swal.fire({
        title: "Apakah Anda Yakin?",
        text: "Anda tidak bisa membatalkan aksi ini!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            // If confirmed, submit the form
            form.submit();
        }
    });
}

function restoreData(button) {
    // Prevent the default form submission
    event.preventDefault();

    // Get the form element
    const form = button.closest("form");

    // Show confirmation dialog
    Swal.fire({
        title: "Apakah Anda Yakin?",
        text: "Data akan dikembalikan!",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Kembalikan!",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            // If confirmed, submit the form
            form.submit();
        }
    });
}
