<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['level'] != 'admin') {
    header("Location: login.php");
    exit;
}

include "koneksi.php";

$title = $conn->real_escape_string($_POST['title']);
$content = $conn->real_escape_string($_POST['content']);
$author = $conn->real_escape_string($_POST['author']);

if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    die("Gagal mengunggah file!");
}

$image = $_FILES['image']['name'];
$image_baru = time() . '_' . basename($image);
$tmp = $_FILES['image']['tmp_name'];
$target = "../upload/" . $image_baru;

$ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
$allowed = ['jpg', 'jpeg', 'png', 'gif'];

if (!in_array($ext, $allowed)) {
    die("Format gambar tidak valid!");
}

if (move_uploaded_file($tmp, $target)) {
    $sql = "INSERT INTO news (title, content, author, image) VALUES ('$title', '$content', '$author', '$image_baru')";
    
    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = "Berita berhasil ditambahkan!";
        header("Location: index.php");
        exit;
    } else {
        die("Error: " . $conn->error);
    }
} else {
    die("Gagal upload gambar!");
}
?>
