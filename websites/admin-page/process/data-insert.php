<?php
require '../../configs/koneksi.php';


if (isset($_POST['tambah-barang'])) {
    $IDBarang = htmlspecialchars(trim($_POST['IDBarang']));
    $Barang = htmlspecialchars(trim($_POST['Barang']));
    $IDKategori = htmlspecialchars(trim($_POST['IDKategori']));
    $Stok = htmlspecialchars(trim($_POST['Stok']));

    $cekBarang = mysqli_query($conn, "SELECT Barang FROM barang WHERE Barang = '$Barang'");

    if (empty($IDBarang) || empty($Barang) || empty($IDKategori) || empty($Stok)) {
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Peringatan!',
                text: 'Silahkan Input Data Dengan Lengkap!',
                icon: 'error',
                timer: 2000,
                showCancelButton: false,
                showConfirmButton: false
            });
        });  
        </script>
        ";
    } else if (mysqli_num_rows($cekBarang) != 0) {
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Peringatan!',
                text: 'Data Telah Terdaftar Didalam Sistem!',
                icon: 'error',
                timer: 2000,
                showCancelButton: false,
                showConfirmButton: false
            });
        });  
        </script>
        ";
    } else if (!preg_match("/^[a-zA-Z ]*$/", $Barang)) {
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Peringatan!',
                text: 'Silahkan Input Barang Dengan Benar!',
                icon: 'error',
                timer: 2000,
                showCancelButton: false,
                showConfirmButton: false
            });
        });  
        </script>
        ";
    } else if (!preg_match("/^[0-9]*$/", $Stok)) {
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Peringatan!',
                text: 'Silahkan Input Stok Dengan Benar!',
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

    $cekKategori = mysqli_query($conn, "SELECT Kategori FROM kategori WHERE Kategori = '$Kategori'");

    if (empty($IDKategori) || empty($Kategori)) {
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Peringatan!',
                text: 'Silahkan Input Data Dengan Lengkap!',
                icon: 'error',
                timer: 2000,
                showCancelButton: false,
                showConfirmButton: false
            });
        });  
        </script>
        ";
    } else if (mysqli_num_rows($cekKategori) != 0) {
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Peringatan!',
                text: 'Data Telah Terdaftar Didalam Sistem!',
                icon: 'error',
                timer: 2000,
                showCancelButton: false,
                showConfirmButton: false
            });
        });  
        </script>
        ";
    } else if (!preg_match("/^[a-zA-Z ]*$/", $Kategori)) {
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Peringatan!',
                text: 'Silahkan Input Kategori Dengan Benar!',
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

if (isset($_POST['tambah-ulasan'])) {
    $InputKode = trim($_POST['IDUlasan']);
    $InputNama = trim($_POST['Nama']);
    $InputUlasan = trim($_POST['Ulasan']);
    $InputFoto = strtolower($_FILES['Foto']['name']);
    $Resource = $_FILES['Foto']['tmp_name'];
    $Check = $_FILES['Foto']['error'];
    $Size = $_FILES['Foto']['size'];
    $Location = "../../assets/images/foto-ulasan/";

    if (empty($InputNama) || empty($InputUlasan)) {
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Peringatan!',
                text: 'Silahkan Input Data Dengan Lengkap!',
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

    if (!preg_match("/^[a-zA-Z ]*$/", $InputNama)) {
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Peringatan!',
                text: 'Silahkan Input Nama Dengan Benar!',
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
                title: 'Peringatan!',
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
                title: 'Peringatan!',
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
                title: 'Peringatan!',
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

if (isset($_POST['tambah-pegawai'])) {
    $IDPegawai = htmlspecialchars(trim($_POST['IDPegawai']));
    $Nama = htmlspecialchars(trim($_POST['Nama']));
    $Gender = htmlspecialchars(trim($_POST['Gender']));
    $Tanggal = htmlspecialchars(trim($_POST['Tanggal']));
    $Alamat = htmlspecialchars(trim($_POST['Alamat']));
    $Telepon = htmlspecialchars(trim($_POST['Telepon']));
    $IDJabatan = htmlspecialchars(trim($_POST['IDJabatan']));

    $InputGambar = strtolower($_FILES['Gambar']['name']);
    $SetResource = $_FILES['Gambar']['tmp_name'];
    $SetCheck = $_FILES['Gambar']['error'];
    $SetSize = $_FILES['Gambar']['size'];
    $SetLocation = "../../assets/images/foto-user/";

    $cekNama = mysqli_query($conn, "SELECT Nama FROM pegawai WHERE Nama = '$Nama'");

    if (empty($Nama) || empty($Gender) || empty($Tanggal) || empty($Alamat) || empty($Telepon) || empty($IDJabatan)) {
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Peringatan!',
                text: 'Silahkan Input Data Dengan Lengkap!',
                icon: 'error',
                timer: 3000,
                showCancelButton: false,
                showConfirmButton: false
            });
        });  
        </script>
        ";
        return false;
    }

    if (!preg_match("/^[a-zA-Z ]*$/", $Nama)) {
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Peringatan!',
                text: 'Silahkan Input Nama Dengan Benar!',
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

    if (!preg_match("/^[a-zA-Z ]*$/", $Alamat)) {
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Peringatan!',
                text: 'Silahkan Input Alamat Dengan Benar!',
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

    if (!preg_match("/^[0-9]*$/", $Telepon)) {
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Peringatan!',
                text: 'Silahkan Input Telepon Dengan Benar!',
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

    if (mysqli_num_rows($cekNama) != 0) {
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Peringatan!',
                text: 'Nama Telah Dipakai!',
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

    if ($SetCheck === 4) {
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Peringatan!',
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
    $GetName = explode(".", $InputGambar);
    $GetExt = end($GetName);

    if (!in_array($GetExt, $ValidExtension)) {
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Peringatan!',
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

    if ($SetSize > 500000) {
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Peringatan!',
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

    move_uploaded_file($SetResource, $SetLocation . $UniqidName);


    $InsertPegawai = mysqli_query($conn, "INSERT INTO pegawai (IDPegawai, Nama, Gender, Tanggal, Alamat, Telepon, IDJabatan, Foto) VALUES ('$IDPegawai', '$Nama', '$Gender', '$Tanggal', '$Alamat', '$Telepon', '$IDJabatan', '$UniqidName')");

    if ($InsertPegawai) {
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

if (isset($_POST['tambah-akun'])) {
    $IDLogin = htmlspecialchars(trim($_POST['IDLogin']));
    $IDPegawai = htmlspecialchars(trim($_POST['IDPegawai']));
    $Username = htmlspecialchars(trim($_POST['Username']));
    $Password = htmlspecialchars(trim($_POST['Password']));
    $IDLevel = htmlspecialchars(trim($_POST['IDLevel']));

    $cekUsername = mysqli_query($conn, "SELECT Username FROM login WHERE Username = '$Username'");

    if (empty($Username) || empty($Password)) {
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Peringatan!',
                text: 'Silahkan Input Data Dengan Lengkap!',
                icon: 'error',
                timer: 2000,
                showCancelButton: false,
                showConfirmButton: false
            });
        });  
        </script>
        ";
    } else if (mysqli_num_rows($cekUsername) != 0) {
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Peringatan!',
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
