<?php
require '../../koneksi.php';
header("Content-Type:application/json");

$Response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $IDBarang = $_POST["IDBarang"];

  $query = "SELECT * FROM barang WHERE IDBarang = '$IDBarang'";
  $execute = mysqli_query($conn, $query);
  $test = mysqli_affected_rows($conn);

  if ($test > 0) {
    $Response["kode"] = 1;
    $Response["pesan"] = "Successful";
    $Response["data"] = array();

    while ($get = mysqli_fetch_object($execute)) {
      $Field['IDBarang'] = $get->IDBarang;
      $Field['Barang'] = $get->Barang;
      $Field['IDKategori'] = $get->IDKategori;
      $Field['Stok'] = $get->Stok;

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
