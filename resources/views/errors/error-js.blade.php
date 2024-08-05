<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize the counter text
        document.querySelector('.text').textContent = 'Kembali Dalam :';

        // Handle each countdown element
        document.querySelectorAll('.count').forEach(function(element) {
            let initialCount = 5;
            let finalCount = parseInt(element.textContent, 10) || initialCount; // Ensure it's numeric

            $(element).prop('Counter', finalCount).animate({
                Counter: 0
            }, {
                duration: 5000,
                easing: 'swing',
                step: function(now) {
                    $(this).text(Math.ceil(now));
                },
                complete: function() {
                    document.querySelectorAll('.count').forEach(el => el.style.display =
                        'none');
                    document.querySelector('.text').textContent =
                        'Kembali Ke Halaman Sebelumnya';

                    setTimeout(function() {
                        window.history.back();
                    }, 1000);
                }
            });
        });
    });
</script>
