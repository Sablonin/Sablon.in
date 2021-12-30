<?php
require '../../koneksi.php';
header("Content-Type:application/json");

$Response = array();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['IDKategori']) and isset($_POST['Kategori'])) {

    $IDKategori = $_POST['IDKategori'];
    $Kategori = $_POST['Kategori'];

    $Response["status"] = [
      "code" => 200,
      "description" => "Berhasil menambah data kategori"
    ];

    $Insert = "INSERT INTO kategori (
          IDKategori,
          Kategori
      )
      VALUES (
          '$IDKategori',
          '$Kategori'
      )";

    mysqli_query($conn, $Insert);

    $Response["results"] = [
      "IDKategori" => $IDKategori,
      "Kategori" => $Kategori
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
