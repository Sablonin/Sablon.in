<?php include 'components/top-link.php'; ?>
<?php include 'process/session.php' ?>
<?php include 'components/topbar.php'; ?>
<?php include 'components/sidebar.php'; ?>


<!-- Start Content Wrapper -->
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card bg-gradient-primary text-white text-center card-shadow-primary">
                <div class="card-body">
                    <h6 class="font-weight-normal">Data Barang</h6>
                    <h2 class="mb-0"><?php
                                        include 'process/data-table.php';
                                        JumlahBarang();
                                        ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card bg-gradient-danger text-white text-center card-shadow-danger">
                <div class="card-body">
                    <h6 class="font-weight-normal">Data Kategori</h6>
                    <h2 class="mb-0"><?php JumlahKategori() ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card bg-gradient-warning text-white text-center card-shadow-warning">
                <div class="card-body">
                    <h6 class="font-weight-normal">Data Pegawai</h6>
                    <h2 class="mb-0"><?php JumlahPegawai() ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card bg-gradient-info text-white text-center card-shadow-info">
                <div class="card-body">
                    <h6 class="font-weight-normal">Data Riwayat</h6>
                    <h2 class="mb-0"><?php JumlahRiwayat() ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row grid-margin">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="owl-carousel owl-theme loop">
                        <div class="item">
                            <img src="../assets/images/carousel/banner_7.jpg" alt="image" />
                        </div>
                        <div class="item">
                            <img src="../assets/images/carousel/banner_8.jpg" alt="image" />
                        </div>
                        <div class="item">
                            <img src="../assets/images/carousel/banner_9.jpg" alt="image" />
                        </div>
                        <div class="item">
                            <img src="../assets/images/carousel/banner_10.jpg" alt="image" />
                        </div>
                        <div class="item">
                            <img src="../assets/images/carousel/banner_11.jpg" alt="image" />
                        </div>
                        <div class="item">
                            <img src="../assets/images/carousel/banner_12.jpg" alt="image" />
                        </div>
                        <div class="item">
                            <img src="../assets/images/carousel/banner_2.jpg" alt="image" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content Wrapper -->

<?php include 'components/footer.php'; ?>
<?php include 'components/bottom-link.php'; ?>