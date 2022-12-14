<!-- Connect to the DB -->
<?php include "include/configDB.php"; ?>
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
    <?php 
    include "templates/style.php"; 
    include "templates/navbarWithoutMenuLoginReg.php";
    include "templates/headerlagi.php"
    ?>
    <style>
    body{
    text-align:center;
    }
    body .form_wrapper{
    display:inline-block;
    border-radius: 5px;
    height: auto;
    padding: 15px 18px;
    margin-left: auto;
    margin-right: auto;
    } 
    </style>
</head>



 <!-- BODY -->

<body class="w3-container">
    <br></br>
    <h2 class="w3-center"><b>LOGIN</b></h2>
    <form method="post" class="w3-center" action="login.php">
        <?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>
        <div class="form_wrapper">
        <input type="text" class="w3-hover-shadow w3-input w3-round w3-center" name="username" placeholder="Username">
        <input type="password" class="w3-hover-shadow w3-input w3-round w3-center" name="password" placeholder="Password"><br> 
        </div>
    </br>
        <div class="input-group">
  		<button type="submit" class="w3-btn w3-round w3-black" name="login_user">Login</button>
  	    </div>

     </form>
     <p class="w3-center">
  		Belum mendaftarkan akun? Daftarkan di sini: <a href="register.php">Registrasi</a>
  	</p>
    <br></br>

</body>
<?php include "templates/footer.php"; ?>

</html>


