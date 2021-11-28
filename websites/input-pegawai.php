<?php include 'components/top-link.php'; ?>
<?php include 'process/session.php' ?>
<?php include 'components/topbar.php'; ?>
<?php include 'components/sidebar.php'; ?>

<!-- Start Content Wrapper -->
<div class="content-wrapper">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Data Pegawai</h4>
                <?php include 'process/data-insert.php'; ?>
                <form method="POST" class="form-sample">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <?php include 'process/generate-code.php' ?>
                                    <input name="IDPegawai" type="text" class="form-control" value="<?php echo GeneratePegawai(); ?>" readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="Nama" class="col-sm-3 col-form-label">Nama Pegawai</label>
                                <div class="col-sm-9">
                                    <input id="Nama" name="Nama" type="text" class="form-control" oninput="this.value = this.value.replace(/[^a-zA-Z, ]/, '')" minlength="2" maxlength="50" placeholder="Uciha Madara" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="Gender" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <select id="Gender" name="Gender" class="form-control" required>
                                        <option value=""></option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
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
                                    <input id="Alamat" name="Alamat" type="text" class="form-control" oninput="this.value = this.value.replace(/[^a-zA-Z, ]/, '')" minlength="2" maxlength="50" placeholder="Konoha" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="Tanggal" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input id="Tanggal" name="Tanggal" type="date" class="form-control" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="Telepon" class="col-sm-3 col-form-label">Telepon</label>
                                <div class="col-sm-9">
                                    <input id="Telepon" name="Telepon" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '')" onKeyPress="if(this.value.length==12) return false;" placeholder="0896821257xx" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="IDJabatan" class="col-sm-3 col-form-label">Jabatan</label>
                                <div class="col-sm-9">
                                    <select id="IDJabatan" name="IDJabatan" class="form-control" required>
                                        <option value=""></option>
                                        <?php
                                        include 'process/data-option.php';
                                        AmbilJabatan(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-primary " type="submit" name="tambah-pegawai">
                        <i class="mdi mdi-account-plus"></i>Tambah
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