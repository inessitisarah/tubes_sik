<!-- Connect to the DB -->
<?php include "D:/xampp/htdocs/tubes_sik/include/configDB.php"; ?>
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
    <title>LOGIN</title>


</head>

<body>
    <h3>LOGIN</h3>

    <link rel="stylesheet" type="text/css" href="style.css">
    <?php include "D:/xampp/htdocs/tubes_sik/templates/navbarWithoutMenu.php"; ?>
    <?php include "D:/xampp/htdocs/tubes_sik/templates/style.php"; ?>


     <form action="pagePasien.php" method="post">

        <h2>LOGIN</h2>

        <?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>

        <label>User Name</label>

        <input type="text" name="uname" placeholder="User Name"><br>

        <label>Password</label>

        <input type="password" name="password" placeholder="Password"><br> 

        <button type="submit">Login</button>

     </form>

</body>
<?php include "D:/xampp/htdocs/tubes_sik/templates/footer.php"; ?>

</html>