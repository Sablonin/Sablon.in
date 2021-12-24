<?php include 'components/top-link.php'; ?>
<?php require 'process/session-login.php'; ?>
<?php require 'process/session-admin.php'; ?>
<?php include 'components/navbar.php'; ?>
<?php include 'components/sidebar.php'; ?>


<!-- Start Content Wrapper -->
<div class="content-wrapper">

    <div class="col-lg-10 mx-auto grid-margin stretch-card">
        <div class="card">
            <div class="card-body col-12 mx-auto">
                <?php
                include '../../configs/koneksi.php';

                $IDPegawai = $_GET['IDPegawai'];
                $GetPegawai = mysqli_query($conn, "SELECT pegawai.*, jabatan.Jabatan FROM pegawai INNER JOIN jabatan ON pegawai.IDJabatan = jabatan.IDJabatan WHERE IDPegawai = '$IDPegawai'");
                $DataPegawai = mysqli_fetch_array($GetPegawai);
                ?>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="border-bottom text-center pb-4 mt-5">
                            <?php
                            $GetFoto = mysqli_query($conn, "SELECT * FROM pegawai WHERE IDPegawai = '$IDPegawai'");
                            while ($Data = mysqli_fetch_array($GetFoto)) {
                                echo "
                                    <div class='item'>
                                        <img src='../../assets/images/foto-user/$Data[Foto]' height='230' class='img-lg rounded-circle mb-3' />
                                    </div>
                                ";
                            }
                            ?>
                        </div>
                        <a href="data-pegawai">
                            <button type="button" class="btn btn-secondary btn-block">Kembali</button>
                        </a>
                    </div>
                    <div class="col-lg-8">
                        <div class="d-flex justify-content-between">
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
                            </div>
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