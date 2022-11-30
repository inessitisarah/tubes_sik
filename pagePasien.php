
<html>

<head>

    <title>HALAMAN PASIEN</title>

    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
    <h2> Halaman Pasien </h2>

    Selamat datang <?php echo $_POST["uname"]; ?>

    <br>

    <table border = "1"> 
        <tr>
            <?php
            include "koneksiDB.php";
            $user = $_POST["uname"];
            
            $ambildata = mysqli_query($koneksiDB, "select * from tabel_pasien, tabel_periksa, tabel_dokter 
            WHERE tabel_pasien.uname = '$user' AND tabel_periksa.id_dokter = tabel_dokter.id_dokter") or die (mysqli_error($koneksiDB));
            while ($tampil = mysqli_fetch_array($ambildata)){
                echo "</tr>";
            }
            ?>
        </tr>
    </table>
    </br>
</body>
</html>