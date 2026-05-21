<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['level'] != 'admin') {
    header("Location: ../login.php");
    exit;
}

include '../koneksi.php';

$id = $_GET['id'] ?? '';

// Cek apakah user ada
$query = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) == 0) {
    header("Location: user_list.php");
    exit;
}

// Hapus user
$delete_query = "DELETE FROM users WHERE id = $id";
if (mysqli_query($koneksi, $delete_query)) {
    header("Location: user_list.php?msg=deleted");
} else {
    header("Location: user_list.php?msg=error");
}
exit;
?>
