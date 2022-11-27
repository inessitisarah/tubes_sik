<h3> Halaman Pasien </h3>

<table border = "1">
    <tr>
        <th>Dokter</th>
        <th>Tanggal Periksa</th>
        <th>Diagnosis</th>
        <th>Preskripsi Obat</th>
    </tr>

    <?php
    include "koneksiDB.php";

    $ambildata = mysqli_query($koneksiDB, "select * from tabel_periksa, tabel_dokter
    WHERE tabel_periksa.id_dokter = tabel_dokter.id_dokter") or die (mysqli_error($koneksiDB));
    
    while ($tampil = mysqli_fetch_array($ambildata)){
        echo "
        <tr>
            <td>$tampil[nama_dokter]</td>
            <td>$tampil[tanggal_periksa]</td>
            <td>$tampil[diagnosis]</td>
            <td>$tampil[preskripsi_obat]</td>
        </tr>";
    }
    ?>
</table>