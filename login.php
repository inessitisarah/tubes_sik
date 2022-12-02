<!-- Connect to the DB -->
<?php include "C:/xampp/htdocs/tubes_sik/include/configDB.php"; ?>
<?php include "C:/xampp/htdocs/tubes_sik/templates/navbarWithoutMenu.php"; ?>
<?php include "C:/xampp/htdocs/tubes_sik/templates/style.php"; ?>
<?php include "server.php"; ?>

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
    <?php include "C:/xampp/htdocs/tubes_sik/templates/style.php"; ?>





<body>
    <h3>LOGIN</h3>

    <link rel="stylesheet" type="text/css" href="style.css">



     <form  method="post" action="login.php">

        <h2>LOGIN</h2>

        <?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>

        <label>Username</label>

        <input type="text" name="username" placeholder="Username"><br>

        <label>Password</label>

        <input type="password" name="password" placeholder="Password"><br> 

        <div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	    </div>

     </form>
     <p>
  		Belum mendaftarkan akun? Daftarkan di sini: <a href="register.php">Registrasi</a>
  	</p>

</body>
<?php include "C:/xampp/htdocs/tubes_sik/templates/footer.php"; ?>

</html>


