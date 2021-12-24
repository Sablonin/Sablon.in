<?php include 'components/top-link.php'; ?>
<?php require 'process/session-login.php'; ?>
<?php require 'process/session-admin.php'; ?>
<?php include 'components/navbar.php'; ?>
<?php include 'components/sidebar.php'; ?>



<!-- Start Content Wrapper -->
<div class="content-wrapper">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Data Pegawai</h4>
                <?php require 'process/data-update.php' ?>
                <form action="" method="POST" enctype="multipart/form-data" class="form-sample">
                    <?php
                    require '../../configs/koneksi.php';
                    $IDPegawai = $_GET['IDPegawai'];
                    $GetPegawai = mysqli_query($conn, "SELECT pegawai.*, jabatan.Jabatan FROM pegawai INNER JOIN jabatan ON pegawai.IDJabatan = jabatan.IDJabatan WHERE IDPegawai = '$IDPegawai'");
                    $DataPegawai = mysqli_fetch_array($GetPegawai);
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input name="IDPegawai" type="text" class="form-control" value="<?php echo $DataPegawai['IDPegawai']; ?>" hidden />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="Nama" class="col-sm-3 col-form-label">Nama Pegawai</label>
                                <div class="col-sm-9">
                                    <input id="Nama" name="Nama" type="text" class="form-control" oninput="this.value = this.value.replace(/[^a-zA-Z ]/, '')" minlength="2" maxlength="50" value="<?php echo $DataPegawai['Nama']; ?>" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="Gender" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <select id="Gender" name="Gender" class="form-control" required>
                                        <option value="Laki-Laki" <?php if ($DataPegawai['Gender'] == 'Laki-Laki') {
                                                                        echo "selected";
                                                                    } ?>>Laki-Laki</option>
                                        <option value="Perempuan" <?php if ($DataPegawai['Gender'] == 'Perempuan') {
                                                                        echo "selected";
                                                                    } ?>>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="Alamat" class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <input id="Alamat" name="Alamat" type="text" class="form-control" oninput="this.value = this.value.replace(/[^a-zA-Z ]/, '')" minlength="2" maxlength="50" value="<?php echo $DataPegawai['Alamat']; ?>" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="Tanggal" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input id="Tanggal" name="Tanggal" type="date" class="form-control" value="<?php echo $DataPegawai['Tanggal']; ?>" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="Telepon" class="col-sm-3 col-form-label">Telepon</label>
                                <div class="col-sm-9">
                                    <input id="Telepon" name="Telepon" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '')" onKeyPress="if(this.value.length==12) return false;" value="<?php echo $DataPegawai['Telepon'] ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="Jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                                <div class="col-sm-9">
                                    <input id="Jabatan" name="IDJabatan" type="text" class="form-control" value="<?php echo $DataPegawai['Jabatan']; ?>" readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="">Update Foto (Opsional)</label>
                                    <input type="file" name="Gambar" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Contoh File : .jpg / .jpeg / .png">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">Pilih</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input name="IDGambar" type="text" class="form-control" value="<?php echo $DataPegawai['Foto']; ?>" hidden />
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="update-pegawai" class="btn btn-sm btn-warning">
                        <i class="mdi mdi-account-edit"></i>Update
                    </button>
                    <a href="data-pegawai">
                        <button type="button" class="btn btn-sm btn-outline-secondary">
                            <i class="mdi mdi-step-backward"></i>Kembali
                        </button>
                    </a>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- End Content Wrapper -->

<?php include 'components/footer.php'; ?>
<?php include 'components/bottom-link.php'; ?>