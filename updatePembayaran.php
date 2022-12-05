<h2>Update Data Pemeriksaan</h2>

<?php
    include "include/configDB.php";
    $sql=mysqli_query($configDB,"Select * from periksa,dokter, pasien  
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
    <?php include "templates/style.php";
    include "include/script.php"; 
    ?>
    <style>
    body{
    text-align:center;
    }
    body .form_wrapper{
    display:inline-block;
    background-color: #EFEBE9;
    border-radius: 5px;
    height: auto;
    padding: 15px 18px;
    margin: 5% auto;
    margin-left: auto;
    margin-right: auto;
    } 
    </style>
    
</head>

<!-- INISIALISASI VARIABEL -->

<?php 
    $tanggal_sekarang = date("Y-m-d");
    $usia = date_diff(date_create($data['tanggal_lahir']), date_create($tanggal_sekarang));
?>

<!-- BODY -->
<body>
    <!-- Navbar (sit on top) -->
    <?php include "templates/navbarWithMenuAdmin.php"; ?>

    <!-- Navbar (sit on top) -->
    <?php include "templates/headerdokter.php"; ?>

    <div class="w3-container" style="padding:32px 16px">
    <h3 class="w3-center"><b>Mengupdate Data Pemeriksaan</b></h3>

    <!-- Updating Section -->

    <div class = "form_wrapper">   
    <form  class="w3-container w3-center" action="" method="post" align ="center">
        <div class="w3-center">
        <table>
            <tr>
                <td width="150"><b>Nama</b></td>
                <td><?php echo $data['nama_pasien']; ?></td>
            </tr>

            <tr>
                <td width="150"><b>Usia</b></td>
                <td><?php echo $usia->format('%y');
                echo " tahun"; ?></td>
            </tr>
            
            <tr>
                <td width="150"><b>Golongan Darah</b></td>
                <td><?php echo $data['golongan_darah']; ?></td>
            </tr>
  <!--           <tr>
                <td><b>Pembayaran</b></td>
                <td><input class="w3-input w3-border" type="text" name="pembayaran" size="30" value="<?php echo $data['pembayaran']; ?>"></td>
            </tr> -->
        
            <tr>
                <td></td>
                <td><input class="w3-btn w3-round w3-teal" type="submit" value="Simpan" name="pembayaran"></td>
            </tr>
        </table>
        </div>
    </form>
    </div>
    
    </div>

    <!-- Footer -->
    <?php include "templates/footer.php"; ?>

    <!-- Script -->
    <?php include "include/script.php"; ?>

</body>
</html>

<?php

if(isset($_POST['pembayaran'])){

    mysqli_query($configDB,"update periksa set
    pembayaran = '$_POST[pembayaran]'
    where id_periksa = $_GET[update]") or die(mysqli_error($configDB));
    
    echo "<script>alert('Data telah tersimpan');
    document.location='pagedataPemeriksaan.php'</script>";
}
 
?>