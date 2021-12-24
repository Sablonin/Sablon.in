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
                    <h4 class="card-title">Tambah Barang</h4>
                    <?php require 'process/data-insert.php'; ?>
                    <form class=" col-lg-6 mx-auto cmxform" method="POST" action="">
                        <fieldset>
                            <div class="form-group">
                                <?php require 'process/generate-code.php'; ?>
                                <label for="IDBarang">Kode Barang</label>
                                <input id="IDBarang" class="form-control" type="text" name="IDBarang" value="<?php echo GenerateBarang(); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="Barang">Barang</label>
                                <input id="Barang" class="form-control" type="text" name="Barang" oninput="this.value = this.value.replace(/[^a-zA-Z ]/, '')" minlength=" 4" maxlength="50" placeholder="Contoh : Kain Batik">
                            </div>
                            <div class="form-group">
                                <label for="Kategori">Kategori</label>
                                <select name="IDKategori" class="form-control" id="Kategori">
                                    <option value="">Silahkan Pilih Kategori</option>
                                    <?php
                                    include 'process/data-option.php';
                                    AmbilKategori(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Stok">Stok</label>
                                <input id="Stok" class="form-control" type="text" name="Stok" oninput="this.value = this.value.replace(/[^0-9]/g, '')" onKeyPress="if(this.value.length==5) return false;" placeholder="Contoh : 44"></input>
                            </div>
                            <button type="submit" name="tambah-barang" class="btn btn-sm btn-primary">
                                <i class="mdi mdi-library-plus"></i>Tambah
                            </button>
                            <a href="data-barang">
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