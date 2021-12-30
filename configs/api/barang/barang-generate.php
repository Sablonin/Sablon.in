<?php
require "../../koneksi.php";
header("Content-Type:application/json");

$GetTableBR = mysqli_query($conn, "SELECT MAX(IDBarang)
		AS
			IDBarang
		FROM
		barang
	");
$CekData = mysqli_affected_rows($conn);

if ($CekData > 0) {
  $Response["code"] = 1;
  $Response["status"] = "Kode Barang Tersedia";
  $Response["data"] = array();

  $GetData = mysqli_fetch_array($GetTableBR);
  $GetMaxValue = $GetData['IDBarang'];
  $SetNumberKodeBR = (int) substr($GetMaxValue, 3);
  $SetNumberKodeBR++;
  $SetCharKodeBR = "BR";
  $GenerateKodeBR = $SetCharKodeBR . sprintf("%03s", $SetNumberKodeBR);

  $F["IDBarang"] = $GenerateKodeBR;
  array_push($Response["data"], $F);
} else {
  $Response["code"] = 0;
  $Response["status"] = "Kode Barang Tidak Tersedia";
}

echo json_encode($Response);
mysqli_close($conn);
