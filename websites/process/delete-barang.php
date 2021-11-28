<?php
include '../../configs/koneksi.php';

$IDBarang = $_GET['IDBarang'];

mysqli_query($conn, "DELETE FROM barang WHERE IDBarang = '$IDBarang'");
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
        window.location.replace('../data-barang');
    }, 2000);
</script>
<script src="../../assets/js/sweetalert2.all.min.js"></script>