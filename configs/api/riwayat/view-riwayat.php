<?php
require '../../koneksi.php';
header("Content-Type:application/json");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $query_data = "SELECT * FROM riwayat";
  $result = mysqli_query($conn, $query_data);
  $json_array = array();
  $response = "";

  if (isset($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
      $json_array[] = $row;
    }
    $response = array(
      'code' => 200,
      'status' => 'Successful',
      'user_list' => $json_array
    );
  } else {
    $response = array(
      'code' => 400,
      'status' => 'Error',
      'user_list' => 0
    );
  }
  print(json_encode($response));
  mysqli_close($conn);
}
