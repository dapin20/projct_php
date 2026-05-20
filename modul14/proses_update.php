<?php
include "koneksi.php";
/** @var mysqli $koneksi */
$nis = $_POST['nis'];
$nama = $_POST['nama'];

$query="UPDATE tb_siswa SET nama='$nama' WHERE nis='$nis'";
$hasil = mysqli_query($koneksi, $query);
if ($hasil) {
    header('location:tampil.php');
}   else {
    echo "gagal update data";
    echo mysqli_error($koneksi);
}
?>