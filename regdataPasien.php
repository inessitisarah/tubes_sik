<?php include('server.php') ?>
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
	<h3>Data Pasien</h3>

  <div class="w3-center">
  	<h3>Data Pasien</h3>
  </div>
  <div class="w3-center">
  <form method="post" action="regdataPasien.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Id Pasien</label>
  	  <input type="integer" name="id_pasien" value="<?php echo $id_pasien; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Nama Pasien</label>
  	  <input type="text" name="nama_pasien" value="<?php echo $nama_pasien; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Alamat</label>
  	  <input type="text" name="alamat" value="<?php echo $alamat; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Tanggal Lahir</label>
  	  <input type="date" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>">
  	</div>
	<select name="jenis_kelamin">
      <option value="" disabled selected>Jenis Kelamin</option>
      <option value="Pria">Pria</option>
      <option value="Wanita">Wanita</option>
    </select>
    <select name="golongan_darah">
      <option value="" disabled selected>Golongan Darah</option>
      <option value="A">A</option>
      <option value="B">B</option>
      <option value="A">O</option>
      <option value="B">AB</option>
    </select>
    
  	<div class="input-group">
  	  <button type="submit" class="btn" name="data_pasien">Submit</button>
  	</div>
    
  </form>
  </div>
</body>
<?php include "templates/footer.php"; ?>

</html>