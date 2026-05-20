<?php
session_start();
include "koneksi.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ambil data user
    $stmt = $conn->prepare("SELECT * FROM tb_user WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if ($data) {
        // cek password (bcrypt)
        if (password_verify($password, $data['password'])) {
            $_SESSION['username'] = $data['username'];
            $_SESSION['level'] = $data['level'];
            $_SESSION['user_id'] = $data['id'];
            
            // redirect sesuai level
            if ($data['level'] == "admin") {
                header("Location: index.php");
            } else if ($data['level'] == "user") {
                header("Location: tampil.php");
            }
            exit();
        } else {
            echo "<script>alert('Password salah!'); window.location='login.php';</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!'); window.location='login.php';</script>";
    }
}
?>
