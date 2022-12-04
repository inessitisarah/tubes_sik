<?php 
    session_start(); 
    require "include/configDB.php";
    if(!isset($_SESSION['role'])){
        header("location: index.php");
    }else if ($_SESSION['role']!='admin'){
        header('location: errorRedirect.php');

    } 
?>

<html>

<!-- HEAD -->
<head>
    <title>Halaman Pasien</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- STYLE -->
    <?php include "templates/style.php"; ?>
    

</head>

<!--Mengambil dari SESSION eh ini gatau buth apa ngga sih-->
<?php 
    $id =  $_SESSION['id'];
    $username = $_SESSION['username'];
?>

<body>
    <!-- Navbar (sit on top) -->
    <?php include "templates/navbarWithMenuAdmin.php"; ?>

    <!-- Sidebar (hidden by default) -->
    <?php include "templates/sidebarAdmin.php"; ?>

    <!-- Header with full-height image -->
    <?php include "templates/headerHome.php"; ?>

    
    <br><br><br><br>
    <div>

    <!-- Buat menampilkan nama -->

    <h2 class="w3-center"><b>User Data</b></h2>
    <br><br>

    <!--Mengambil data user credentials -->
    <?php       
        $ambildata = mysqli_query($configDB, "select * from user_credentials");

        $num_rows = mysqli_num_rows($ambildata); 

        if ($num_rows == 0){ ?>
            <h3 class="w3-center">Belum ada user yang terdaftar</h3>
            <?php
        }

        else{
            ?>
            <h3 class="w3-center">User Credentials</h3>
            <table class="w3-center w3-table w3-striped w3-border" align="center">
                <tr>
                    <th>User Id</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
                <?php
                while ($tampil = mysqli_fetch_array($ambildata)){
                    echo 
                    "<tr>
                        <td>$tampil[user_id]</td>
                        <td>$tampil[username]</td>
                        <td>$tampil[email]</td>
                        <td>$tampil[role]</td>
                    </tr>";
                }
                ?>
            </table>
            <br><br>
            <?php
        }
    ?>

        <!--Mengambil data pasien -->
    <?php       
        $ambildata = mysqli_query($configDB, "select * from pasien");

        $num_rows = mysqli_num_rows($ambildata); 

        if ($num_rows == 0){ ?>
            <h3 class="w3-center">Belum ada pasien yang informasinya terdaftar</h3>
            <?php
        }

        else{
            ?>
            <h3 class="w3-center">Pasien</h3>
            <table class="w3-center w3-table w3-striped w3-border" align="center">
                <tr>
                    <th>Id Pasien</th>
                    <th>Nama Pasien</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Golongan Darah</th>

                </tr>
                <?php
                while ($tampil = mysqli_fetch_array($ambildata)){
                    echo 
                    "<tr>
                        <td>$tampil[id]</td>
                        <td>$tampil[nama_pasien]</td>
                        <td>$tampil[alamat]</td>
                        <td>$tampil[tanggal_lahir]</td>
                        <td>$tampil[jenis_kelamin]</td>
                        <td>$tampil[golongan_darah]</td>
                    </tr>";
                }
                ?>
            </table>
            <br><br>
            <?php
        }
    ?>
            <!--Mengambil data pasien -->
    <?php       
        $ambildata = mysqli_query($configDB, "select * from dokter");

        $num_rows = mysqli_num_rows($ambildata); 

        if ($num_rows == 0){ ?>
            <h3 class="w3-center">Belum ada pasien yang informasinya terdaftar</h3>
            <?php
        }

        else{
            ?>
            <h3 class="w3-center">Dokter</h3>
            <table class="w3-center w3-table w3-striped w3-border" align="center">
                <tr>
                    <th>Id Dokter</th>
                    <th>Nama Dokter</th>
                    <th>Poli</th>
                    <th>Spesialisasi</th>
                </tr>
                <?php
                while ($tampil = mysqli_fetch_array($ambildata)){
                    echo 
                    "<tr>
                        <td>$tampil[id]</td>
                        <td>$tampil[nama_dokter]</td>
                        <td>$tampil[poli]</td>
                        <td>$tampil[spesialisasi]</td>
                    </tr>";
                }
                ?>
            </table>
            <br><br>
            <?php
        }
    ?>
    </div>
    
    <br><br><br><br>
    <div>
        <!-- Footer -->
        <?php include "templates/footer.php"; ?>

        <!-- Script -->
        <?php include "include/script.php"; ?>
    </div>
    
</body>
</body>
</html>

