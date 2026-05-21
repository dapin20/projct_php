<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['level'] != 'user') {
    header("Location: ../login.php");
    exit;
}

include '../koneksi.php';

$id = $_GET['id'] ?? '';
$query = "SELECT b.*, u.username FROM berita b JOIN users u ON b.user_id = u.id WHERE b.id = $id";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) == 0) {
    header("Location: semua_berita.php");
    exit;
}

$berita = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $berita['judul']; ?> - Aplikasi Berita</title>
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
        .berita-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .berita-header {
            border-bottom: 3px solid #667eea;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .berita-title {
            font-size: 32px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }
        .berita-meta {
            color: #999;
            font-size: 14px;
        }
        .berita-content {
            color: #555;
            line-height: 1.8;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark sticky-top">
        <a class="navbar-brand" href="#">
            <i class="fas fa-newspaper"></i> User Dashboard
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
                    <a class="nav-link" href="berita_saya.php">
                        <i class="fas fa-pen-fancy"></i> Berita Saya
                    </a>
                    <a class="nav-link active" href="semua_berita.php">
                        <i class="fas fa-newspaper"></i> Semua Berita
                    </a>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 main-content">
                <div class="mb-4">
                    <a href="semua_berita.php" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <div class="berita-container">
                    <div class="berita-header">
                        <div class="berita-title"><?php echo $berita['judul']; ?></div>
                        <div class="berita-meta">
                            <i class="fas fa-user"></i> <strong><?php echo $berita['username']; ?></strong>
                            <span class="ml-3">
                                <i class="fas fa-calendar"></i> <?php echo date('d M Y H:i', strtotime($berita['created_at'])); ?>
                            </span>
                            <?php if ($berita['created_at'] != $berita['updated_at']): ?>
                                <span class="ml-3">
                                    <i class="fas fa-sync"></i> Diupdate: <?php echo date('d M Y H:i', strtotime($berita['updated_at'])); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if (!empty($berita['foto'])): ?>
                    <div style="margin: 30px 0;">
                        <img src="../upload/<?php echo $berita['foto']; ?>" alt="<?php echo $berita['judul']; ?>" style="max-width: 100%; max-height: 500px; border-radius: 5px;">
                    </div>
                    <?php endif; ?>

                    <div class="berita-content">
                        <?php echo nl2br($berita['isi']); ?>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
