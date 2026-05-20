<?php
//form update atau edit
include "koneksi.php";
/** @var mysqli $koneksi */
$nis = $_GET['nis'];
$QUERY = "SELECT * FROM tb_siswa WHERE nis='$nis'";
$hasil = mysqli_query($koneksi, $QUERY);
$data = mysqli_fetch_array($hasil);
?>

<form method="post" action="proses_update.php">
    <table border="1">
        <tr>
            <td>NIS</td>
            <td>:</td>
            <td><input type="text" name="nis" value="<?php echo $data['nis']; ?>"></td>
        </tr>
        <tr>
            <td>NAMA</td>
            <td>:</td>
            <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="kirim"></td>
            <td></td>
            <td><input type="reset" name="reset" value="RESET"></td>
        </tr>
    </table>
</form>
