<?php session_start() ?>

<html>
<!-- HEAD -->
<head>
    <title>Puskesmas Ganesha : Halaman Dokter</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- STYLE -->
    <?php include "C:/xampp/htdocs/tubes_sik/templates/style.php"; ?>
</head>

<body>
    <div>
        <!-- Navbar (sit on top) -->
        <?php include "C:/xampp/htdocs/tubes_sik/templates/navbarWithMenuDokter.php"; ?>
    </div>

    <div>
        <?php
        include "C:/xampp/htdocs/tubes_sik/koneksiDB.php";
        $no = 1;


        $ambildata = mysqli_query($koneksiDB, "select * from tabel_pasien, tabel_periksa, tabel_dokter
        WHERE tabel_dokter.uname = '$username' AND tabel_periksa.tanggal_periksa = '$tanggal_sekarang' AND tabel_periksa.id_pasien = tabel_pasien.id_pasien AND tabel_dokter.id_dokter = tabel_periksa.id_dokter") or die (mysqli_error($koneksiDB));
        ?>
        
    </div>
    
    


</body>