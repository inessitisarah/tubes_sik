<?php 
    session_start(); 
    require "include/configDB.php";
    if(!isset($_SESSION['role'])){
        header("location: index.php");
    }else if ($_SESSION['role']!='pasien'){
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
    

</head>

<!--Mengambil dari SESSION -->
<?php 
    $id =  $_SESSION['id'];
    $username = $_SESSION['username'];
?>

<body>
    <div>
        <!-- Navbar (sit on top) -->
    <?php include "templates/navbarWithMenuPasien.php"; ?>
    </div>
    
    <br><br><br><br>
    <div>

    <!-- Buat menampilkan nama -->
    <?php
        $ambilnama = mysqli_query($configDB, "select * from pasien WHERE pasien.id = '$id' ") or die (mysqli_error($koneksiDB));
        $hasilquery = mysqli_fetch_array($ambilnama);
    ?>
    <h2 class="w3-center"><b>Selamat datang <?php echo $hasilquery['nama_pasien']; ?>!</b></h2>
    <br><br>

    <!--Mengambil data pemeriksaan -->
    <?php       
        $ambildata = mysqli_query($configDB, "select * from pasien, periksa, dokter
        WHERE periksa.id_pasien = '$id' AND pasien.id = '$id' AND periksa.id_dokter = dokter.id
        ORDER BY periksa.tanggal_periksa DESC LIMIT 1") or die (mysqli_error($koneksiDB));

        $num_rows = mysqli_num_rows($ambildata); 

        if ($num_rows == 0){ ?>
            <h3 class="w3-center">Anda Belum Melakukan Reservasi Pemeriksaan</h3>
            <div>
            <a href="./tambahPemeriksaan.php" class="w3-btn w3-round w3-teal">Reservasi</a>
            </div>
            <?php
        }

        else{
            ?>
            <h3 class="w3-center">Berikut Reservasi Anda:</h3>
            <br><br>
            <table class="w3-center w3-table w3-striped w3-border" align="center">
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
        <?php include "templates/footer.php"; ?>

        <!-- Script -->
        <?php include "include/script.php"; ?>
    </div>
    
</body>
</body>
</html>

