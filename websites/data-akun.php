<?php include 'components/top-link.php'; ?>
<?php include 'process/session.php' ?>
<?php include 'components/topbar.php'; ?>
<?php include 'components/sidebar.php'; ?>
<?php require 'process/session-admin.php'; ?>

<!-- Start Content Wrapper -->
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Akun</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive mt-2">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Authority</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include 'process/data-table.php';
                                LoginAkun(); ?>
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