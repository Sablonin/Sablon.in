<?php
require '../../koneksi.php';
header("Content-Type:application/json");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

  $username = $_GET['Username'];
  $password = $_GET['Password'];

  $query_check = "SELECT * FROM login WHERE Username = '$username'";
  $check = mysqli_fetch_array(mysqli_query($conn, $query_check));
  $json_array = array();
  $response = "";

  if (isset($check)) {
    $query_check_pass = "select * from login where Username = '$username' and Password = '$password'";
    $query_pass_result = mysqli_query($conn, $query_check_pass);
    $check_password = mysqli_fetch_array($query_pass_result);
    if (isset($check_password)) {
      $query_pass_result = mysqli_query($conn, $query_check_pass);
      while ($row = mysqli_fetch_assoc($query_pass_result)) {
        $json_array[] = $row;
      }
      $response = array(
        'code' => 200,
        'status' => 'Sukses',
        'user_list' => $json_array
      );
    } else {
      $response = array(
        'code' => 401,
        'status' => 'Password salah, periksa kembali!',
        'user_list' => $json_array
      );
    }
  } else {
    $response = array(
      'code' => 404,
      'status' => 'Data tidak ditemukan',
      'user_list' => $json_array
    );
  }
  print(json_encode($response));
  mysqli_close($conn);
}
