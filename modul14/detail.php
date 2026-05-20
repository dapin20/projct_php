<?php
//detail
include "koneksi.php";
/** @var mysqli $koneksi */
$nis = $_GET['nis'];
$QUERY = "SELECT * FROM tb_siswa WHERE nis='$nis'";
$hasil = mysqli_query($koneksi, $QUERY);
$data = mysqli_fetch_array($hasil);
?>
<table border="1">
    <tr><td>NIS</td><td>:</td><td><?php echo $data['nis']; ?></td></tr>
    <tr><td>NAMA</td><td>:</td><td><?php echo $data['nama']; ?></td></tr>
</table>
<p><a href="tampil.php">Kembali</a></p>