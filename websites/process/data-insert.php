<?php
require '../configs/koneksi.php';

if (isset($_POST['tambah-pegawai'])) {
    $IDPegawai = htmlspecialchars(trim($_POST['IDPegawai']));
    $Nama = htmlspecialchars(trim($_POST['Nama']));
    $Gender = htmlspecialchars(trim($_POST['Gender']));
    $Tanggal = htmlspecialchars(trim($_POST['Tanggal']));
    $Alamat = htmlspecialchars(trim($_POST['Alamat']));
    $Telepon = htmlspecialchars(trim($_POST['Telepon']));
    $IDJabatan = htmlspecialchars(trim($_POST['IDJabatan']));


    if (empty($IDPegawai) || empty($Nama) || empty($Gender) || empty($Tanggal) || empty($Alamat) || empty($Telepon) || empty($IDJabatan)) {
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
        mysqli_query($conn, "INSERT INTO pegawai (IDPegawai, Nama, Gender, Tanggal, Alamat, Telepon, IDJabatan) VALUES ('$IDPegawai', '$Nama', '$Gender', '$Tanggal', '$Alamat', '$Telepon', '$IDJabatan')");
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Berhasil!',
                text: 'Data Berhasil DiSimpan!',
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

if (isset($_POST['tambah-barang'])) {
    $IDBarang = htmlspecialchars(trim($_POST['IDBarang']));
    $Barang = htmlspecialchars(trim($_POST['Barang']));
    $IDKategori = htmlspecialchars(trim($_POST['IDKategori']));
    $Stok = htmlspecialchars(trim($_POST['Stok']));

    if (empty($IDBarang) || empty($Barang) || empty($IDKategori) || empty($Stok)) {
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
        mysqli_query($conn, "INSERT INTO barang (IDBarang, Barang, IDKategori, Stok) VALUES ('$IDBarang', '$Barang', '$IDKategori', '$Stok')");
        mysqli_query($conn, "INSERT INTO riwayat (IDRiwayat, Barang, Kategori, Stok, Status, Time) VALUES ('$IDBarang', '$Barang', '$IDKategori', '$Stok', 'INSERT', CURRENT_TIMESTAMP)");
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Berhasil!',
                text: 'Data Berhasil DiSimpan!',
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

if (isset($_POST['tambah-kategori'])) {
    $IDKategori = htmlspecialchars(trim($_POST['IDKategori']));
    $Kategori = htmlspecialchars(trim($_POST['Kategori']));

    if (empty($IDKategori) || empty($Kategori)) {
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
        mysqli_query($conn, "INSERT INTO kategori (IDKategori, Kategori) VALUES ('$IDKategori', '$Kategori')");
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Berhasil!',
                text: 'Data Berhasil DiSimpan!',
                icon: 'success',
                showCancelButton: false,
                showConfirmButton: false
            });
        });  
        window.setTimeout(function(){ 
            window.location.replace('data-kategori');
        },2000);
        </script>
        ";
    }
}

if (isset($_POST['tambah-akun'])) {
    $IDLogin = htmlspecialchars(trim($_POST['IDLogin']));
    $IDPegawai = htmlspecialchars(trim($_POST['IDPegawai']));
    $Username = htmlspecialchars(trim($_POST['Username']));
    $Password = htmlspecialchars(trim($_POST['Password']));
    $IDLevel = htmlspecialchars(trim($_POST['IDLevel']));

    $cek = mysqli_query($conn, "SELECT Username FROM login WHERE Username = '$Username'");

    if (empty($Username) || empty($Password)) {
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
    } else if (mysqli_num_rows($cek) != 0) {
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Gagal!',
                text: 'Username Telah Dipakai!',
                icon: 'error',
                timer: 2000,
                showCancelButton: false,
                showConfirmButton: false
            });
        });  
        </script>
        ";
    } else {
        mysqli_query($conn, "INSERT INTO login (IDLogin, IDPegawai, Username, Password, IDLevel) VALUES ('$IDLogin', '$IDPegawai', '$Username', '$Password', '$IDLevel')");
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Berhasil!',
                text: 'Registrasi Berhasil!',
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

if (isset($_POST['tambah-ulasan'])) {
    $InputKode = trim($_POST['IDUlasan']);
    $InputNama = trim($_POST['Nama']);
    $InputUlasan = trim($_POST['Ulasan']);
    $InputFoto = strtolower($_FILES['Foto']['name']);
    $Resource = $_FILES['Foto']['tmp_name'];
    $Check = $_FILES['Foto']['error'];
    $Size = $_FILES['Foto']['size'];
    $Location = "../assets/images/foto-ulasan/";

    if (empty($InputNama) || empty($InputUlasan)) {
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
        return false;
    }

    if ($Check === 4) {
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Gagal!',
                text: 'Silahkan Upload Foto!',
                icon: 'error',
                timer: 2000,
                showCancelButton: false,
                showConfirmButton: false
            });
        });  
        </script>
        ";
        return false;
    }

    $ValidExtension = ["jpg", "jpeg", "png"];
    $GetName = explode(".", $InputFoto);
    $GetExt = end($GetName);

    if (!in_array($GetExt, $ValidExtension)) {
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Gagal!',
                text: 'Silahkan Upload Foto (jpg, jpeg, png)!',
                icon: 'error',
                timer: 2000,
                showCancelButton: false,
                showConfirmButton: false
            });
        });  
        </script>
        ";
        return false;
    }

    if ($Size > 500000) {
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Gagal!',
                text: 'Maksimal Size Foto 500kb!',
                icon: 'error',
                timer: 2000,
                showCancelButton: false,
                showConfirmButton: false
            });
        });  
        </script>
        ";
        return false;
    }

    $UniqidName = uniqid();
    $UniqidName .= ".";
    $UniqidName .= $GetExt;

    move_uploaded_file($Resource, $Location . $UniqidName);

    $InsertData = mysqli_query($conn, "INSERT INTO ulasan(IDUlasan, Nama, Ulasan, Foto) VALUES ('$InputKode', '$InputNama' , '$InputUlasan' , '$UniqidName')");

    if ($InsertData) {
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Berhasil!',
                text: 'Data Berhasil DiSimpan!',
                icon: 'success',
                showCancelButton: false,
                showConfirmButton: false
            });
        });  
        window.setTimeout(function(){ 
            window.location.replace('data-ulasan');
        },2000);
        </script>
        ";
    }
}
