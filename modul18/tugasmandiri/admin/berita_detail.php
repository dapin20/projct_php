<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['level'] != 'admin') {
    header("Location: ../login.php");
    exit;
}

include '../koneksi.php';

$id = $_GET['id'] ?? '';
$query = "SELECT b.*, u.username FROM berita b JOIN users u ON b.user_id = u.id WHERE b.id = $id";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) == 0) {
    header("Location: berita_list.php");
    exit;
}

$berita = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Berita - Aplikasi Berita</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f5f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .sidebar {
            background: white;
            min-height: 100vh;
            box-shadow: 2px 0 5px rgba(0,0,0,0.05);
            padding-top: 20px;
        }
        .sidebar .nav-link {
            color: #333;
            padding: 15px 20px;
            border-left: 3px solid transparent;
            transition: all 0.3s;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #f0f0f0;
            border-left-color: #667eea;
            color: #667eea;
        }
        .main-content {
            padding: 30px;
        }
        .detail-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .detail-row {
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }
        .detail-row:last-child {
            border-bottom: none;
        }
        .detail-label {
            font-weight: bold;
            color: #667eea;
        }
        .berita-content {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            border-left: 4px solid #667eea;
            margin-top: 10px;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark sticky-top">
        <a class="navbar-brand" href="#">
            <i class="fas fa-newspaper"></i> Admin Dashboard
        </a>
        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                <i class="fas fa-user"></i> <?php echo $_SESSION['username']; ?>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="../logout.php">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 sidebar">
                <div class="nav flex-column">
                    <a class="nav-link" href="index.php">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                    <a class="nav-link" href="user_list.php">
                        <i class="fas fa-users"></i> Kelola User
                    </a>
                    <a class="nav-link active" href="berita_list.php">
                        <i class="fas fa-newspaper"></i> Kelola Berita
                    </a>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 main-content">
                <div class="mb-4">
                    <a href="berita_list.php" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <h1 class="mb-4"><i class="fas fa-newspaper"></i> Detail Berita</h1>

                <div class="detail-card">
                    <div class="detail-row">
                        <div class="detail-label">ID Berita:</div>
                        <div><?php echo $berita['id']; ?></div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Judul:</div>
                        <div><?php echo $berita['judul']; ?></div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Penulis:</div>
                        <div><?php echo $berita['username']; ?></div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Tanggal Dibuat:</div>
                        <div><?php echo date('d M Y H:i:s', strtotime($berita['created_at'])); ?></div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Terakhir Diupdate:</div>
                        <div><?php echo date('d M Y H:i:s', strtotime($berita['updated_at'])); ?></div>
                    </div>
                    <?php if (!empty($berita['foto'])): ?>
                    <div class="detail-row">
                        <div class="detail-label">Foto:</div>
                        <div>
                            <img src="../upload/<?php echo $berita['foto']; ?>" alt="<?php echo $berita['judul']; ?>" style="max-width: 100%; max-height: 400px; border-radius: 5px;">
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="detail-row">
                        <div class="detail-label">Isi Berita:</div>
                        <div class="berita-content">
                            <?php echo nl2br($berita['isi']); ?>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="berita_edit.php?id=<?php echo $berita['id']; ?>" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="berita_hapus.php?id=<?php echo $berita['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin hapus?')">
                            <i class="fas fa-trash"></i> Hapus
                        </a>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
