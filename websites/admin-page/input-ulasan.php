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
                    <h4 class="card-title">Tambah Ulasan</h4>
                    <?php require 'process/data-insert.php'; ?>
                    <form class=" col-lg-6 mx-auto cmxform" method="POST" enctype="multipart/form-data" action="">
                        <fieldset>
                            <div class="form-group">
                                <?php require 'process/generate-code.php'; ?>
                                <input class="form-control" type="text" name="IDUlasan" value="<?php echo GenerateUlasan(); ?>" hidden>
                            </div>
                            <div class="form-group">
                                <label for="Nama">Nama</label>
                                <input id="Nama" class="form-control" type="text" name="Nama" oninput="this.value = this.value.replace(/[^a-zA-Z ]/, '')" minlength=" 4" maxlength="50" placeholder="Contoh : Uzumaki Naruto">
                            </div>
                            <div class="form-group">
                                <label for="Ulasan">Ulasan</label>
                                <textarea id="Ulasan" class="form-control" rows="10" cols="120" maxlength="255" name="Ulasan"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Upload Foto</label>
                                <input type="file" name="Foto" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Contoh File : .jpg / .jpeg / .png">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Pilih</button>
                                    </span>
                                </div>
                            </div>
                            <button type="submit" name="tambah-ulasan" class="btn btn-sm btn-primary">
                                <i class="mdi mdi-library-plus"></i>Tambah
                            </button>
                            <a href="data-ulasan">
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <i class="mdi mdi-step-backward"></i>Kembali
                                </button>
                            </a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content Wrapper -->

<?php include 'components/footer.php'; ?>
<?php include 'components/bottom-link.php'; ?>