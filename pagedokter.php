<!-- Ini sudah disesuaikan nama tabel dan kolomnya -->
<?php 
    session_start();
    if(!isset($_SESSION['role'])){
        header("location: index.php");
      }else if ($_SESSION['role']!='dokter'){
        header('location: errorRedirect.php');
    }
    $id =  $_SESSION['id'];
    $username = $_SESSION['username'];

    include "include/configDB.php";
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
    <?php include "templates/navbarWithMenuDokter.php"; ?>
    </div>

    <div>
    <!-- Sidebar (hidden by default) -->
    <?php include "templates/sidebarDokter.php"; ?>
    </div>

    <!-- Header -->
    <div>
    <?php include "templates/headerDokter.php"; ?>
    </div>
    

    <!-- Buat menampilkan nama -->
    <?php
        $ambilnama = mysqli_query($configDB, "select * from dokter WHERE dokter.id = '$id' ") or die (mysqli_error($configDB));
        $hasilquery = mysqli_fetch_array($ambilnama);
    ?>

    <br><br>
    <div>
    <h2 class="w3-center"><b>Selamat datang Dokter <?php echo $hasilquery['nama_dokter']; ?>!</b></h2>
    <br><br>
    </div>


    <div>
    <!--nyoba ngambil user dari username session -->

    <div>
    <?php
        $no = 1;
        //date_default_timezone_set('Asia/Hong_Kong');
        $tanggal_sekarang = date("Y-m-d");


        $ambildata = mysqli_query($configDB, "select * from pasien, periksa, dokter
        WHERE periksa.tanggal_periksa = '$tanggal_sekarang' AND periksa.id_pasien = pasien.id AND dokter.id = periksa.id_dokter AND periksa.id_dokter = '$id'") or die (mysqli_error($configDB));

        $num_rows = mysqli_num_rows($ambildata);

        if ($num_rows == 0){ ?>
            <h3 class="w3-center">Tidak Ada Reservasi Pemeriksaan Hari Ini</h3>
            <?php
        }
        
        else{
            ?>
            <h3 class="w3-center">Berikut Data Reservasi Pemeriksaan Anda Hari Ini:</h3>
            <br>
            <table class="w3-table w3-striped w3-border" style="width:80%" align="center">
                <tr>
                    <th>No</th>
                    <th>Tanggal Periksa</th>
                    <th>ID Pasien</th>
                    <th>Nama Pasien</th>
                    <th>Diagnosis</th>
                    <th>Preskripsi Obat</th>
                    <th>Action</th>
                </tr>
                <?php
                while ($tampil = mysqli_fetch_array($ambildata)){
                    echo "
                    <tr>
                        <td>$no</td>
                        <td>$tampil[tanggal_periksa]</td>
                        <td>$tampil[id_pasien]</td>
                        <td>$tampil[nama_pasien]</td>
                        <td>$tampil[diagnosis]</td>
                        <td>$tampil[preskripsi_obat]</td>
                        <td> <a href = 'updatepemeriksaan.php?update=$tampil[id_periksa]'>
                            <input type = 'button' value = 'Edit'>
                            </a>
                        </td>
                    </tr>";
                    $no++;
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



</html>