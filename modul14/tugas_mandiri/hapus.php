<?php
require "koneksi.php";
/** @var mysqli $koneksi */
    $conn = $koneksi;
    
$nis = $_GET["nis"] ?? "";

if (empty($nis)) {
    header("Location: index.php");
    exit;
}

$sql = "DELETE FROM tb_siswa WHERE nis='".mysqli_real_escape_string($conn, $nis)."'";

if (mysqli_query($conn, $sql)) {
    header("Location: index.php?msg=Data berhasil dihapus");
} else {
    header("Location: index.php?msg=Gagal menghapus data");
}
exit;