<?php
require '../../configs/koneksi.php';

function BarangView()
{
    global $conn;
    $GetBarang = mysqli_query($conn, "SELECT barang.*, kategori.Kategori FROM barang INNER JOIN kategori ON barang.IDKategori = kategori.IDKategori");
    while ($Data = mysqli_fetch_array($GetBarang)) { ?>
        <tr>
            <td><?= $Data['IDBarang'] ?></td>
            <td><?= $Data['Barang'] ?></td>
            <td><?= $Data['Kategori'] ?></td>
            <td><?= $Data['Stok'] ?></td>
        </tr>
    <?php
    }
}

//Mengambil tabel barang
function BarangEdit()
{
    global $conn;
    $GetBarang = mysqli_query($conn, "SELECT barang.*, kategori.Kategori FROM barang INNER JOIN kategori ON barang.IDKategori = kategori.IDKategori");
    while ($Data = mysqli_fetch_array($GetBarang)) { ?>
        <tr>
            <td><?= $Data['IDBarang'] ?></td>
            <td><?= $Data['Barang'] ?></td>
            <td><?= $Data['Kategori'] ?></td>
            <td><?= $Data['Stok'] ?></td>
            <td>
                <form method='POST'>
                    <a href='update-barang?IDBarang=<?= $Data['IDBarang'] ?>'>
                        <button type='button' class='btn btn-social-icon btn-outline-warning'><i class='fa fa-pencil'></i>
                        </button>
                    </a>
                    <button type='button' id='hapus-barang<?= $Data['IDBarang'] ?>' class='btn btn-social-icon btn-outline-danger btn-sm'><i class='fa fa-trash'></i>
                    </button>
                </form>
            </td>
        </tr>
        <script>
            var button = document.querySelector('#hapus-barang<?= $Data['IDBarang'] ?>');
            button.onclick = function() {
                Swal.fire({
                    title: 'Peringatan!',
                    text: "Apakah Anda Ingin Menghapus Data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Confirm'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location.href = 'process/delete-data?IDBarang=<?= $Data['IDBarang'] ?>';
                    }
                })
            }
        </script>
    <?php
    }
}

function JumlahBarang()
{
    global $conn;
    $GetBarang = mysqli_query($conn, "SELECT barang.*, kategori.Kategori FROM barang INNER JOIN kategori ON barang.IDKategori = kategori.IDKategori");
    $JumlahBarang = mysqli_num_rows($GetBarang);
    echo "
    $JumlahBarang
    ";
}


//Mengambil tabel kategori
function Kategori()
{
    global $conn;
    $GetKategori = mysqli_query($conn, "SELECT * FROM kategori");
    while ($Data = mysqli_fetch_array($GetKategori)) {
        echo "
        <tr>
        <td>$Data[IDKategori]</td>
        <td>$Data[Kategori]</td>
        </tr>
        ";
    }
}

function JumlahKategori()
{
    global $conn;
    $GetKategori = mysqli_query($conn, "SELECT * FROM kategori");
    $JumlahKategori = mysqli_num_rows($GetKategori);
    echo "
    $JumlahKategori
    ";
}

//Mengambil tabel pegawai
function Pegawai()
{
    global $conn;
    $GetPegawai = mysqli_query($conn, "SELECT pegawai.*, jabatan.Jabatan FROM pegawai INNER JOIN jabatan ON pegawai.IDJabatan = jabatan.IDJabatan");
    while ($Data = mysqli_fetch_array($GetPegawai)) { ?>
        <tr>
            <td><img src='../../assets/images/foto-user/<?= $Data['Foto'] ?>' /></td>
            <td><?= $Data['Nama'] ?></td>
            <td><?= $Data['Gender'] ?></td>
            <td><?= $Data['Jabatan'] ?></td>
            <td>
                <form action="POST">
                    <a href='data-lanjutan?IDPegawai=<?= $Data['IDPegawai'] ?>'>
                        <button type='button' class='btn btn-social-icon btn-outline-info'>
                            <i class='fa fa-id-card'></i>
                        </button>
                    </a>
                    <a href='update-pegawai?IDPegawai=<?= $Data['IDPegawai'] ?>'>
                        <button type='button' class='btn btn-social-icon btn-outline-warning'>
                            <i class='fa fa-pencil'></i>
                        </button>
                    </a>
                    <button type='button' id='hapus-pegawai<?= $Data['IDPegawai'] ?>' class='btn btn-social-icon btn-outline-danger'>
                        <i class='fa fa-trash'></i>
                    </button>
                </form>
            </td>
        </tr>
        <script>
            var button = document.querySelector('#hapus-pegawai<?= $Data['IDPegawai'] ?>');
            button.onclick = function() {
                Swal.fire({
                    title: 'Peringatan!',
                    text: "Apakah Anda Ingin Menghapus Data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Confirm'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location.href = 'process/delete-data?IDPegawai=<?= $Data['IDPegawai'] ?>';
                    }
                })
            }
        </script>
    <?php
    }
}


function JumlahPegawai()
{
    global $conn;
    $GetPegawai = mysqli_query($conn, "SELECT pegawai.*, jabatan.Jabatan FROM pegawai INNER JOIN jabatan ON pegawai.IDJabatan = jabatan.IDJabatan");
    $JumlahPegawai = mysqli_num_rows($GetPegawai);
    echo "
    $JumlahPegawai
    ";
}

