<!-- Connect to the DB -->
<?php 
include "include/configDB.php";
session_start();
if(!isset($_SESSION['role'])){
    header("location: index.php");
  }else if ($_SESSION['role']!='apoteker'){
    header('location: errorRedirect.php');
}
?>

<!DOCTYPE html>
<html>

<!-- HEAD -->
<head>
    <title>Puskesmas Ganesha : Preskripsi Obat </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- STYLE -->
    <?php include "templates/style.php"; ?>
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

<!-- BODY -->
<body>
    <!-- Navbar (sit on top) -->
    <?php include "templates/navbarWithMenuApoteker.php"; ?>

    <!-- Sidebar (hidden by default) -->
    <?php include "templates/sidebarApoteker.php"; ?>

    <!-- Header with full-height image -->
    <?php include "templates/header.php"; ?>

    <!-- 'Preskripsi' Section -->
    
    <div class="w3-container" style="padding:16px 16px" id="preskripsi">
        <h3 class="w3-center"><b> Obat</b></h3>
        <div class="w3-row-padding" style="margin-top:32px">

        <table class="w3-table-all w3-hoverable w3-card">
        <thead>
          <tr class="w3-light-grey">
            <th>Waktu Pemeriksaan</th>
            <th>ID Pemeriksaan</th>
            <th>Nama Pasien</th>
            <th>Preskripsi Obat</th>
            <th>Status</th>
          </tr>
        </thead>

        <!-- PHP CODE TO FETCH DATA FROM ROWS -->
        <?php
                //nama pasien blm bisa diambil, karena data nama pasien masih di tabel pasien
                //hrs dibikin query buat ngambilnya
                
                $sql = mysqli_query($configDB,"SELECT time_stamp,id_periksa,nama_pasien,preskripsi_obat,assigned FROM periksa,pasien WHERE periksa.id_pasien = pasien.id AND periksa.preskripsi_obat != '' order by time_stamp DESC LIMIT 10");
                // LOOP TILL END OF DATA
                while($row = mysqli_fetch_row($sql))
                {
            ?>
        
        <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $row[0];?></td>
                <td><?php echo $row[1];?></td>
                <td><?php echo $row[2];?></td>
                <td><?php echo $row[3];?></td>
                <td><?php echo $row[4];?></td>
        </tr>
        
        <?php
                }
            ?>
      </table>

        </div>

        <div class="w3-row-padding" style="margin-top:32px">
        <p class="w3-center">Menampilkan 10 Data Preskripsi Obat Terbaru.</p>
        </div>
    </div>

    <!-- ASSIGN OBAT -->
    <div class="form_wrapper" style="margin-top:32px">    
    <form  class="w3-center" action="actions/stokObatMinus.php" method="post" align ="center">
        <div class="w3-center">
        <table>
            <tr>
                <td><b>ID Periksa</b></td>
                <td><input class="w3-input w3-border" name="idPeriksa" type="text"></td>
            </tr>
            <tr>
                <td><b>Nama Obat</b></td>
                <td><input class="w3-input w3-border" name="namaObat" type="text"></td>
            </tr>
        
            <tr>
                <td></td>
                <td><input class="w3-btn w3-round w3-red" name="assign" value="Assign" type="submit">
            </tr>
        </table>
        </div>
    </form>
    </div>

    <!-- Footer -->
    <?php include "templates/footer.php"; ?>

    <!-- Script -->
    <?php include "include/script.php"; ?>
</body>

</html>
