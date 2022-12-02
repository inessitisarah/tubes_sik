<!-- Ini sudah disesuaikan nama tabel dan kolomnya -->


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

    <!-- Sidebar (hidden by default) -->
    <?php include "C:/xampp/htdocs/tubes_sik/templates/sidebarDokter.php"; ?>
    </div>


    <div>
    <!--nyoba ngambil user dari username session -->
    <?php 
    $id =  $_SESSION['id'];
    $username = $_SESSION['username'];
    ?>

    <?php
        include "C:/xampp/htdocs/tubes_sik/include/configDB.php";
    ?>

    <br><br><br><br>
    <h2 class="w3-center"><b>Selamat Datang Dokter <?php echo $_SESSION['nama']; ?>!</b></h2>
    </div>

    <div>
    <?php
        $no = 1;
        date_default_timezone_set('Asia/Hong_Kong');
        $tanggal_sekarang = date("Y-m-d");
        echo $id;


        $ambildata = mysqli_query($configDB, "select * from pasien, periksa, dokter
        WHERE periksa.id_dokter = '$id' ") or die (mysqli_error($koneksiDB));

        $num_rows = mysqli_num_rows($ambildata);

        if ($num_rows == 0){ ?>
            <h3 class="w3-center">Tidak Ada Reservasi Pemeriksaan Hari Ini</h3>
            <?php
        }
        
        else{
            ?>
            <h3 class="w3-center">Berikut Data Reservasi Pemeriksaan Anda Hari Ini:</h3>
            <br><br>
            <table class="w3-table w3-striped w3-border" align="center">
                <tr>
                    <th>No</th>
                    <th>Tanggal Periksa</th>
                    <th>Nama Pasien</th>
                    <th>Diagnosis</th>
                    <th>Preskripsi Obat</th>
                    <th>ID Periksa</th>
                    <th>Action</th>
                </tr>
                <?php
                while ($tampil = mysqli_fetch_array($ambildata)){
                    echo "
                    <tr>
                        <td>$no</td>
                        <td>$tampil[tanggal_periksa]</td>
                        <td>$tampil[nama]</td>
                        <td>$tampil[diagnosis]</td>
                        <td>$tampil[preskripsi_obat]</td>
                        <td>$tampil[id_periksa]</td>
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
        <?php include "C:/xampp/htdocs/tubes_sik/templates/footer.php"; ?>

        <!-- Script -->
        <?php include "C:/xampp/htdocs/tubes_sik/include/script.php"; ?>
    </div>
</body>



</html>