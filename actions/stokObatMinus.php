<?php
include "../include/configDB.php"; 

// Function definition
function function_alert($nama ) {
      
    // Display the alert box 
    echo "<script>alert('Stok obat $nama berhasil berkurang 1');
    window.location.href= '../indexApt.php#stok'
        </script>";
}


$sql = mysqli_query($configDB, "UPDATE obat SET stock_obat=stock_obat - 1 WHERE nama_obat='".$_POST["namaObat"]."'");

$nama = $_POST["namaObat"];
 
function_alert($nama);
 ?>