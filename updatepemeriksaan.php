<h2>Update Data Pemeriksaan</h2>

<?php
    include "C:/xampp/htdocs/tubes_sik/koneksiDB.php";
    $sql=mysqli_query($koneksiDB,"Select * from periksa,dokter, pasien  
    where periksa.id_periksa ='$_GET[update]' AND periksa.id_pasien = pasien.id AND dokter.id = periksa.id_dokter");
    $data=mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html>

<!-- HEAD -->
<head>
    <title>Puskesmas Ganesha : Update Data Pemeriksaan</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- STYLE -->
    <?php include "C:/xampp/htdocs/tubes_sik/templates/style.php"; ?>
    <style> 
    input[type=text] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
    }
    </style>
</head>

<!-- BODY -->
<body>
    <!-- Navbar (sit on top) -->
    <?php include "C:/xampp/htdocs/tubes_sik/templates/navbarWithMenuApoteker.php"; ?>

    <br><br>
    <h3 class="w3-center"><b>Mengupdate Data Pemeriksaan</b></h3>

    <!-- Updating Section -->

    <div class="w3-row-padding" style="margin-top:32px">    
    <form class="w3-center-container w3-card-4" action="" method="post">
        <table>
            <tr>
                <td width="100">Nama</td>
                <td><?php echo $data['nama_pasien']; ?></td>
            </tr>
            
            <tr>
                <td>Diagnosis</td>
                <td><input class="w3-input w3-border" type="text" name="diagnosis" size="30" value="<?php echo $data['diagnosis']; ?>"></td>
            </tr>
            
            <tr>
                <td>Preskripsi Obat</td>
                <td><input class="w3-input w3-border" type="text" name="preskripsi_obat" size="30" value="<?php echo $data['preskripsi_obat']; ?>"></td>
            </tr>
        
            <tr>
                <td></td>
                <td><input class="w3-btn w3-round w3-teal"type="submit" value="Simpan" name="proses"></td>
            </tr>
        </table>
    </form>

    <!-- Footer -->
    <?php include "C:/xampp/htdocs/tubes_sik/templates/footer.php"; ?>

    <!-- Script -->
    <?php include "C:/xampp/htdocs/tubes_sik/include/script.php"; ?>

</body>
</html>

<?php

if(isset($_POST['proses'])){

    mysqli_query($koneksiDB,"update tabel_periksa set
    diagnosis = '$_POST[diagnosis]',
    preskripsi_obat = '$_POST[preskripsi_obat]'
    where id_periksa = $_GET[update]") or die(mysqli_error($koneksi));
    
    echo "<script>alert('Data telah tersimpan');
    document.location='pagedokter.php'</script>";
}
 
?>