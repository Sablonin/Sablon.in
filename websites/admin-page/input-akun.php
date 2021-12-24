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
                <h4 class="card-title">Register</h4>
                <?php require 'process/data-insert.php'; ?>
                <form method="POST" class="form-sample">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kode</label>
                                <div class="col-sm-9">
                                    <?php require 'process/generate-code.php' ?>
                                    <input name="IDLogin" type="text" class="form-control" value="<?php echo GenerateLogin(); ?>" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="IDLevel" class="col-sm-3 col-form-label">Hak Akses</label>
                                <div class="col-sm-9">
                                    <select id="IDLevel" name="IDLevel" class="form-control">
                                        <option value="">Silahkan Pilih Hak Akses</option>
                                        <?php
                                        include 'process/data-option.php';
                                        AmbilAkses(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="IDPegawai" class="col-sm-3 col-form-label">Nama Pegawai</label>
                                <div class="col-sm-9">
                                    <select name="IDPegawai" id="IDPegawai" class="form-control">
                                        <option value="">Silahkan Pilih Pegawai</option>
                                        <?php
                                        AmbilNama(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="Password" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input id="Password" name="Password" type="password" class="form-control" minlength="2" maxlength="12" onChange="onChange()" placeholder="Password" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="Username" class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input id="Username" name="Username" type="text" class="form-control" oninput="this.value = this.value.replace(/[^a-zA-z0-9]/, '')" minlength="6" maxlength="12" placeholder="Contoh : Naruto" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="Confirm" class="col-sm-3 col-form-label">Confirm Password</label>
                                <div class="col-sm-9">
                                    <input id="Confirm" name="Confirm" type="password" class="form-control" minlength="2" maxlength="12" onChange="onChange()" placeholder="Confirm Password" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-primary" type="submit" name="tambah-akun">
                        <i class="mdi mdi-account-plus"></i>Register
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Content Wrapper -->

<?php include 'components/footer.php'; ?>
<?php include 'components/bottom-link.php'; ?>
<script>
    function onChange() {
        const password = document.querySelector('input[name=Password]');
        const confirm = document.querySelector('input[name=Confirm]');
        if (confirm.value === password.value) {
            confirm.setCustomValidity('');
        } else {
            confirm.setCustomValidity('Password Tidak Sesuai');
        }
    }
</script>