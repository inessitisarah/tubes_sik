<?php
include "../include/configDB.php";

// Function definition
function function_alert($nama, $stok) {
      
    // Display the alert box 
    echo "<script>alert('Stok obat $nama sudah terupdate sejumlah $stok');
        window.location.href= '../stokObat.php#stok'
        </script>";
}
$nama = $_POST["namaObat"];
$stok = $_POST["stokObat"];

$sql = mysqli_query($configDB, "UPDATE obat SET stock_obat='".$_POST["stokObat"]."' WHERE nama_obat='".$_POST["namaObat"]."'");

 
function_alert($nama, $stok);
 ?>