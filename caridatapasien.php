<?php 
    session_start(); 
    include "include/configDB.php";
    if(!isset($_SESSION['role'])){
        header("location: index.php");
      }else if ($_SESSION['role']!='dokter'){
        header('location: errorRedirect.php');
    }
    $id =  $_SESSION['id'];
    $no = 1;
?>

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
    <?php include "templates/style.php"; ?>
</head>

<body>
    <div>
        <!-- Navbar (sit on top) -->
        <?php include "templates/navbarWithMenuDokter2.php"; ?>
    </div>

    <!-- Header -->
    <div>
    <?php include "templates/headerDokter.php"; ?>
    </div>

    <br><br><br>
    <h2 class="w3-center"><b>Pencarian Data Pemeriksaan</b></h2>
    <br> 

    <h5 class="w3-center">Masukkan Nama Pasien Anda: </h5>

    <div>
        <form class="example" method = "get" action="" style="margin:auto;max-width:300px">
        <input type="text" placeholder="Nama Pasien" name="searchedName">
        <button type="submit"><i class="fa fa-search"></i></button>
    </div>

    <?php
    if (isset($_GET['searchedName'])) {
        $searchedName = $_GET['searchedName'];

        $query = mysqli_query($configDB, "SELECT * FROM periksa, pasien 
        WHERE periksa.id_dokter = '$id' AND periksa.id_pasien = pasien.id AND pasien.nama_pasien = '$searchedName'");

        $num_rows = mysqli_num_rows($query);

    
        if ($num_rows == 0) {
    ?> 
            <br>
            <h5 class="w3-center">Pasien tidak ada atau belum pernah melakukan pemeriksaan</h5>
            <?php
        } else {
            ?>
                <?php
            while ($hasilquery = mysqli_fetch_array($query)) { ?>
                <?php
                $tanggal_sekarang = date("Y-m-d");
                $usia = date_diff(date_create($hasilquery['tanggal_lahir']), date_create($tanggal_sekarang));
                ?>
                <br>
                <div class="w3-container">  
                <h5 style="margin-left:400px">Nama: <?php echo $hasilquery['nama_pasien']; ?></h5>
                <h5 style="margin-left:400px">Usia: <?php echo $usia->format('%y tahun %m bulan %d hari'); ?></h5>
                <h5 style="margin-left:400px">Golongan Darah: <?php echo $hasilquery['golongan_darah']; ?></h5>


                <br>              
                <table class="w3-center w3-table w3-striped w3-border" style="width: 50%" align = "center">
                <tr>
                    <th>No</th>
                    <th>Tanggal Periksa</th>
                    <th>Riwayat Diagnosis</th>
                    <th>Riwayat Preskripsi Obat</th>
                </tr>
                <?php
                echo "
                    <tr>
                        <td>$no</td>
                        <td>$hasilquery[tanggal_periksa]</td>
                        <td>$hasilquery[diagnosis]</td>
                        <td>$hasilquery[preskripsi_obat]</td>
                    </tr>";
                $no++;

            }
        }
    }

    ?>
    </table>
    <br>
</div>



    <br><br>

    <div>
    <!-- Footer -->
    <?php include "templates/footer.php"; ?>

    <!-- Script -->
    <?php include "include/script.php"; ?>
    </div>


</body>
</html>