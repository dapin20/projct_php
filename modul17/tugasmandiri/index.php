<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

include "koneksi.php";
$sql = "SELECT * FROM news ORDER BY id DESC";
$result = $conn->query($sql);
$level = $_SESSION['level'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <span class="navbar-brand">📰 Sistem Berita</span>
            <div class="d-flex">
                <span class="text-white me-3">
                    <strong><?php echo ucfirst($level); ?></strong> | <?php echo $_SESSION['user']; ?>
                </span>
                <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Daftar Berita</h2>
            <?php if ($level == 'admin'): ?>
                <a href="form_tambah.php" class="btn btn-primary">+ Tambah Berita</a>
            <?php endif; ?>
        </div>

        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="../upload/<?php echo $row['image']; ?>" class="card-img-top" alt="Gambar">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h5>
                            <p class="card-text text-muted small">Oleh: <strong><?php echo htmlspecialchars($row['author']); ?></strong></p>
                            <p class="card-text"><?php echo substr($row['content'], 0, 80); ?>...</p>
                        </div>
                        <div class="card-footer bg-white">
                            <a href="detail.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-info">Detail</a>
                            <?php if ($level == 'admin'): ?>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php
                }
            } else {
                echo "<div class='alert alert-info'>Belum ada berita.</div>";
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
