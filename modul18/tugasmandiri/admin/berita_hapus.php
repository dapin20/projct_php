<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['level'] != 'admin') {
    header("Location: ../login.php");
    exit;
}

include '../koneksi.php';

$id = $_GET['id'] ?? '';

// Cek apakah berita ada
$query = "SELECT * FROM berita WHERE id = $id";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) == 0) {
    header("Location: berita_list.php");
    exit;
}

// Hapus berita
$delete_query = "DELETE FROM berita WHERE id = $id";
if (mysqli_query($koneksi, $delete_query)) {
    header("Location: berita_list.php?msg=deleted");
} else {
    header("Location: berita_list.php?msg=error");
}
exit;
?>
