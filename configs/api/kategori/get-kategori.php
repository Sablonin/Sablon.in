<?php
require '../../koneksi.php';
header("Content-Type:application/json");

$Response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $IDKategori = $_POST["IDKategori"];

  $query = "SELECT * FROM kategori WHERE IDKategori = '$IDKategori'";
  $execute = mysqli_query($conn, $query);
  $test = mysqli_affected_rows($conn);

  if ($test > 0) {
    $Response["kode"] = 1;
    $Response["pesan"] = "Successful";
    $Response["data"] = array();

    while ($get = mysqli_fetch_object($execute)) {
      $Field['IDKategori'] = $get->IDKategori;
      $Field['Kategori'] = $get->Kategori;

      array_push($Response["data"], $Field);
    }
  } else {
    $Response["kode"] = 0;
    $Response["pesan"] = "Data Tidak ada";
  }
} else {
  $Response["kode"] = 0;
  $Response["pesan"] = "Error";
}

echo json_encode($Response);
mysqli_close($conn);
