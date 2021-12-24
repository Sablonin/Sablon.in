<?php include 'components/top-link.php'; ?>
<?php require 'process/session-login.php' ?>
<?php include 'components/navbar.php'; ?>
<?php include 'components/sidebar.php'; ?>

<!-- Start Content Wrapper -->
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Ulasan</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive mt-2">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Ulasan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include 'process/data-table.php';
                                Ulasan(); ?>
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