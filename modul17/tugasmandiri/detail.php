<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

include "koneksi.php";

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$sql = "SELECT * FROM news WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    header("Location: index.php");
    exit;
}

$row = $result->fetch_assoc();
$level = $_SESSION['level'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <span class="navbar-brand">📰 Sistem Berita</span>
            <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="index.php" class="btn btn-secondary mb-3">&larr; Kembali</a>
                
                <div class="card">
                    <img src="../upload/<?php echo $row['image']; ?>" class="card-img-top" alt="Gambar">
                    <div class="card-body">
                        <h1 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h1>
                        <p class="text-muted">
                            <strong>Penulis:</strong> <?php echo htmlspecialchars($row['author']); ?> | 
                            <strong>Tanggal:</strong> <?php echo $row['date']; ?>
                        </p>
                        <hr>
                        <p class="card-text"><?php echo nl2br(htmlspecialchars($row['content'])); ?></p>
                    </div>
                    <div class="card-footer">
                        <?php if ($level == 'admin'): ?>
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
