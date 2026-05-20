<?php
session_start();
include "koneksi.php";

// cek session
if (!isset($_SESSION['username']) || $_SESSION['level'] != 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $kota = $_POST['kota'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $hobi = $_POST['hobi'];
    $ekskul = $_POST['ekskul'];

    $stmt = $conn->prepare("INSERT INTO tb_siswa (nis, nama, kelas, tgl_lahir, kota, jenis_kelamin, hobi, ekskul) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $nis, $nama, $kelas, $tgl_lahir, $kota, $jenis_kelamin, $hobi, $ekskul);
    
    if ($stmt->execute()) {
        header("Location: index.php?msg=Data berhasil ditambahkan!");
        exit();
    } else {
        header("Location: tambah.php?msg=Gagal menambahkan data!");
        exit();
    }
}
?>
