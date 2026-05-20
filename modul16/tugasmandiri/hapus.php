<?php
session_start();
include "koneksi.php";

// cek session
if (!isset($_SESSION['username']) || $_SESSION['level'] != 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $stmt = $conn->prepare("DELETE FROM tb_siswa WHERE id=?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header("Location: index.php?msg=Data berhasil dihapus!");
    } else {
        header("Location: index.php?msg=Gagal menghapus data!");
    }
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>
