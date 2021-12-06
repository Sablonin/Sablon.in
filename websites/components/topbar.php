<!-- Top Bar -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="#"><img src="../assets/images/sablon2.png" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="#"><img src="../assets/images/sablon1.png" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <img src="../assets/images/profil.png" alt="profile" />
                </a>
                <a class="ml-2 nav-link dropdown-toggle font-weight-normal" href="#" data-toggle="dropdown" id="profileDropdown">
                    <?php
                    include '../configs/koneksi.php';
                    $IDPegawai = $_SESSION['IDPegawai'];
                    $GetPegawai = mysqli_query($conn, "SELECT * FROM pegawai WHERE IDPegawai = '$IDPegawai'");
                    $Data = mysqli_fetch_array($GetPegawai);
                    echo $Data['Nama'];
                    ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <div class="dropdown-divider"></div>
                    <a href="process/logout-process" class="dropdown-item">
                        <i class="mdi mdi-logout text-primary"></i>
                        Keluar
                    </a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
<!-- Body Wrapper -->
<div class="container-fluid page-body-wrapper">