<?php
require '../../configs/koneksi.php';
$IDLevel = $_SESSION['IDLevel'];

$GetDataLevel = mysqli_query($conn, "SELECT * FROM login where IDLevel = '$IDLevel'");
$GetLevel = mysqli_fetch_array($GetDataLevel);
