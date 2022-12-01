<html>
<!-- HEAD -->
<head>
    <title>Halaman Dokter</title>
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
    <?php include "templates/navbarWithoutMenu.php"; ?>
    <?php 
    session_start(); 
    ?>
    </div>

    <br><br><br><br>
    <div>
    <?php
    
    ?>
    <h2 class="w3-center"><b>Selamat Datang Dokter <?php echo $_POST["uname"]; ?>!</b></h2>
    <br><br>
    </div>

    <div>
    <?php
        include "koneksiDB.php";
        $user = $_POST["uname"];
        $no = 1;
        $tanggal_sekarang = date("Y-m-d");

        $ambildata = mysqli_query($koneksiDB, "select * from tabel_pasien, tabel_periksa, tabel_dokter
        WHERE tabel_dokter.uname = '$user' AND tabel_periksa.tanggal_periksa = '$tanggal_sekarang' AND tabel_periksa.id_pasien = tabel_pasien.id_pasien AND tabel_dokter.id_dokter = tabel_periksa.id_dokter") or die (mysqli_error($koneksiDB));

        $num_rows = mysqli_num_rows($ambildata); 

        if ($num_rows == 0){ ?>
            <h3 class="w3-center">Tidak Ada Reservasi Pemeriksaan</h3>
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
                    <th>Action</th>
                </tr>
                <?php
                while ($tampil = mysqli_fetch_array($ambildata)){
                    echo "
                    <tr>
                        <td>$no</td>
                        <td>$tampil[tanggal_periksa]</td>
                        <td>$tampil[nama_pasien]</td>
                        <td>$tampil[diagnosis]</td>
                        <td>$tampil[preskripsi_obat]</td>
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