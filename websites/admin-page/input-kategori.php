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
                    <h4 class="card-title">Tambah Kategori</h4>
                    <?php require 'process/data-insert.php'; ?>
                    <form class=" col-lg-6 mx-auto cmxform" method="POST">
                        <fieldset>
                            <div class="form-group">
                                <label for="IDKategori">Kode Kategori</label>
                                <?php require 'process/generate-code.php'; ?>
                                <input id="IDKategori" class="form-control" type="text" name="IDKategori" value="<?php echo GenerateKategori(); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="Kategori">Kategori</label>
                                <input id="Kategori" class="form-control" type="text" name="Kategori" oninput="this.value = this.value.replace(/[^a-zA-Z ]/, '')" minlength="2" maxlength="35" placeholder="Contoh : Cat Warna">
                            </div>
                            <button type="submit" name="tambah-kategori" class="btn btn-sm btn-primary">
                                <i class="mdi mdi-bookmark-plus-outline"></i>Tambah
                            </button>
                            <a href="data-kategori">
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