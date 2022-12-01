<!-- Connect to the DB -->
<?php include "D:/xampp/htdocs/tubes_sik/include/configDB.php"; ?>
<?php include "D:/xampp/htdocs/tubes_sik/templates/navbarWithoutMenu.php"; ?>
<?php include "D:/xampp/htdocs/tubes_sik/templates/style.php"; ?>
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
    <?php include "D:/xampp/htdocs/tubes_sik/templates/style.php"; ?>



<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Belum registrasi? <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>

<?php include "D:/xampp/htdocs/tubes_sik/templates/footer.php"; ?>

</html>


