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
	include "templates/navbarWithoutMenuLoginReg.php";
	?>

</head>

<body>

  <div class="w3-center">
  	<h3>Data Dokter</h3>
  </div>
  <div class="w3-center">
  <form method="post" action="regdataDokter.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Id Dokter</label>
  	  <input type="integer" name="id_dokter" value="<?php echo $id_dokter; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Nama Dokter</label>
  	  <input type="text" name="nama_dokter" value="<?php echo $nama_dokter; ?>">
  	</div>
      <select name="poli_dokter">
      <option value="" disabled selected>Poli Dokter</option>
      <option value="Umum">Umum</option>
      <option value="Gigi dan Mulut">Gigi dan Mulut</option>
      <option value="Kesehatan Ibu Anak">Kesehatan Ibu Anak</option>
      <option value="Keluarga Berencana">Keluarga Berencana</option>
    </select>
    <div class="spesialisasi">
  	  <label>Spesialisasi Dokter</label>
  	  <input type="text" name="spesialisasi" value="<?php echo $spesialisasi; ?>">
  	</div> 
  	<div class="input-group">
  	  <button type="submit" class="btn" name="data_dokter">Submit</button>
  	</div>
    
  </form>
  </div>
</body>
<?php include "templates/footer.php"; ?>

</html>