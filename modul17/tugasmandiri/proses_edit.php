<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['level'] != 'admin') {
    header("Location: login.php");
    exit;
}

include "koneksi.php";

$id = $conn->real_escape_string($_POST['id']);
$title = $conn->real_escape_string($_POST['title']);
$content = $conn->real_escape_string($_POST['content']);
$author = $conn->real_escape_string($_POST['author']);

// Ambil data lama
$sql_lama = "SELECT image FROM news WHERE id = $id";
$result = $conn->query($sql_lama);
$row = $result->fetch_assoc();
$image_lama = $row['image'];
$image_baru = $image_lama;

// Jika ada file gambar baru
if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
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
        // Hapus gambar lama
        @unlink("../upload/" . $image_lama);
    } else {
        die("Gagal upload gambar!");
    }
}

$sql = "UPDATE news SET title = '$title', content = '$content', author = '$author', image = '$image_baru' WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    $_SESSION['success'] = "Berita berhasil diupdate!";
    header("Location: index.php");
    exit;
} else {
    die("Error: " . $conn->error);
}
?>
