<?php
include '../../configs/koneksi.php';

$IDPegawai = $_GET['IDPegawai'];

mysqli_query($conn, "DELETE FROM pegawai WHERE IDPegawai = '$IDPegawai'");
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
        window.location.replace('../data-pegawai');
    }, 2000);
</script>
<script src="../../assets/js/sweetalert2.all.min.js"></script>