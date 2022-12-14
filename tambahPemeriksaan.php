<?php 
    session_start(); 
    $id_pasien =  $_SESSION['id'];
    require "include/configDB.php";
    session_start();
    if(!isset($_SESSION['role'])){
        header("location: index.php");
      }else if ($_SESSION['role']!='pasien'){
        header('location: errorRedirect.php');
    }
?>

<html>

<!-- HEAD -->
<head>
    <title>Reservasi Pemeriksaan</title>
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
        <?php include "templates/navbarWithMenuTambahPemeriksaan.php"; ?>
    </div>

    <!-- Header -->
    <div>
    <?php include "templates/headerPasien.php"; ?>
    </div>

    <br><br><br><br>

    <h2 class="w3-center"><b>Berikut Jadwal Dokter Kami:</b></h2>
    <br><br>

    <?php       
        $ambiljadwaldokter = mysqli_query($configDB, "SELECT * from dokter, jadwal_dokter 
        WHERE dokter.id = jadwal_dokter.id ORDER BY dokter.poli") or die (mysqli_error($configDB));
    $_SESSION['id'] = $id_pasien;
    ?>

    <table class="w3-table w3-striped w3-border" align="center">
            <tr>
                <th>Poli</th>
                <th>Nama Dokter</th>
                <th>Hari Praktik</th>
                <th>Waktu Praktik</th>
            </tr>
            <?php
                while ($tampil = mysqli_fetch_array($ambiljadwaldokter)){
                    echo "
                    <tr>
                        <td>$tampil[poli]</td>
                        <td>$tampil[nama_dokter]</td>
                        <td>$tampil[hari]</td>
                        <td>$tampil[waktu_mulai] - $tampil[waktu_selesai]</td>
                    </tr>";
                }
            ?>
    </table>
    <br><br><br>

    <div class="w3-center">
    <form action="" method="post">        
        <table class="w3-table w3-centered"">
            <tr>
                <label>Dokter </label>
                <select name="nama" id="nama">
                    <option disabled selected> Pilih Dokter </option>
                    <?php
                        $query = mysqli_query($configDB, "SELECT * FROM dokter");
                        while ($hasilquery = mysqli_fetch_array($query)){
                            ?>
                            <option value="<?=$hasilquery['nama_dokter']?>"><?=$hasilquery['nama_dokter']?></option>
                            <?php
                        }
                    ?>
                </select>
            </tr>

            <div class="input-group">
  	        <label>Tanggal Periksa</label>
  	        <input type="date" name="tanggal_periksa" >
  	        </div>

            <div>
            <tr>
                <td><input class="w3-center w3-btn w3-round w3-teal"type="submit" value="Register" name="proses"></td>
            </tr>
            </div>

        </table>
    </form>
    </div>
    <br><br><br><br>

    <?php
    
    if (isset($_POST['nama'])) {
        $tanggal_periksa = $_POST['tanggal_periksa'];
        $nama_dokter_dicari = $_POST['nama'];
        $getDokterID = mysqli_query($configDB, "SELECT * FROM dokter WHERE dokter.nama_dokter = '$nama_dokter_dicari'");

        while($hasilGetDokterID = mysqli_fetch_array($getDokterID)){
            $id_dokter_searched = $hasilGetDokterID['id'];
        }

        $getNoAntrian = mysqli_query($configDB, "SELECT * FROM periksa 
        WHERE periksa.id_dokter = '$id_dokter_searched' AND periksa.tanggal_periksa = '$tanggal_periksa'");

        while ($hasilGetNoAntrian = mysqli_fetch_array($getNoAntrian)){
            $no_antrian = $hasilGetNoAntrian['no_antrian'];
        }
        $no_antrian++;


        //variabel query adalah variabel yang menyimpan perintah sql dml
        $query = mysqli_query($configDB, "INSERT INTO periksa (id_dokter, id_pasien, tanggal_periksa, no_antrian) VALUES ('$id_dokter_searched', '$id_pasien', '$tanggal_periksa', '$no_antrian')");
        if ($query) {
            echo "<script>alert('Registrasi Pemeriksaan Berhasil. No Antrian: $no_antrian!');
            document.location='pagePasien.php'</script>";
        } else {
            echo "Input Gagal";
        }
    }
    ?>

    <div>
        <!-- Footer -->
        <?php include "templates/footer.php"; ?>

        <!-- Script -->
        <?php include "include/script.php"; ?>
    </div>

</body>
</html>



