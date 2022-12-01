<?php
include "../include/configDB.php"; 

// Function definition
function function_alert($nama, $stok ) {
      
    // Display the alert box 
    echo "<script>alert('Obat $nama memiliki stok sejumlah $stok');
        window.location.href= '../indexApt.php#stok'
        </script>";
}


$sql = mysqli_query($configDB, "SELECT * FROM obat WHERE nama_obat='".$_GET["namaObat"]."'");
$row = mysqli_fetch_assoc($sql);

$nama = $row["nama_obat"];
$stok = $row["stock_obat"];
 
function_alert($nama, $stok);
 ?>