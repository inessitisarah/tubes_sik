<?php 
include('server.php');
session_start();
if(!isset($_SESSION['role'])){
      header("location: index.php");
    }else if ($_SESSION['role']!='admin'){
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



	?>

</head>

<body>
    <!-- Navbar (sit on top) -->
    <?php include "templates/navbarWithMenuAdmin.php"; ?>

    <!-- Sidebar (hidden by default) -->
    <?php include "templates/sidebarAdmin.php"; ?>

    <!-- Header with full-height image -->
    <?php include "templates/headerHome.php"; ?>

  <br></br>
  <div class="w3-center">
  	<h2><b>Data Dokter</b></h2>
  </div>
  <div class="w3-center">
  <form method="post" action="regdataDokter.php" class="w3-center">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <input type="integer" class="w3-hover-shadow w3-input w3-center" name="id_dokter" placeholder="Id Dokter" value="<?php echo $id_dokter; ?>">
  	</div>
  	<div class="input-group">
  	  <input type="text" class="w3-hover-shadow w3-input w3-center" name="nama_dokter" placeholder="Nama Dokter" value="<?php echo $nama_dokter; ?>">
  	</div>
      <select name="poli_dokter" class="w3-dropdown-click:hover w3-btn w3-round">
      <option value="" disabled selected>Poli Dokter</option>
      <option value="Umum">Umum</option>
      <option value="Gigi dan Mulut">Gigi dan Mulut</option>
      <option value="Kesehatan Ibu Anak">Kesehatan Ibu Anak</option>
      <option value="Keluarga Berencana">Keluarga Berencana</option>
    </select>
    <div class="spesialisasi">
  	  <input type="text" name="spesialisasi" class="w3-hover-shadow w3-input w3-center" placeholder="Spesialisasi" value="<?php echo $spesialisasi; ?>">
  	</div> 
    <br></br>
  	<div class="input-group">
  	  <button type="submit" class="w3-btn w3-black w3-round" name="data_dokter">Submit</button>
  	</div>    
  </form>
  </div>
</body>
<?php include "templates/footer.php"; ?>

</html>