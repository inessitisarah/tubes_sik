<!DOCTYPE html>

<html>
<?php
session_start();
echo $_SESSION['username'];
echo $_SESSION['role'];
session_destroy();
?>
    <p>
        Anda tidak memiliki akses ke halaman ini! 
  		Balik lagi ke halaman utama: <a href="index.php">Halaman Utama</a>
    </p>
</html>
