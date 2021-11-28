<?php
include '../../configs/koneksi.php';

$IDLogin = $_GET['IDLogin'];

mysqli_query($conn, "DELETE FROM login WHERE IDLogin = '$IDLogin'");
?>
<script>
    setTimeout(function() {
        Swal.fire({
            title: 'Berhasil!',
            text: 'Data Berhasil Dihapus!',
            icon: 'success',
            showCancelButton: false,
            showConfirmButton: false
        });
    }, 10);
    window.setTimeout(function() {
        window.location.replace('../data-akun');
    }, 2000);
</script>
<script src="../../assets/js/sweetalert2.all.min.js"></script>