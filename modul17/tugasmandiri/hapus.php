<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['level'] != 'admin') {
    header("Location: login.php");
    exit;
}

include "koneksi.php";

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

// Ambil nama gambar
$sql = "SELECT image FROM news WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$image = $row['image'];

// Hapus data dari database
$sql_delete = "DELETE FROM news WHERE id = $id";
if ($conn->query($sql_delete) === TRUE) {
    // Hapus file gambar
    @unlink("../upload/" . $image);
    
    $_SESSION['success'] = "Berita berhasil dihapus!";
    header("Location: index.php");
    exit;
} else {
    die("Error: " . $conn->error);
}
?>
