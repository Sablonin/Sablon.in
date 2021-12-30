<?php
require "../../koneksi.php";
header("Content-Type:application/json");

$GetTableKG = mysqli_query($conn, "SELECT MAX(IDKategori)
		AS
			IDKategori
		FROM
		kategori
	");
$CekData = mysqli_affected_rows($conn);

if ($CekData > 0) {
  $Response["code"] = 1;
  $Response["status"] = "Kode Kategori Tersedia";
  $Response["data"] = array();

  $GetData = mysqli_fetch_array($GetTableKG);
  $GetMaxValue = $GetData['IDKategori'];
  $SetNumberKodeKG = (int) substr($GetMaxValue, 3);
  $SetNumberKodeKG++;
  $SetCharKodeKG = "KG";
  $GenerateKodeKG = $SetCharKodeKG . sprintf("%03s", $SetNumberKodeKG);

  $F["IDKategori"] = $GenerateKodeKG;
  array_push($Response["data"], $F);
} else {
  $Response["code"] = 0;
  $Response["status"] = "Kode Kategori Tidak Tersedia";
}

echo json_encode($Response);
mysqli_close($conn);
