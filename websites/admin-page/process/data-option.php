<?php
require '../../configs/koneksi.php';

function AmbilJabatan()
{
    global $conn;
    $GetJabatan = mysqli_query($conn, "SELECT * FROM jabatan");
    while ($Data = mysqli_fetch_array($GetJabatan)) {
        echo "
        <option value='$Data[IDJabatan]'>
        $Data[Jabatan]
        </option>
        ";
    }
}

function AmbilKategori()
{
    global $conn;
    $GetKategori = mysqli_query($conn, "SELECT * FROM kategori");
    while ($Data = mysqli_fetch_array($GetKategori)) {
        echo "
        <option value='$Data[IDKategori]'>
        $Data[Kategori]
        </option>
        ";
    }
}

function AmbilNama()
{
    global $conn;
    $GetNama = mysqli_query($conn, "SELECT * FROM pegawai");
    while ($Data = mysqli_fetch_array($GetNama)) {
        echo "
        <option value='$Data[IDPegawai]'>
        $Data[Nama]
        </option>
        ";
    }
}


function AmbilAkses()
{
    global $conn;
    $GetLevel = mysqli_query($conn, "SELECT * FROM akses");
    while ($DataLevel = mysqli_fetch_array($GetLevel)) {
        echo "
        <option value='$DataLevel[IDLevel]'>
        $DataLevel[Akses]
        </option>
        ";
    }
}
