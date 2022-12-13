<?php
include "../include/configDB.php"; 

// Function definition
function function_alert($id,$nama) {
      
    // Display the alert box 
    echo "<script>alert('ID Periksa $id berhasil diberikan obat $nama');
    window.location.href= '../preskripsiObat.php#preskripsi'
        </script>";
}

$id = $_POST["idPeriksa"];
$nama = $_POST["namaObat"];

 
$sql = mysqli_query($configDB, "UPDATE obat SET stock_obat=stock_obat - 1 WHERE nama_obat='".$_POST["namaObat"]."'");
$sql2 = mysqli_query($configDB, "UPDATE periksa SET assigned='Diberikan' WHERE id_periksa='".$_POST["idPeriksa"]."'");



function_alert($id,$nama);
 ?>