<?php
require 'process/session-level.php';

if ($IDLevel == 1) {
    echo '
        <!-- Start Sidebar -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard">
                        <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-barang" aria-expanded="false" aria-controls="ui-barang">
                        <i class="mdi mdi-package-variant-closed menu-icon"></i>
                        <span class="menu-title">Kelola Barang</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-barang">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="data-barang">Data Barang</a></li>
                            <li class="nav-item"> <a class="nav-link" href="input-barang">Input Barang</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-kategori" aria-expanded="false" aria-controls="ui-kategori">
                        <i class="mdi mdi-package-variant menu-icon"></i>
                        <span class="menu-title">Kelola Kategori</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-kategori">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="data-kategori">Data Kategori</a></li>
                            <li class="nav-item"> <a class="nav-link" href="input-kategori">Input Kategori</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-pegawai" aria-expanded="false" aria-controls="ui-pegawai">
                        <i class="mdi mdi-security-account-outline menu-icon"></i>
                        <span class="menu-title">Kelola Pegawai</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-pegawai">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="data-pegawai">Data Pegawai</a></li>
                            <li class="nav-item"> <a class="nav-link" href="input-pegawai">Input Pegawai</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-akun" aria-expanded="false" aria-controls="ui-akun">
                        <i class="mdi mdi-account-key menu-icon"></i>
                        <span class="menu-title">Kelola Akun</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-akun">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="data-akun">Data Akun</a></li>
                            <li class="nav-item"> <a class="nav-link" href="input-akun">Register Akun</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-ulasan" aria-expanded="false" aria-controls="ui-ulasan">
                        <i class="mdi mdi-email-outline menu-icon"></i>
                        <span class="menu-title">Kelola Ulasan</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-ulasan">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="data-ulasan">Data Ulasan</a></li>
                            <li class="nav-item"> <a class="nav-link" href="input-ulasan">Input Ulasan</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="data-riwayat">
                        <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                        <span class="menu-title">Riwayat Barang</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar -->
    ';
} else if ($IDLevel == 2) {
    echo '
        <!-- Start Sidebar -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard">
                        <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="data-barang">
                        <i class="mdi mdi-package-variant-closed menu-icon"></i>
                        <span class="menu-title">Kelola Barang</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="data-kategori">
                        <i class="mdi mdi-package-variant menu-icon"></i>
                        <span class="menu-title">Kelola Kategori</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="data-riwayat">
                        <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                        <span class="menu-title">Riwayat Barang</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="data-ulasan">
                        <i class="mdi mdi-email-outline menu-icon"></i>
                        <span class="menu-title">Kelola Ulasan</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar -->
    ';
}
?>
<!-- Main Panel -->
<div class="main-panel">