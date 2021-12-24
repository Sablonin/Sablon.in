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
                    <h4 class="card-title">Update Barang</h4>
                    <?php require 'process/data-update.php'; ?>
                    <form method="POST" action="" class="col-lg-6 mx-auto cmxform">
                        <?php
                        require '../../configs/koneksi.php';
                        $IDBarang = $_GET['IDBarang'];
                        $GetBarang = mysqli_query($conn, "SELECT barang.*, kategori.Kategori FROM barang INNER JOIN kategori ON barang.IDKategori = kategori.IDKategori WHERE IDBarang = '$IDBarang'");
                        $DataBarang = mysqli_fetch_array($GetBarang);
                        ?>
                        <fieldset>
                            <div class="form-group">
                                <input id="IDBarang" class="form-control" type="text" name="IDBarang" value="<?php echo $DataBarang['IDBarang']; ?>" hidden>
                            </div>
                            <div class="form-group">
                                <label for="Barang">Barang</label>
                                <input id="Barang" class="form-control" type="text" name="Barang" value="<?php echo $DataBarang['Barang']; ?>" maxlength="50" readonly>
                            </div>
                            <div class="form-group">
                                <label for="IDKategori">Kategori</label>
                                <input name="IDKategori" class="form-control" id="Kategori" value="<?php echo $DataBarang['Kategori']; ?>" readonly></input>
                            </div>
                            <div class="form-group">
                                <label for="Stok">Stok</label>
                                <input id="Stok" class="form-control" type="text" name="Stok" oninput="this.value = this.value.replace(/[^0-9]/g, '')" onKeyPress="if(this.value.length==4) return false;" value="<?php echo $DataBarang['Stok'] ?>"></input>
                            </div>
                            <button type="submit" name="update-barang" class="btn btn-sm btn-warning">
                                <i class="mdi mdi-update"></i>Update
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