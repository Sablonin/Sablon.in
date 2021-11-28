<?php
session_start();
if (!isset($_SESSION['Username'])) {
    echo "
        <script>
        document.location='error-403';
        </script>
    ";
}
