<?php
error_reporting(0);
require '../../../configs/koneksi.php';


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
    $GetPegawai = mysqli_query($conn, "SELECT * FROM pegawai WHERE IDPegawai = '$IDPegawai'");
    $GetGambar = mysqli_fetch_array($GetPegawai);
    $DeleteGambar = unlink("../../../assets/images/foto-user/$GetGambar[Foto]");

    if ($DeleteGambar) {
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
}

if ($IDUlasan = $_GET['IDUlasan']) {
    $GetUlasan = mysqli_query($conn, "SELECT * FROM ulasan WHERE IDUlasan = '$IDUlasan'");
    $GetFoto = mysqli_fetch_array($GetUlasan);
    $DeleteFoto = unlink("../../../assets/images/foto-ulasan/$GetFoto[Foto]");

    if ($DeleteFoto) {
        mysqli_query($conn, "DELETE FROM ulasan WHERE IDUlasan = '$IDUlasan'");
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
            window.location.replace('../data-ulasan');
        }, 2000);
        </script>
        ";
    }
}
?>

<script src="../../../assets/js/sweetalert2.all.min.js"></script>