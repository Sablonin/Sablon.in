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
                <h4 class="card-title">Update Akun</h4>
                <?php require 'process/data-update.php'; ?>
                <form method="POST" class="form-sample">
                    <?php
                    require '../../configs/koneksi.php';
                    $IDLogin = $_GET['IDLogin'];
                    $GetAkun = mysqli_query($conn, "SELECT login.*, pegawai.Nama, akses.Akses FROM login INNER JOIN pegawai ON login.IDPegawai = pegawai.IDPegawai INNER JOIN akses ON login.IDLevel = akses.IDLevel WHERE IDLogin = '$IDLogin'");
                    $DataAkun = mysqli_fetch_array($GetAkun); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input name="IDLogin" type="text" class="form-control" value="<?php echo $DataAkun['IDLogin']; ?>" hidden />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="IDPegawai" class="col-sm-3 col-form-label">Nama Pegawai</label>
                                <div class="col-sm-9">
                                    <input name="IDPegawai" id="IDPegawai" class="form-control" value="<?php echo $DataAkun['Nama'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="IDLevel" class="col-sm-3 col-form-label">Hak Akses</label>
                                <div class="col-sm-9">
                                    <input id="IDLevel" name="IDLevel" class="form-control" value="<?php echo $DataAkun['Akses']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="Username" class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input id="Username" name="Username" type="text" class="form-control" oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/, '')" minlength="6" maxlength="12" placeholder="Username" value="<?php echo $DataAkun['Username']; ?>" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="Password" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input id="Password" name="Password" type="text" class="form-control" minlength="2" maxlength="12" onChange="onChange()" placeholder="Password" value="<?php echo $DataAkun['Password']; ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-warning" type="submit" name="update-akun">
                        <i class="mdi mdi-account-plus"></i>Update
                    </button>
                    <a href="data-akun">
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
<script>
    function onChange() {
        const password = document.querySelector('input[name=Password]');
        const confirm = document.querySelector('input[name=Confirm]');
        if (confirm.value === password.value) {
            confirm.setCustomValidity('');
        } else {
            confirm.setCustomValidity('Passwords do not match');
        }
    }
</script>