//Mengambil tabel akun
function LoginAkun()
{
    global $conn;
    $GetAkun = mysqli_query($conn, "SELECT login.*, pegawai.Nama, akses.Akses FROM login INNER JOIN pegawai ON login.IDPegawai = pegawai.IDPegawai INNER JOIN akses ON login.IDLevel = akses.IDLevel");
    while ($Data = mysqli_fetch_array($GetAkun)) { ?>
        <tr>
            <td><?= $Data['Nama'] ?></td>
            <td><?= $Data['Username'] ?></td>
            <td><?= $Data['Password'] ?></td>
            <td><?= $Data['Akses'] ?></td>
            <td>
                <form action="POST">
                    <a href='update-akun?IDLogin=<?= $Data['IDLogin'] ?>'>
                        <button type='button' class='btn btn-social-icon btn-outline-warning'><i class='fa fa-pencil'></i>
                        </button>
                    </a>
                    <button type='button' id='hapus-akun<?= $Data['IDLogin'] ?>' class='btn btn-social-icon btn-outline-danger btn-sm'><i class='fa fa-trash'></i>
                    </button>
                </form>
            </td>
        </tr>
        <script>
            var button = document.querySelector('#hapus-akun<?= $Data['IDLogin'] ?>');
            button.onclick = function() {
                Swal.fire({
                    title: 'Peringatan!',
                    text: "Apakah Anda Ingin Menghapus Data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Confirm'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location.href = 'process/delete-data?IDLogin=<?= $Data['IDLogin'] ?>';
                    }
                })
            }
        </script>
    <?php
    }
}


//Mengambil tabel riwayat
function Riwayat()
{
    global $conn;
    $GetRiwayat = mysqli_query($conn, "SELECT * FROM riwayat");
    while ($Data = mysqli_fetch_array($GetRiwayat)) {
        echo "
        <tr>
            <td>$Data[IDRiwayat]</td>
            <td>$Data[Barang]</td>
            <td>$Data[Kategori]</td>
            <td>$Data[Stok]</td>
            <td>$Data[Status]</td>
            <td>$Data[Time]</td>
        </tr>
        ";
    }
}

function JumlahRiwayat()
{
    global $conn;
    $GetRiwayat = mysqli_query($conn, "SELECT * FROM riwayat");
    $JumlahRiwayat = mysqli_num_rows($GetRiwayat);
    echo "
    $JumlahRiwayat
    ";
}

//Mengambil tabel ulasan
function Ulasan()
{
    global $conn;
    $GetUlasan = mysqli_query($conn, "SELECT * FROM ulasan");
    while ($Data = mysqli_fetch_array($GetUlasan)) { ?>
        <tr>
            <td><?= $Data['IDUlasan'] ?></td>
            <td><img src='../../assets/images/foto-ulasan/<?= $Data['Foto'] ?>' /></td>
            <td><?= $Data['Nama'] ?></td>
            <td><?= $Data['Ulasan'] ?></td>
            <td>
                <form method='POST'>
                    <a href='update-ulasan?IDUlasan=<?= $Data['IDUlasan'] ?>'>
                        <button type='button' class='btn btn-social-icon btn-outline-warning'><i class='fa fa-pencil'></i>
                        </button>
                    </a>
                    <button type='button' id='hapus-ulasan<?= $Data['IDUlasan'] ?>' class='btn btn-social-icon btn-outline-danger btn-sm'><i class='fa fa-trash'></i>
                    </button>
                </form>
            </td>
        </tr>
        <script>
            var button = document.querySelector('#hapus-ulasan<?= $Data['IDUlasan'] ?>');
            button.onclick = function() {
                Swal.fire({
                    title: 'Peringatan!',
                    text: "Apakah Anda Ingin Menghapus Data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Confirm'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location.href = 'process/delete-data?IDUlasan=<?= $Data['IDUlasan'] ?>';
                    }
                })
            }
        </script>
    <?php
    }
}

function UlasanView()
{
    global $conn;
    $GetUlasan = mysqli_query($conn, "SELECT * FROM ulasan");
    while ($Data = mysqli_fetch_array($GetUlasan)) { ?>
        <tr>
            <td><?= $Data['IDUlasan'] ?></td>
            <td><img src='../../assets/images/foto-ulasan/<?= $Data['Foto'] ?>' /></td>
            <td><?= $Data['Nama'] ?></td>
            <td><?= $Data['Ulasan'] ?></td>
        </tr>
<?php
    }
}

function JumlahUlasan()
{
    global $conn;
    $GetUlasan = mysqli_query($conn, "SELECT * FROM ulasan");
    $JumlahUlasan = mysqli_num_rows($GetUlasan);
    echo "
    $JumlahUlasan
    ";
}

function UlasanActivity()
{
    global $conn;
    $GetData = mysqli_query($conn, "SELECT * FROM ulasan ORDER BY IDUlasan DESC LIMIT 5");
    while ($Data = mysqli_fetch_array($GetData)) {
        echo "
            <div class='list d-flex align-items-center border-bottom pb-3 mt-3'>
                    <img class='img-sm rounded-circle' src='../../assets/images/foto-ulasan/$Data[Foto]' alt=''>
                <div class='wrapper w-100 ml-3'>
                    <p><b>$Data[Nama]</b> Telah Memberikan Ulasan</p>
                </div>
            </div>       
        ";
    }
}

function BarangActivity()
{
    global $conn;
    $GetData =  mysqli_query($conn, "SELECT * FROM barang ORDER BY IDBarang DESC LIMIT 5");
    while ($Data = mysqli_fetch_array($GetData)) {
        echo "
            <li>
                <div class='list d-flex align-items-center border-bottom pb-3 mt-3'>
                    <div class='wrapper w-100 ml-3 mt-2'>
                        <p><b>$Data[Barang]</b> Telah Di Perbaharui</p>
                    </div>
                </div>       
            </li>    
        ";
    }
}
