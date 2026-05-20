<?php
include "koneksi.php";
/** @var mysqli $koneksi */
$nis=$_GET['nis'];
$query="DELETE FROM tb_siswa WHERE nis='$nis'";
$hasil=mysqli_query($koneksi,$query);
if ($hasil) {
?>
<script language="JavaScript">document.location.href="tampil.php";</script>
    <?php
}else {
    echo "gagal hapus data";
}
?>