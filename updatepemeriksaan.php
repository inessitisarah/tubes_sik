<h2> Update Data Pemeriksaan </h2>

<?php echo $_GET['update']; ?>

<?php session_start() ?>

<?php
    include "C:/xampp/htdocs/tubes_sik/koneksiDB.php";
    $sql = mysqli_query($koneksiDB, "Select * from tabel_periksa, tabel_pasien, tabel_dokter 
    where  tabel_periksa.id_periksa = '$_GET[update]'");
    $data = mysqli_fetch_array($sql);
?>

<form action="" method="post">
    <table>
        <tr>
            <td width="100">Nama</td>
            <td><?php echo $data['nama_pasien']; ?></td>
        </tr>
        <tr>
            <td>Diagnosis</td>
            <td><input type="text" name="Tuliskan Diagnosis" size="30" ></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Simpan" name="proses"></td>
        </tr>
    </table>
</form>