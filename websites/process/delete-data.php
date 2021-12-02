<?php
error_reporting(0);
require '../../configs/koneksi.php';

if ($IDBarang = $_GET['IDBarang']) {
    mysqli_query($conn, "DELETE FROM barang WHERE IDBarang = '$IDBarang'");

    echo "
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
    ";
}

if ($IDLogin = $_GET['IDLogin']) {
    mysqli_query($conn, "DELETE FROM login WHERE IDLogin = '$IDLogin'");

    echo "<script>
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
    ";
}

if ($IDPegawai = $_GET['IDPegawai']) {
    mysqli_query($conn, "DELETE FROM pegawai WHERE IDPegawai = '$IDPegawai'");

    echo "
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
    ";
}
?>
<script src="../../assets/js/sweetalert2.all.min.js"></script>