<!-- Connect to the DB -->
<?php include "include/configDB.php"; ?>

<!DOCTYPE html>
<html>

<!-- HEAD -->
<head>
    <title>Homepage : Puskesmas Ganesha</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- STYLE -->
    <?php include "templates/style.php"; ?>
</head>

<!-- BODY -->
<body>
    <!-- Navbar (sit on top) -->
    <?php include "templates/navbarWithoutMenu.php"; ?>

    <!-- Sidebar (hidden by default) -->

    <!-- Header with full-height image -->
    <?php include "templates/headerHome.php"; ?>

    <!-- 'Tentang Kami' Section -->
    <div class="w3-container" style="padding:64px 16px" id="tentang">
        <h3 class="w3-center"><b>Tentang Kami</b></h3>
            <p class="w3-center w3-large">Puskesmas Ganesha adalah salah satu Puskesmas di Kota Bandung yang beralamatkan di Jl. Ganesha No. 10 Coblong, Kota Bandung. Wilayah binaan Puskesmas Ganesha meliputi daerah di sekitar ITB. Puskesmas Ganesha merupakan fasilitas pelayanan kesehatan tingkat pertama dalam upaya menyelenggarakan Upaya Kesehatan Masyarakat dan Upaya Kesehatan Perorangan dengan mengutamakan Upaya Promotif dan Preventif untuk mencapai derajat kesehatan masyarakat yang setinggi-tingginya.</p>
            <div class="w3-row-padding w3-center" style="margin-top:64px">

            <div class="w3-quarter">
                <i class="fa fa-desktop w3-margin-bottom w3-jumbo w3-center"></i>
                <p class="w3-large">Visi</p>
                <p>Menjadikan masyarakat wilayah kerja UPTD Puskesmas Ganesha mandiri untuk hidup sehat</p>
            </div>

            <div class="w3-quarter">
                <i class="fa fa-heart w3-margin-bottom w3-jumbo"></i>
                <p class="w3-large">Misi</p>
                <ul>
                    <li>Meningkatkan akses dan mutu pelayanan kesehatan puskesmas</li>
                    <li>Memberdayakan masyarakat dan lingkungan di sekitar puskesmas</li>
                </ul>
            </div>

            <div class="w3-quarter">
                <i class="fa fa-diamond w3-margin-bottom w3-jumbo"></i>
                <p class="w3-large">Motto</p>
                <p>Ganesha SATUNADA (Sahabat Kesehatan Untuk Anda)</p>
            </div>

            <div class="w3-quarter">
                <i class="fa fa-cog w3-margin-bottom w3-jumbo"></i>
                <p class="w3-large">Budaya Kerja</p>
                <p><b>C</b>erdik<br> <b>E</b>tika<br> <b>R</b>amah<br> <b>I</b>khlas<br> <b>A</b>kuntabel</p>
            </div>
            </div>
    </div>

    <!-- 'Layanan' Section -->
<div class="w3-container w3-light-grey" style="padding:64px 16px" id="layanan">
  <h3 class="w3-center"><b>Jadwal Layanan</b></h3>
  <p class="w3-center w3-large">Berikut ini adalah fasilitas yang dimiliki Puskesmas Ganesha dalam rangka menyediakan layanan kesehatan bagi masyarakat</p>
  <div class="w3-row-padding w3-grayscale" style="margin-top:32px">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="images/umum.jpeg" alt="Poliklinik Umum" style="width:100%">
        <div class="w3-container">
          <h3>Umum</h3>
          <p class="w3-opacity">Poli Pelayanan</p>
          <p> Layanan berupa pemeriksaan fisik, pengobatan dan penyuluhan kepada pasien atau masyarakat, serta pemberian rujukan.</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-calendar"></i> Senin-Sabtu : <time>08:00</time> - <time>14:30</time></button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="images/gigi.jpg" alt="Poliklinik Gigi" style="width:100%">
        <div class="w3-container">
          <h3>Gigi dan Mulut</h3>
          <p class="w3-opacity">Poli Pelayananan</p>
          <p>Layanan berupa pemeriksaan kesehatan gigi dan mulut, penambalan, pencabutan serta pembersihan karang gigi.</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-calendar"></i> Senin-Sabtu : <time>08:00</time> - <time>14:30</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="images/kia.jpeg" alt="Poliklinik KIA" style="width:100%">
        <div class="w3-container">
          <h3>Kesehatan Ibu Anak</h3>
          <p class="w3-opacity">Poli Pelayanan</p>
          <p>Layanan berupa pemeriksaan kehamilan, pengobatan anak/balita, konsultasi kesehatan reproduksi, dan imunisasi.</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-calendar"></i> Senin-Kamis : <time>08:00</time> - <time>14:30</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="images/kb.jpg" alt="Poliklinik KB" style="width:100%">
        <div class="w3-container">
          <h3>Keluarga Berencana</h3>
          <p class="w3-opacity">Poli Pelayanan</p>
          <p>Layanan berupa konseling KB, pemberian layanan KB, mengurus efek samping KB, dan memberikan rujukan.</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-calendar"></i> Rabu-Jumat : <time>08:00</time> - <time>11:30</button></p>
        </div>
      </div>
    </div>

    <div class="w3-col l12 m6 w3-margin-bottom">
    <h1 class="w3-center"></h1>
    <table class="w3-table-all w3-hoverable w3-card w3-centered" >
        <thead>
          <tr class="w3-light-grey">
            <th>Poliklinik</th>
            <th>Nama Dokter</th>
            <th>Jadwal Praktek</th>
            <th>Spesialisasi</th>
          </tr>
        </thead>

        <!-- PHP CODE TO FETCH DATA FROM ROWS -->
        <?php
                $sql = mysqli_query($configDB,"SELECT poli_dokter,nama_dokter,jadwal_dokter,spesialisasi FROM dokter order by poli_dokter ASC");
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
        </tr>
        <?php
                }
            ?>
      </table>
      </div>
  </div>
</div>  

    <!-- Footer -->
    <?php include "templates/footer.php"; ?>

    <!-- Script -->
    <?php include "include/script.php"; ?>
</body>

</html>
