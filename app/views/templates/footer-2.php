<div class="py-6 px-6 text-center">
    <p class="mb-0 fs-4">Design and Developed by <a href="#" target="_blank" class="pe-1 text-decoration-underline" style="color:#003CF0">Kelompok 9</a> Distributed by <a href="http://niagahoster.com" target="_blank" class="pe-1 text-decoration-underline" style="color:#003CF0">NiagaHoster</a></p>
</div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="<?=BASEURL;?>/js/datatables.min.js"></script>

<script>
    $('#example').DataTable();
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.checkbox');
    const deleteSelectedBtn = document.querySelector('.delete-selected-btn');

    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', function() {
            const isChecked = document.querySelectorAll('.checkbox:checked').length > 0;

            if (isChecked) {
                deleteSelectedBtn.style.display = 'inline-block'; // Menampilkan tombol "Delete Selected"
            } else {
                deleteSelectedBtn.style.display = 'none'; // Menyembunyikan tombol "Delete Selected" jika tidak ada yang dipilih
            }
        });
    });

    // Menghapus data terpilih saat tombol "Delete Selected" ditekan
    deleteSelectedBtn.addEventListener('click', function() {
        const checkedCheckboxes = document.querySelectorAll('.checkbox:checked');

        if (checkedCheckboxes.length > 0) {
            const selectedIds = Array.from(checkedCheckboxes).map((checkbox) => checkbox.dataset.id);

            // Kirim permintaan penghapusan data terpilih ke server
            // Misalnya menggunakan fetch atau AJAX
            fetch(`${BASEURL}/user/delete_user`, {
                    method: 'POST',
                    body: JSON.stringify({
                        ids: selectedIds
                    }),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    // Handle response atau lakukan tindakan lainnya setelah penghapusan berhasil
                })
                .catch(error => {
                    // Tangani kesalahan
                    console.error('Error:', error);
                });
        }
    });
});

</script>

<script src="<?= BASEURL; ?>/libs/jquery/dist/jquery.min.js"></script>
<script src="<?= BASEURL; ?>/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASEURL; ?>/js/sidebarmenu.js"></script>
<script src="<?= BASEURL; ?>/js/app.min.js"></script>
<script src="<?= BASEURL; ?>/libs/simplebar/dist/simplebar.js"></script>
<script src="<?= BASEURL; ?>/js/script.js"></script>




</body>

</html>