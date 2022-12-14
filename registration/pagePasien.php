<?php session_start() ?>

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
    <?php include "C:/xampp/htdocs/tubes_sik/templates/style.php"; ?>
</head>


<body>
    <div>
        <!-- Navbar (sit on top) -->
    <?php include "C:/xampp/htdocs/tubes_sik/templates/navbarWithoutMenu.php"; ?>

    </div>


    <br><br><br><br>
    <div>

    <!--nyoba ngambil user dari username session -->

    <?php 
    $username =  $_SESSION['username'];
    ?>
    <h2 class="w3-center"><b>Selamat datang <?php echo $username; ?>!</b></h2>
    <br><br>
    <?php
        require "C:/xampp/htdocs/tubes_sik/include/configDB.php";
        //nyoba ngambil user dari username session
       
        $ambildata = mysqli_query($configDB, "select * from tabel_pasien, tabel_periksa, tabel_dokter
        WHERE tabel_pasien.uname = '$username' AND tabel_periksa.id_dokter = tabel_dokter.id_dokter") or die (mysqli_error($configDB));

        $num_rows = mysqli_num_rows($ambildata); 

        if ($num_rows == 0){ ?>
            <h3 class="w3-center">Anda Belum Melakukan Pemeriksaan</h3>
            <?php
        }

        else{
            ?>
            <h3 class="w3-center">Berikut Riwayat Pemeriksaan Anda</h3>
            <br><br>
            <table class="w3-table w3-striped w3-border" align="center">
                <tr>
                    <th>Dokter</th>
                    <th>Tanggal Periksa</th>
                    <th>Diagnosis</th>
                    <th>Preskripsi Obat</th>
                </tr>
                <?php
                while ($tampil = mysqli_fetch_array($ambildata)){
                    echo "
                    <tr>
                        <td>$tampil[nama_dokter]</td>
                        <td>$tampil[tanggal_periksa]</td>
                        <td>$tampil[diagnosis]</td>
                        <td>$tampil[preskripsi_obat]</td>
                    </tr>";
                }
                ?>
            </table>
            <?php
        }
    ?>
    </div>
    
    <br><br><br><br>
    <div>
        <!-- Footer -->
        <?php include "C:/xampp/htdocs/tubes_sik/templates/footer.php"; ?>

        <!-- Script -->
        <?php include "C:/xampp/htdocs/tubes_sik/include/script.php"; ?>
    </div>
    
</body>
</body>
</html>

