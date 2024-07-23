document.addEventListener("DOMContentLoaded", function () {
    console.log("DOM fully loaded and parsed");

    // select 2 init
    const select2Ids = ['profesional', 'layanan', 'jenis_kelamin'];
    select2Ids.forEach(element => {
        $('#' + element).select2({
            placeholder: $('#' + element).data('placeholder') || `Pilih ${element}`,
            theme: "bootstrap-5",
            width: $('#' + element).data('width') || $('#' + element).hasClass('w-100') ? '100%' : 'style',
            minimumResultsForSearch: element === 'profesional' ? Infinity : 0,
        });
    });

    // input durasi
    const btnHari = document.getElementById('hari');
    const btnBulan = document.getElementById('bulan');
    const durasiElement = document.getElementById('durasi');

    btnHari.addEventListener('click', function () {
        console.log('Hari');
        durasiElement.textContent = 'Hari';
    });

    btnBulan.addEventListener('click', function () {
        console.log('Bulan');
        durasiElement.textContent = 'Bulan';
    });

    // Form validation
    document.getElementById('btn-submit').addEventListener('click', function (event) {

    });
});
