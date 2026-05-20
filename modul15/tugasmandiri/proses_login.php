<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Hardcoded credentials (no database)
$validUser = 'siswa';
$validPass = 'rpl';

if ($username === $validUser && $password === $validPass) {
    $_SESSION['username'] = $username;
    header('Location: index.php');
    exit;
} else {
    $err = urlencode('Username atau password salah');
    header('Location: login.php?error='.$err);
    exit;
}
