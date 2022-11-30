<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Registrasi</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- STYLE -->
    <?php include "D:/xampp/htdocs/tubes_sik/templates/style.php"; ?>

</head>

<body>
  <div class="w3-center">
  	<h2>Registrasi</h2>
  </div>
  <div class="w3-center">
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
	<select name="role">
      <option value="" disabled selected>Role</option>
      <option value="admin">Admin</option>
      <option value="dokter">Dokter</option>
      <option value="pasien">Pasien</option>
      <option value="apoteker">Apoteker</option>
    </select>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
    
  	<p>
  		Sudah registrasi? <a href="login.php">Login</a>
  	</p>
  </form>
  </div>
</body>
</html>