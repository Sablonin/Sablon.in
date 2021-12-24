<?php
require '../../configs/koneksi.php';

function GeneratePegawai()
{
    global $conn;
    $GetTableGT = mysqli_query($conn, "SELECT MAX(IDPegawai) AS KodePG FROM pegawai");
    $GetKodeGT = mysqli_fetch_array($GetTableGT);
    $GetMaxValue = $GetKodeGT['KodePG'];

    $SetNumberKodeGT = (int) substr($GetMaxValue, 3);
    $SetNumberKodeGT++;
    $SetCharKodeGT = "PG";

    $GenerateKodeGT = $SetCharKodeGT . sprintf("%03s", $SetNumberKodeGT);
    echo $GenerateKodeGT;
}

function GenerateBarang()
{
    global $conn;
    $GetTableGT = mysqli_query($conn, "SELECT MAX(IDBarang) AS KodeBR FROM barang");
    $GetKodeGT = mysqli_fetch_array($GetTableGT);
    $GetMaxValue = $GetKodeGT['KodeBR'];

    $SetNumberKodeGT = (int) substr($GetMaxValue, 3);
    $SetNumberKodeGT++;
    $SetCharKodeGT = "BR";

    $GenerateKodeGT = $SetCharKodeGT . sprintf("%03s", $SetNumberKodeGT);
    echo $GenerateKodeGT;
}


function GenerateAkun()
{
    global $conn;
    $GetTableGT = mysqli_query($conn, "SELECT MAX(IDLogin) AS KodeLG FROM login");
    $GetKodeGT = mysqli_fetch_array($GetTableGT);
    $GetMaxValue = $GetKodeGT['KodeLG'];

    $SetNumberKodeGT = (int) substr($GetMaxValue, 3);
    $SetNumberKodeGT++;
    $SetCharKodeGT = "LG";

    $GenerateKodeGT = $SetCharKodeGT . sprintf("%03s", $SetNumberKodeGT);
    echo $GenerateKodeGT;
}

function GenerateKategori()
{
    global $conn;
    $GetTableGT = mysqli_query($conn, "SELECT MAX(IDKategori) AS KodeKG FROM kategori");
    $GetKodeGT = mysqli_fetch_array($GetTableGT);
    $GetMaxValue = $GetKodeGT['KodeKG'];

    $SetNumberKodeGT = (int) substr($GetMaxValue, 3);
    $SetNumberKodeGT++;
    $SetCharKodeGT = "KG";

    $GenerateKodeGT = $SetCharKodeGT . sprintf("%03s", $SetNumberKodeGT);
    echo $GenerateKodeGT;
}

function GenerateLogin()
{
    global $conn;
    $GetTableGT = mysqli_query($conn, "SELECT MAX(IDLogin) AS KodeLG FROM login");
    $GetKodeGT = mysqli_fetch_array($GetTableGT);
    $GetMaxValue = $GetKodeGT['KodeLG'];

    $SetNumberKodeGT = (int) substr($GetMaxValue, 3);
    $SetNumberKodeGT++;
    $SetCharKodeGT = "LG";

    $GenerateKodeGT = $SetCharKodeGT . sprintf("%03s", $SetNumberKodeGT);
    echo $GenerateKodeGT;
}

function GenerateUlasan()
{
    global $conn;
    $GetTableGT = mysqli_query($conn, "SELECT MAX(IDUlasan) AS KodeUN FROM ulasan");
    $GetKodeGT = mysqli_fetch_array($GetTableGT);
    $GetMaxValue = $GetKodeGT['KodeUN'];

    $SetNumberKodeGT = (int) substr($GetMaxValue, 3);
    $SetNumberKodeGT++;
    $SetCharKodeGT = "UN";

    $GenerateKodeGT = $SetCharKodeGT . sprintf("%03s", $SetNumberKodeGT);
    echo $GenerateKodeGT;
}
