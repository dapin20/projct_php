<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

// Validasi (ini adalah contoh sederhana, dalam produksi gunakan database)
if (($username == 'admin' && $password == 'admin' && $level == 'admin') ||
    ($username == 'user' && $password == 'user' && $level == 'user')) {
    $_SESSION['user'] = $username;
    $_SESSION['level'] = $level;
    header("Location: index.php");
    exit;
} else {
    $_SESSION['error'] = "Username atau password salah!";
    header("Location: login.php");
    exit;
}
?>
