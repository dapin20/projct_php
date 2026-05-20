<?php
session_start();
include "koneksi.php";

// cek session
if (!isset($_SESSION['username']) || $_SESSION['level'] != 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $kota = $_POST['kota'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $hobi = $_POST['hobi'];
    $ekskul = $_POST['ekskul'];

    $stmt = $conn->prepare("UPDATE tb_siswa SET nis=?, nama=?, kelas=?, tgl_lahir=?, kota=?, jenis_kelamin=?, hobi=?, ekskul=? WHERE id=?");
    $stmt->bind_param("ssssssssi", $nis, $nama, $kelas, $tgl_lahir, $kota, $jenis_kelamin, $hobi, $ekskul, $id);
    
    if ($stmt->execute()) {
        header("Location: index.php?msg=Data berhasil diupdate!");
        exit();
    } else {
        header("Location: edit.php?id=$id&msg=Gagal mengupdate data!");
        exit();
    }
}
?>
