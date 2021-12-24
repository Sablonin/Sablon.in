<?php include 'components/top-link.php'; ?>
<?php session_start();
error_reporting(0);
if ($_SESSION['Username']) {
  echo "
        <script>
        document.location='dashboard';
        </script>
    ";
}
?>

<div class="container-fluid page-body-wrapper full-page-wrapper animated fadeIn">
  <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
    <div class="row flex-grow">
      <div class="col-lg-6 d-flex align-items-center justify-content-center">
        <div class="auth-form-transparent text-left p-3">
          <h4>Selamat Datang!</h4>
          <h6 class="font-weight-light">Silahkan Login Untuk Melanjutkan!</h6>
          <?php include 'process/login-process.php'; ?>
          <form method="POST" action="" class="pt-3">
            <div class="form-group">
              <label for="exampleInputEmail">Username</label>
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <span class="input-group-text bg-transparent border-right-0">
                    <i class="mdi mdi-account-outline text-primary"></i>
                  </span>
                </div>
                <input type="text" name="Username" class="form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="Username">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword">Password</label>
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <span class="input-group-text bg-transparent border-right-0">
                    <i class="mdi mdi-lock-outline text-primary"></i>
                  </span>
                </div>
                <input type="password" name="Password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password">
              </div>
            </div>
            <div class="my-2 d-flex justify-content-between align-items-center">
            </div>
            <div class="my-3">
              <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="button-login">LOGIN</button>
            </div>
            <div class="my-3">
              <a href="../landing-page/index" class="btn btn-block btn-outline-secondary btn-lg font-weight-medium auth-form-btn">Back To Landing Page</a>
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-6 login-half-bg d-flex flex-row">
        <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2021 All rights reserved.</p>
      </div>
    </div>
  </div>
</div>
<!-- content-wrapper ends -->

<?php include 'components/bottom-link.php'; ?>