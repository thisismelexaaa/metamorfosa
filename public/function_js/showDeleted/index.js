let toggle = document.getElementById("showDeletedData");
let toggleLabel = document.getElementById("showDeletedDataLabel");
let tr = $(".tableRow");

toggleLabel.innerHTML = "Tampilkan data yang di hapus";

$(toggle).on("change", function () {
    toggleLabel.innerHTML = this.checked
        ? "Sembunyikan Data yang di hapus"
        : "Tampilkan data yang di hapus";

    if (this.checked) {
        $(tr).removeClass("d-none");
    } else {
        $(tr).addClass("d-none");
    }
});
