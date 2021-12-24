<?php
session_start();
require '../../configs/koneksi.php';
if (!isset($_SESSION['Username'])) {
    echo "
        <script>
        document.location='error-403';
        </script>
    ";
}
