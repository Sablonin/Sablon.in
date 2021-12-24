<?php
require '../../configs/koneksi.php';
if ($_SESSION['IDLevel'] != 1) {
  echo "
        <script>
        document.location='error-403';
        </script>
    ";
}
