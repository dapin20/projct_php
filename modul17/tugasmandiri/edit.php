<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['level'] != 'admin') {
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
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita</title>
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
                <div class="card">
                    <div class="card-header bg-warning text-white">
                        <h4 class="mb-0">Edit Berita</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="proses_edit.php" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            
                            <div class="mb-3">
                                <label for="title" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="content" class="form-label">Konten</label>
                                <textarea class="form-control" id="content" name="content" rows="5" required><?php echo htmlspecialchars($row['content']); ?></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="author" class="form-label">Penulis</label>
                                <input type="text" class="form-control" id="author" name="author" value="<?php echo htmlspecialchars($row['author']); ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="image" class="form-label">Gambar</label>
                                <div class="mb-2">
                                    <img src="../upload/<?php echo $row['image']; ?>" alt="Gambar" style="max-width: 200px;">
                                </div>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                            </div>
                            
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="index.php" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-warning">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
