<?php
include "koneksi.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = "user"; // otomatis setiap register dianggap sebagai user

    // cek username sudah ada atau belum
    $cek = $conn->prepare("SELECT * FROM tb_user WHERE username=?");
    $cek->bind_param("s", $username);
    $cek->execute();
    $result = $cek->get_result();
    
    if ($result->num_rows > 0) {
        echo "<script>alert('Username sudah digunakan!'); window.location='register.php';</script>";
    } else {
        // hash password (bcrypt)
        $hash = password_hash($password, PASSWORD_DEFAULT);
        // simpan ke database
        $stmt = $conn->prepare("INSERT INTO tb_user (username, password, level) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $hash, $level);
        if ($stmt->execute()) {
            echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='login.php';</script>";
        } else {
            echo "<script>alert('Registrasi gagal!'); window.location='register.php';</script>";
        }
    }
}
?>
