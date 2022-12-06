<!-- Connect to the DB -->
<?php 
include "include/configDB.php";
session_start();
if(!isset($_SESSION['role'])){
    header("location: index.php");
  }else if ($_SESSION['role']!='apoteker'){
    header('location: errorRedirect.php');
}
 ?>

<!DOCTYPE html>
<html>

<!-- HEAD -->
<head>
    <title>Puskesmas Ganesha : Stok Obat</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- STYLE -->
    <?php include "templates/style.php"; ?>
</head>

<!-- BODY -->
<body>
    <!-- Navbar (sit on top) -->
    <?php include "templates/navbarWithMenuApoteker.php"; ?>

    <!-- Sidebar (hidden by default) -->
    <?php include "templates/sidebarApoteker.php"; ?>

    <!-- Header with full-height image -->
    <?php include "templates/header.php"; ?>

    <!-- 'Stok' Section -->
    <div class="w3-container " style="padding:64px 16px" id="stok">
        <h3 class="w3-center"><b>Stok Obat</b></h3>
        <div class="w3-row-padding" style="margin-top:32px">

            <div class="w3-half">
            <form class="w3-container w3-card-4" action="actions/stokObatCek.php" method="get">
                <p>      
                <label class="w3-text-teal"><b>Nama</b></label>
                <input class="w3-input w3-border" name="namaObat" type="text"></p>
                <div class="w3-left">
                    <p>      
                    <input class="w3-btn w3-round w3-teal" name="cek" value="Cek" type="submit">
                    </p>
                </div>
            </form>
            </div>

            <div class="w3-half">
            <form class="w3-container w3-card-4" action="actions/stokObatMinus.php" method="post">
                <p>      
                <label class="w3-text-red"><b>Nama</b></label>
                <input class="w3-input w3-border" name="namaObat" type="text"></p>
                <div class="w3-left">
                    <p>      
                    <input class="w3-btn w3-round w3-red" name="minus" value="Minus" type="submit">
                    </p>
                </div>
            </form>
            </div>

            <div class="w3-row-padding" style="margin-top:256px">
            <div class="w3-half">
            <form class="w3-container w3-card-4" action="actions/stokObatInsert.php" method="post">
                <p>      
                <label class="w3-text-indigo"><b>Nama</b></label>
                <input class="w3-input w3-border" name="namaObat" type="text"></p>
                <label class="w3-text-indigo"><b>Stok</b></label>
                <input class="w3-input w3-border" name="stokObat" type="text"></p>
                <label class="w3-text-indigo"><b>Cara Penggunaan</b></label>
                <input class="w3-input w3-border" name="caraPenggunaan" type="text"></p>
                <label class="w3-text-indigo"><b>Harga</b></label>
                <input class="w3-input w3-border" name="hargaObat" type="text"></p>
                <div class="w3-left">
                    <p>      
                    <input class="w3-btn w3-round w3-indigo" name="insert" value="Insert" type="submit">
                    </p>
                </div>
            </form>
            </div>

            <div class="w3-half">
            <form class="w3-container w3-card-4" action="actions/stokObatUpdate.php" method="post">
                <p>      
                <label class="w3-text-deep-orange"><b>Nama</b></label>
                <input class="w3-input w3-border" name="namaObat" type="text"></p>
                <label class="w3-text-deep-orange"><b>Stok</b></label>
                <input class="w3-input w3-border" name="stokObat" type="text"></p>                
                <label class="w3-text-deep-orange"><b>Cara Penggunaan</b></label>
                <input class="w3-input w3-border-deep-orange" name="caraPenggunaan" type="text"></p>
                <label class="w3-text-deep-orange"><b>Harga</b></label>
                <input class="w3-input w3-border-deep-orange" name="hargaObat" type="text"></p>
                <div class="w3-left">
                    <p>      
                    <input class="w3-btn w3-round w3-deep-orange" name="update" value="Update" type="submit">
                    <!-- <a href="updateStokObat.php" class="w3-btn w3-round w3-teal">Update</a> -->
                    </p>
                </div>
            </form>
            </div>
            </div>

        </div>
    </div>

    <!-- Footer -->
    <?php include "templates/footer.php"; ?>

    <!-- Script -->
    <?php include "include/script.php"; ?>
</body>

</html>
