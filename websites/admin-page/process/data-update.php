<?php
require '../../configs/koneksi.php';

if (isset($_POST['update-pegawai'])) {
    $IDPegawai = trim($_POST['IDPegawai']);
    $Nama = htmlspecialchars(trim($_POST['Nama']));
    $Gender = htmlspecialchars(trim($_POST['Gender']));
    $Tanggal = htmlspecialchars(trim($_POST['Tanggal']));
    $Alamat = htmlspecialchars(trim($_POST['Alamat']));
    $Telepon = htmlspecialchars(trim($_POST['Telepon']));
    $NoUpdate = $_POST['IDGambar'];

    $UpdateGambar = strtolower($_FILES['Gambar']['name']);
    $SetResource = $_FILES['Gambar']['tmp_name'];
    $SetCheck = $_FILES['Gambar']['error'];
    $SetSize = $_FILES['Gambar']['size'];
    $SetLocation = "../../assets/images/foto-user/";

    $ValidExtension = ["jpg", "jpeg", "png"];
    $GetNameFile = explode(".", $UpdateGambar);
    $GetExt = end($GetNameFile);

    $UniqidName = uniqid();
    $UniqidName .= ".";
    $UniqidName .= $GetExt;

    if (empty($Nama) || empty($Alamat) || empty($Telepon)) {
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
    } else if (!preg_match("/^[a-zA-Z ]*$/", $Nama)) {
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
    } else if (!preg_match("/^[a-zA-Z ]*$/", $Alamat)) {
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
    } else if (!preg_match("/^[0-9]*$/", $Telepon)) {
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
    } else if ($_FILES['Gambar']['error'] === 4) {
        mysqli_query($conn, "UPDATE pegawai SET Nama = '$Nama', Gender = '$Gender', Tanggal = '$Tanggal', Alamat = '$Alamat', Telepon = '$Telepon', Foto = '$NoUpdate' WHERE IDPegawai = '$IDPegawai'");
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
    } else {
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
        } else if ($SetSize > 500000) {
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
        } else {
            $GetPegawai = mysqli_query($conn, "SELECT * FROM pegawai WHERE IDPegawai = '$IDPegawai'");
            $DataPegawai = mysqli_fetch_array($GetPegawai);
            $DeleteGambar = unlink("../../assets/images/foto-user/$DataPegawai[Foto]");
            if ($DeleteGambar) {
                move_uploaded_file($SetResource, $SetLocation . $UniqidName);
                mysqli_query($conn, "UPDATE pegawai SET Nama = '$Nama', Gender = '$Gender', Tanggal = '$Tanggal', Alamat = '$Alamat', Telepon = '$Telepon', Foto = '$UniqidName' WHERE IDPegawai = '$IDPegawai'");
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
    }
}

if (isset($_POST['update-barang'])) {
    $IDBarang = htmlspecialchars(trim($_POST['IDBarang']));
    $Barang = htmlspecialchars(trim($_POST['Barang']));
    $IDKategori = htmlspecialchars(trim($_POST['IDKategori']));
    $Stok = htmlspecialchars(trim($_POST['Stok']));

    if (empty($Barang) || empty($Stok)) {
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
                text: 'Silahkan Input Password!',
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
                title: 'Berhasil!',
                text: 'Data Berhasil DiUpdate!',
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

if (isset($_POST['update-ulasan'])) {
    $IDUlasan = $_POST['IDUlasan'];
    $Nama = htmlspecialchars(trim($_POST['Nama']));
    $Ulasan = htmlspecialchars(trim($_POST['Ulasan']));
    $NoUpdate = $_POST['IDFoto'];

    $UpdateFoto = strtolower($_FILES['Foto']['name']);
    $Resource = $_FILES['Foto']['tmp_name'];
    $Check = $_FILES['Foto']['error'];
    $Size = $_FILES['Foto']['size'];
    $Location = "../../assets/images/foto-ulasan/";

    $ValidExtension = ["jpg", "jpeg", "png"];
    $GetNameFile = explode(".", $UpdateFoto);
    $GetExt = end($GetNameFile);

    $UniqName = uniqid();
    $UniqName .= ".";
    $UniqName .= $GetExt;

    if (empty($Nama) || empty($Ulasan)) {
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
    } else if (!preg_match("/^[a-zA-Z ]*$/", $Nama)) {
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
    } else if ($_FILES['Foto']['error'] === 4) {
        mysqli_query($conn, "UPDATE ulasan SET Nama = '$Nama', Ulasan = '$Ulasan', Foto = '$NoUpdate' WHERE IDUlasan = '$IDUlasan'");
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
            window.location.replace('data-ulasan');
        },2000);
        </script>
        ";
    } else {
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
        } else if ($Size > 500000) {
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
        } else {
            $GetUlasan = mysqli_query($conn, "SELECT * FROM ulasan WHERE IDUlasan = '$IDUlasan'");
            $DataUlasan = mysqli_fetch_array($GetUlasan);
            if ($DataUlasan) {
                move_uploaded_file($Resource, $Location . $UniqName);
                mysqli_query($conn, "UPDATE ulasan SET Nama = '$Nama', Ulasan = '$Ulasan', Foto = '$UniqName' WHERE IDUlasan = '$IDUlasan'");
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
                    window.location.replace('data-ulasan');
                },2000);
                </script>
                ";
            }
        }
    }
}
