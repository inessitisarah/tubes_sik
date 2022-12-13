<?php
include "../include/configDB.php";

// Function definition
function function_alert($nama, $stok, $cara, $harga) {
      
    // Display the alert box 
    echo "<script>alert('Obat $nama sudah terdaftar dan memiliki stok sejumlah $stok dengan harga Rp $harga dan digunakan $cara');
        window.location.href= '../stokObat.php#stok'
        </script>";
}


$sql = mysqli_query($configDB, "INSERT INTO obat (nama_obat, stock_obat, cara_penggunaan, harga) VALUES ('".$_POST["namaObat"]."', '".$_POST["stokObat"]."', '".$_POST["caraPenggunaan"]."', '".$_POST["hargaObat"]."' )");


$nama = $_POST["namaObat"];
$stok = $_POST["stokObat"];
$cara = $_POST["caraPenggunaan"];
$harga = $_POST["hargaObat"];
 
function_alert($nama, $stok, $cara, $harga);
 ?>