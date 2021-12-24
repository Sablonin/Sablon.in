<?php include 'components/top-link.php'; ?>
<?php require 'process/session-login.php'; ?>
<?php include 'components/navbar.php'; ?>
<?php include 'components/sidebar.php'; ?>

<!-- Start Content Wrapper -->
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Kategori</h4>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex table-responsive">
                        <div class="btn-group mr-2">
                            <?php require 'process/session-level.php';
                            if ($IDLevel == 1) {
                                echo '
                                    <a href="input-kategori">
                                    <button type="button" class="btn btn-sm btn-primary">
                                        <i class="mdi mdi-bookmark-plus-outline"></i>Tambah
                                    </button>
                                    </a>
                                ';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="table-responsive mt-2">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Barang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include 'process/data-table.php';
                                Kategori(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End Content Wrapper -->

<?php include 'components/footer.php'; ?>
<?php include 'components/bottom-link.php'; ?>