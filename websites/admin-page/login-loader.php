<?php include 'components/top-link.php'; ?>

<?php
header("refresh:2;login-page");
?>

<style>
  .splash-screen {
    position: fixed;
    width: 100%;
    height: 100%;
  }

  .center-loader {
    position: absolute;
    top: 46%;
    left: 50%;
    transform: translate(-50%, -46%);
  }
</style>

<div class="splash-screen">
  <div class="center-loader">
    <div class="dot-opacity-loader">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
</div>

<?php include 'components/bottom-link.php'; ?>