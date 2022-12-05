<?php 
    session_start(); 
    require "include/configDB.php";
    if(!isset($_SESSION['role'])){
        header("location: index.php");
    }else if ($_SESSION['role']!='admin'){
        header('location: errorRedirect.php');

    } 
?>

<html>

<!-- HEAD -->
<head>
    <title>Halaman Pasien</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- STYLE -->
    <?php include "templates/style.php"; ?>
    <?php include "include/script.php"; ?>

    

</head>

<!--Mengambil dari SESSION eh ini gatau buth apa ngga sih-->
<?php 
    $id =  $_SESSION['id'];
    $username = $_SESSION['username'];
?>

<body>
    <!-- Navbar (sit on top) -->
    <?php include "templates/navbarWithMenuAdmin.php"; ?>

    <!-- Sidebar (hidden by default) -->
    <?php include "templates/sidebarAdmin.php"; ?>

    <!-- Header with full-height image -->
    <?php include "templates/headerHome.php"; ?>

    
    <br><br><br><br>
    <div>

    <!-- Buat menampilkan nama -->

    <h2 class="w3-center"><b>User Data</b></h2>
    <br><br>

    <!--Mengambil data user credentials -->
    <?php       
        $tanggal_sekarang = date("Y-m-d");        
        $ambildata = mysqli_query($configDB, "select * from periksa,pasien,dokter WHERE pasien.id=periksa.id_pasien AND dokter.id=periksa.id_dokter AND periksa.tanggal_periksa='$tanggal_sekarang' ORDER BY periksa.no_antrian");
        $num_rows = mysqli_num_rows($ambildata); 

        if ($num_rows == 0){ ?>
            <h3 class="w3-center">Belum ada user yang terdaftar</h3>
            <?php
        }

        else{
            ?>
            <h3 class="w3-center">Antrian</h3>
            <table class="w3-center w3-table w3-striped w3-border" align="center">
                <tr>
                    <th>Nama Pasien</th>
                    <th>Nama Dokter</th>
                    <th>Tanggal Periksa</th>
                    <th>Nomor Antrian</th>
                </tr>
                <?php
                while ($tampil = mysqli_fetch_array($ambildata)){
                    echo 
                    "<tr>
                        <td>$tampil[nama_pasien]</td>
                        <td>$tampil[nama_dokter]</td>
                        <td>$tampil[tanggal_periksa]</td>
                        <td>$tampil[no_antrian]</td>

                    </tr>";
                }
                ?>
            </table>
            <br><br>
            <?php
        }
    ?>

    </body>
    
</html>

