<?php include 'components/top-link.php'; ?>
<?php include 'process/session.php' ?>
<?php include 'components/topbar.php'; ?>
<?php include 'components/sidebar.php'; ?>

<!-- Start Content Wrapper -->
<div class="content-wrapper">

    <div class="col-lg-10 mx-auto grid-margin stretch-card">
        <div class="card">
            <div class="card-body col-10 mx-auto">
                <?php
                include '../configs/koneksi.php';

                $IDPegawai = $_GET['IDPegawai'];
                $GetPegawai = mysqli_query($conn, "SELECT pegawai.*, jabatan.Jabatan FROM pegawai INNER JOIN jabatan ON pegawai.IDJabatan = jabatan.IDJabatan WHERE IDPegawai = '$IDPegawai'");
                $DataPegawai = mysqli_fetch_array($GetPegawai);
                ?>
                <h4 class="card-title">Data Pegawai</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <th>Data</th>
                            <th>Informasi</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Nama
                                </td>
                                <td>
                                    <?php echo $DataPegawai['Nama']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Jenis Kelamin
                                </td>
                                <td>
                                    <?php echo $DataPegawai['Gender']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tanggal Lahir
                                </td>
                                <td>
                                    <?php echo $DataPegawai['Tanggal']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Alamat
                                </td>
                                <td>
                                    <?php echo $DataPegawai['Alamat']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Telepon
                                </td>
                                <td>
                                    <?php echo $DataPegawai['Telepon']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Status
                                </td>
                                <td>
                                    <?php echo $DataPegawai['Jabatan']; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="data-pegawai">
                        <button type="button" class="mt-4 btn btn-sm btn-secondary">
                            <i class="mdi mdi-step-backward"></i>Kembali
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End Content Wrapper -->

<?php include 'components/footer.php'; ?>
<?php include 'components/bottom-link.php'; ?>