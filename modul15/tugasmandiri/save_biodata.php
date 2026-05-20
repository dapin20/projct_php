<?php
session_start();
if (empty($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
$nis = isset($_POST['nis']) ? trim($_POST['nis']) : '';
$kelas = isset($_POST['kelas']) ? trim($_POST['kelas']) : '';
$alamat = isset($_POST['alamat']) ? trim($_POST['alamat']) : '';

// Simple validation
if ($nama === '' || $nis === '' || $kelas === '' || $alamat === '') {
    $_SESSION['msg'] = 'Semua field harus diisi.';
    header('Location: index.php');
    exit;
}

$_SESSION['biodata'] = [
    'nama' => $nama,
    'nis' => $nis,
    'kelas' => $kelas,
    'alamat' => $alamat,
];

header('Location: index.php');
exit;
