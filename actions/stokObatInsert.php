<?php
include "../include/configDB.php";

// Function definition
function function_alert($nama, $stok) {
      
    // Display the alert box 
    echo "<script>alert('Obat $nama sudah terdaftar dan memiliki stok sejumlah $stok');
        window.location.href= '../indexApt.php#stok'
        </script>";
}


$sql = mysqli_query($configDB, "INSERT INTO obat (nama_obat, stock_obat) VALUES ('".$_POST["namaObat"]."', '".$_POST["stokObat"]."')");


$nama = $_POST["namaObat"];
$stok = $_POST["stokObat"];
 
function_alert($nama, $stok);
 ?>