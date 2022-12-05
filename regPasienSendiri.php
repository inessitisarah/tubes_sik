<?php 
include('server.php');
session_start();
if(!isset($_SESSION['role'])){
      header("location: index.php");
    }else if ((($_SESSION['role']!=('admin'))&&($_SESSION['role']!=('pasien')))){
      header('location: errorRedirect.php');

  }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- STYLE -->
    <?php 
	  include "templates/style.php"; 
    include "include/script.php";
	  ?>

</head>

<body>
    <!-- Navbar (sit on top) -->
  <?php include "templates/navbarWithMenuAdmin.php"; ?>

    <!-- Sidebar (hidden by default) -->
  <?php include "templates/sidebarAdmin.php"; ?>

    <!-- Header with full-height image -->
  <?php include "templates/headerHome.php"; ?>

  <div class="w3-center">
  	<h3>Data Pasien</h3>
  </div>
  <div class="w3-center">
    <form method="post" action="regPasienSendiri.php" class="w3-center">
      <?php include('errors.php'); ?>
      <div class="input-group">
        <input type="text" class="w3-hover-shadow w3-input w3-center" name="nama_pasien" placeholder="Nama Pasien" value="<?php echo $nama_pasien; ?>">
      </div>
      <div class="input-group">
        <input type="text" class="w3-hover-shadow w3-input w3-center" name="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>">
      </div>
      <div class="input-group">
        <input type="date" class="w3-hover-shadow w3-input w3-center" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>">
      </div>
      <div>
        <select class="w3-dropdown-click:hover w3-btn w3-round" name="jenis_kelamin">
            <option value="" disabled selected>Jenis Kelamin</option>
            <option value="Pria">Pria</option>
            <option value="Wanita">Wanita</option>
          </select>
      </div>
      <div>
        <select class="w3-dropdown-click:hover w3-btn w3-round" name="golongan_darah">
          <option value="" disabled selected>Golongan Darah</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="A">O</option>
          <option value="B">AB</option>
        </select>
      </div>
      
      <div class="input-group">
        <button type="submit"  class="w3-btn w3-black w3-round" name="data_sendiri">Submit</button>
      </div>
      
    </form>
  </div>
</body>
<?php include "templates/footer.php"; ?>

</html>