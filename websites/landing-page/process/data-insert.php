<?php
require '../../configs/koneksi.php';


function GenerateUlasan()
{
  global $conn;
  $GetTableGT = mysqli_query($conn, "SELECT MAX(IDUlasan) AS KodeUN FROM ulasan");
  $GetKodeGT = mysqli_fetch_array($GetTableGT);
  $GetMaxValue = $GetKodeGT['KodeUN'];

  $SetNumberKodeGT = (int) substr($GetMaxValue, 3);
  $SetNumberKodeGT++;
  $SetCharKodeGT = "UN";

  $GenerateKodeGT = $SetCharKodeGT . sprintf("%03s", $SetNumberKodeGT);
  echo $GenerateKodeGT;
}

function GenerateFoto()
{
  $filename = "default.png";
  echo $filename;
}


if (isset($_POST['kirim-ulasan'])) {
  $IDUlasan = trim($_POST['IDUlasan']);
  $Foto = trim($_POST['Foto']);
  $Nama = htmlspecialchars(trim($_POST['Nama']));
  $Ulasan = htmlspecialchars(trim($_POST['Ulasan']));

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
    window.setTimeout(function(){ 
        window.location.replace('index#form5-19');
    },2000);
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
    window.setTimeout(function(){ 
      window.location.replace('index#form5-19');
    },2000); 
    </script>
    ";
  } else {
    mysqli_query($conn, "INSERT INTO ulasan(IDUlasan, Nama, Ulasan, Foto) VALUES ('$IDUlasan', '$Nama' , '$Ulasan', '$Foto')");
    echo "
    <script>
    setTimeout(function() {
        Swal.fire({
            title: 'Peringatan!',
            text: 'Ulasan Berhasil Dikirim!',
            icon: 'success',
            timer: 2000,
            showCancelButton: false,
            showConfirmButton: false
        });
    });  
    window.setTimeout(function(){ 
        window.location.replace('index#form5-19');
    },2000);
    </script>
    ";
  }
}
