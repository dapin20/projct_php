<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

if ($_SESSION['level'] != 'user') {
    header("Location: ../admin/index.php");
    exit;
}

include '../koneksi.php';

// Ambil berita yang dibuat user ini
$query = "SELECT COUNT(*) as total FROM berita WHERE user_id = " . $_SESSION['user_id'];
$result = mysqli_fetch_assoc(mysqli_query($koneksi, $query));
$my_berita_count = $result['total'];

// Ambil semua berita
$query = "SELECT COUNT(*) as total FROM berita";
$result = mysqli_fetch_assoc(mysqli_query($koneksi, $query));
$total_berita_count = $result['total'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User - Aplikasi Berita</title>
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
        .stat-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            text-align: center;
            margin-bottom: 20px;
            transition: transform 0.3s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        .stat-card i {
            font-size: 40px;
            margin-bottom: 15px;
        }
        .stat-card.my-berita i {
            color: #667eea;
        }
        .stat-card.all-berita i {
            color: #764ba2;
        }
        .stat-card h3 {
            color: #333;
            font-weight: bold;
            margin-top: 10px;
        }
        .stat-card p {
            color: #999;
            margin: 0;
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
                    <a class="nav-link active" href="index.php">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                    <a class="nav-link" href="berita_saya.php">
                        <i class="fas fa-pen-fancy"></i> Berita Saya
                    </a>
                    <a class="nav-link" href="semua_berita.php">
                        <i class="fas fa-newspaper"></i> Semua Berita
                    </a>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 main-content">
                <h1 class="mb-4">
                    <i class="fas fa-chart-line"></i> Dashboard User
                </h1>

                <div class="row">
                    <div class="col-md-6">
                        <div class="stat-card my-berita">
                            <i class="fas fa-pencil-alt"></i>
                            <h3><?php echo $my_berita_count; ?></h3>
                            <p>Berita Saya</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="stat-card all-berita">
                            <i class="fas fa-newspaper"></i>
                            <h3><?php echo $total_berita_count; ?></h3>
                            <p>Semua Berita</p>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <div style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                            <h4 class="mb-3">Selamat Datang, <?php echo $_SESSION['username']; ?>! 👋</h4>
                            <p>Anda dapat melakukan:</p>
                            <ul>
                                <li>✏️ <strong>Berita Saya</strong> - Lihat, tambah, edit, dan hapus berita yang anda buat</li>
                                <li>📰 <strong>Semua Berita</strong> - Lihat semua berita yang ada di sistem</li>
                            </ul>
                            <p class="mt-3">Gunakan menu di sebelah kiri untuk navigasi.</p>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
