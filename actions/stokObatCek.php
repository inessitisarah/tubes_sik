<?php
include "../include/configDB.php"; 

// Function definition
function function_alert($nama, $stok, $harga, $cara ) {
      
    // Display the alert box 
    echo "<script>alert('Obat $nama memiliki stok sejumlah $stok dengan harga Rp$harga per buah serta $cara .');
        window.location.href= '../stokObat.php#stok'
        </script>";
}


$sql = mysqli_query($configDB, "SELECT * FROM obat WHERE nama_obat='".$_GET["namaObat"]."'");
$row = mysqli_fetch_assoc($sql);

$nama = $row["nama_obat"];
$stok = $row["stock_obat"];
$harga = $row["harga"];
$cara = $row["cara_penggunaan"];
 
function_alert($nama, $stok, $harga, $cara);
 ?>