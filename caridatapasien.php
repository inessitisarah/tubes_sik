<?php 
    session_start(); 
    include "include/configDB.php";
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

    <br><br><br>
    <h3 class="w3-center"><b>Pencarian Data Pemeriksaan</b></h3>
    <br> 

    <h5 class="w3-center">Masukkan ID Pasien Anda: </h5>

    <div>
        <form class="example" method = "get" action="" style="margin:auto;max-width:300px">
        <input type="text" placeholder="ID Pasien" name="searchedID">
        <button type="submit"><i class="fa fa-search"></i></button>
    </div>

    <?php
    if (isset($_GET['searchedID'])) {
        $query = mysqli_query($configDB, "SELECT * FROM periksa 
        WHERE periksa.id_dokter = '$id' AND periksa.id_pasien LIKE '%".$_GET['searchedID']."%'");

        $num_rows = mysqli_num_rows($query);

        if ($num_rows == 0) {
            ?> 
            <br>
            <h5 class="w3-center">Pasien belum pernah melakukan pemeriksaan</h5>
            <?php
        } 

        else {
            ?>
                <br>
                <div class="w3-center">
                <table class="w3-center w3-table w3-striped w3-border" style="width: 50%" align = "center">
                <tr>
                    <th>No</th>
                    <th>Tanggal Periksa</th>
                    <th>Riwayat Diagnosis</th>
                    <th>Riwayat Preskripsi Obat</th>
                </tr>
                <?php
                while ($hasilquery = mysqli_fetch_array($query)) {
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