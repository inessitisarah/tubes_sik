<?php include('server.php'); ?>

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
	<br></br>
	<br></br>


	<div class="w3-center">
  	<h3><b>Registrasi</b></h3>
	</div>

	<form method="post" class="w3-center" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <input type="text" name="username" class="w3-hover-shadow w3-input" placeholder="Username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <input type="email" name="email" class="w3-hover-shadow w3-input" placeholder="Email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <input type="password" class="w3-hover-shadow w3-input" placeholder="Password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <input type="password" class="w3-hover-shadow w3-input" placeholder="Confirm Password" name="password_2">
  	</div>
	<br></br>
	<select name="role" class="w3-dropdown-click:hover w3-btn w3-round">
      <option value="" disabled selected>Role</option>
      <option value="admin">Admin</option>
      <option value="dokter">Dokter</option>
      <option value="pasien">Pasien</option>
      <option value="apoteker">Apoteker</option>
    </select>
	<br></br>
  	<div class="input-group">
  	  <button type="submit" class="w3-btn w3-black w3-round" name="reg_user">Register</button>
  
    
  	<p>
  		Sudah registrasi? <a href="login.php">Login</a>
  	</p>
  </form>
  </div>
</body>
<?php include "templates/footer.php"; ?>

</html>