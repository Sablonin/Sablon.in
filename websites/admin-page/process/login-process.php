<?php
require '../../configs/koneksi.php';
session_start();
error_reporting(0);

if (isset($_POST['button-login'])) {
    $Username = htmlspecialchars(trim($_POST['Username']));
    $Password = htmlspecialchars(trim($_POST['Password']));

    $GetLogin = mysqli_query($conn, "SELECT * FROM login WHERE Username = '$Username' AND Password = '$Password'");
    $GetData = mysqli_fetch_array($GetLogin);

    if (empty($Username)) {
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Peringatan!',
                text: 'Silahkan Lengkapi Username!',
                icon: 'error',
                timer: 2000,
                showCancelButton: false,
                showConfirmButton: false
            });
        });  
        </script>
        ";
    } else if (empty($Password)) {
        echo "
        <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Peringatan!',
                text: 'Silahkan Lengkapi Password!',
                icon: 'error',
                timer: 2000,
                showCancelButton: false,
                showConfirmButton: false
            });
        });  
        </script>
        ";
    } else if ($Username == $GetData['Username'] && $Password == $GetData['Password']) {
        $_SESSION['Username'] = $Username;
        $_SESSION['Password'] = $Password;
        $_SESSION['IDPegawai'] = $GetData['IDPegawai'];
        $_SESSION['IDLevel'] = $GetData['IDLevel'];
        echo "
            <script>
            setTimeout(function() {
                Swal.fire({
                    title: 'Login Berhasil!',
                    text: 'Selamat Datang',
                    icon: 'success',
                    showCancelButton: false,
                    showConfirmButton: false
                });
            });  
            window.setTimeout(function(){ 
                window.location.replace('dashboard');
            },2000);
            </script>
            ";
    } else {
        echo "
        <script>
	    setTimeout(function() {
            Swal.fire({
                title: 'Peringatan!',
                text: 'Password Salah!',
                icon: 'error',
                timer: 2000,
                showCancelButton: false,
                showConfirmButton: false
            });
        });  
		</script>
        ";
    }
}
