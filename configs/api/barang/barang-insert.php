<?php
require '../../koneksi.php';
header("Content-Type:application/json");

$Response = array();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['IDBarang']) and isset($_POST['Barang']) and isset($_POST['IDKategori']) and isset($_POST['Stok'])) {

    $IDBarang = $_POST['IDBarang'];
    $Barang = $_POST['Barang'];
    $IDKategori = $_POST['IDKategori'];
    $Stok = $_POST['Stok'];

    $Response["status"] = [
      "code" => 200,
      "description" => "Berhasil menambah data barang"
    ];

    $Insert = "INSERT INTO barang (
          IDBarang,
          Barang,
          IDKategori,
          Stok
      )
      VALUES (
          '$IDBarang',
          '$Barang',
          '$IDKategori',
          '$Stok'
      )";

    mysqli_query($conn, $Insert);

    $Response["results"] = [
      "IDBarang" => $IDBarang,
      "Barang" => $Barang,
      "IDKategori" => $IDKategori,
      "Stok" => $Stok
    ];
  } else {
    $Response["status"] = [
      "code" => 400,
      "description" => "Parameter invalid"
    ];
  }
} else {
  $Response["status"] = [
    "code" => 400,
    "description" => "Metode pengiriman tidak valid"
  ];
}

echo json_encode($Response);
