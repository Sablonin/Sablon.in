<?php
require '../../koneksi.php';
header("Content-Type:application/json");

$Response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $IDBarang = $_POST["IDBarang"];

  $query = "DELETE FROM barang WHERE IDBarang = '$IDBarang'";
  $execute = mysqli_query($conn, $query);
  $test = mysqli_affected_rows($conn);

  if ($test > 0) {
    $Response["kode"] = 1;
    $Response["pesan"] = "Succesful";
  } else {
    $Response["kode"] = 0;
    $Response["pesan"] = "Tidak Ada Data";
  }
} else {
  $Response["kode"] = 0;
  $Response["pesan"] = "Error";
}

echo json_encode($Response);
mysqli_close($conn);
