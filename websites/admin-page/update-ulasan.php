<?php include 'components/top-link.php'; ?>
<?php require 'process/session-login.php'; ?>
<?php require 'process/session-admin.php'; ?>
<?php include 'components/navbar.php'; ?>
<?php include 'components/sidebar.php'; ?>


<!-- Start Content Wrapper -->
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Ulasan</h4>
                    <?php require 'process/data-update.php'; ?>
                    <form class=" col-lg-6 mx-auto cmxform" method="POST" enctype="multipart/form-data" action="">
                        <?php
                        require '../../configs/koneksi.php';
                        $IDUlasan = $_GET['IDUlasan'];
                        $GetUlasan = mysqli_query($conn, "SELECT * FROM ulasan WHERE IDUlasan = '$IDUlasan'");
                        $DataUlasan = mysqli_fetch_array($GetUlasan);
                        ?>
                        <div class="form-group">
                            <input class="form-control" type="text" name="IDUlasan" value="<?php echo $DataUlasan['IDUlasan']; ?>" hidden>
                        </div>
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input id="Nama" class="form-control" type="text" name="Nama" oninput="this.value = this.value.replace(/[^a-zA-Z ]/, '')" minlength=" 4" maxlength="50" value="<?php echo $DataUlasan['Nama']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="Ulasan">Ulasan</label>
                            <textarea id="Ulasan" class="form-control" name="Ulasan" rows="10" cols="120" maxlength="255"><?php echo $DataUlasan['Ulasan']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Update Foto (Opsional)</label>
                            <input type="file" name="Foto" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Contoh File : .jpg / .jpeg / .png">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Pilih</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="IDFoto" value="<?php echo $DataUlasan['Foto']; ?>" hidden>
                        </div>
                        <button type="submit" name="update-ulasan" class="btn btn-sm btn-warning">
                            <i class="mdi mdi-library-plus"></i>Update
                        </button>
                        <a href="data-ulasan">
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                <i class="mdi mdi-step-backward"></i>Kembali
                            </button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content Wrapper -->

<?php include 'components/footer.php'; ?>
<?php include 'components/bottom-link.php'; ?>