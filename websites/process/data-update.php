<?php
include '../configs/koneksi.php';

if (isset($_POST['update-pegawai'])) {
    $IDPegawai = htmlspecialchars(trim($_POST['IDPegawai']));
    $Nama = htmlspecialchars(trim($_POST['Nama']));
    $Gender = htmlspecialchars(trim($_POST['Gender']));
    $Tanggal = htmlspecialchars(trim($_POST['Tanggal']));
    $Alamat = htmlspecialchars(trim($_POST['Alamat']));
    $Telepon = htmlspecialchars(trim($_POST['Telepon']));

    if (empty($Nama) || empty($Gender) || empty($Tanggal) || empty($Alamat) || empty($Telepon)) {
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Gagal!',
                text: 'Silahkan Isi Data Dengan Lengkap!',
                icon: 'error',
                timer: 2000,
                showCancelButton: false,
                showConfirmButton: false
            });
        });  
        </script>
        ";
    } else {
        mysqli_query($conn, "UPDATE pegawai SET Nama = '$Nama', Gender = '$Gender', Tanggal = '$Tanggal', Alamat = '$Alamat', Telepon = '$Telepon' WHERE IDPegawai = '$IDPegawai'");
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Berhasil!',
                text: 'Data Berhasil DiUpdate!',
                icon: 'success',
                showCancelButton: false,
                showConfirmButton: false
            });
        });  
        window.setTimeout(function(){ 
            window.location.replace('data-pegawai');
        },2000);
        </script>
        ";
    }
}

if (isset($_POST['update-barang'])) {
    $IDBarang = htmlspecialchars(trim($_POST['IDBarang']));
    $Barang = htmlspecialchars(trim($_POST['Barang']));
    $IDKategori = htmlspecialchars(trim($_POST['IDKategori']));
    $Stok = htmlspecialchars(trim($_POST['Stok']));

    if (empty($Barang) || empty($IDKategori) || empty($Stok)) {
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Gagal!',
                text: 'Silahkan Isi Data Dengan Lengkap!',
                icon: 'error',
                timer: 2000,
                showCancelButton: false,
                showConfirmButton: false
            });
        });  
        </script>
        ";
    } else {
        mysqli_query($conn, "UPDATE barang SET Barang = '$Barang', Stok = '$Stok' WHERE IDBarang = '$IDBarang'");
        mysqli_query($conn, "INSERT INTO riwayat (IDRiwayat, Barang, Kategori, Stok, Status, Time) VALUES ('$IDBarang', '$Barang', '$IDKategori', '$Stok', 'UPDATE', CURRENT_TIMESTAMP)");
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Berhasil!',
                text: 'Data Berhasil DiUpdate!',
                icon: 'success',
                showCancelButton: false,
                showConfirmButton: false
            });
        });  
        window.setTimeout(function(){ 
            window.location.replace('data-barang');
        },2000);
        </script>
        ";
    }
}

if (isset($_POST['update-akun'])) {
    $IDLogin = htmlspecialchars(trim($_POST['IDLogin']));
    $Password = htmlspecialchars(trim($_POST['Password']));

    if (empty($Password)) {
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Peringatan!',
                text: 'Silahkan Isi Password!',
                icon: 'error',
                timer: 2000,
                showCancelButton: false,
                showConfirmButton: false
            });
        });  
        </script>
        ";
    } else {
        mysqli_query($conn, "UPDATE login SET Password = '$Password' WHERE IDLogin = '$IDLogin'");
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Peringatan!',
                text: 'Update Berhasil!',
                icon: 'success',
                showCancelButton: false,
                showConfirmButton: false
            });
        });  
        window.setTimeout(function(){ 
            window.location.replace('data-akun');
        },2000);
        </script>
        ";
    }
}
