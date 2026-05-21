<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['level'] != 'user') {
    header("Location: ../login.php");
    exit;
}

include '../koneksi.php';

$query = "SELECT b.*, u.username FROM berita b JOIN users u ON b.user_id = u.id ORDER BY b.created_at DESC";
$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Berita - Aplikasi Berita</title>
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
        .berita-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
            transition: all 0.3s;
            overflow: hidden;
        }
        .berita-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        .berita-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .berita-title {
            color: #333;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
        }
        .berita-meta {
            color: #999;
            font-size: 13px;
            margin-bottom: 15px;
        }
        .berita-excerpt {
            color: #666;
            line-height: 1.6;
            margin-bottom: 15px;
        }
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #999;
        }
        .empty-state i {
            font-size: 60px;
            color: #ddd;
            margin-bottom: 20px;
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
                <h1 class="mb-4"><i class="fas fa-newspaper"></i> Semua Berita</h1>

                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $excerpt = substr($row['isi'], 0, 200);
                        if (strlen($row['isi']) > 200) {
                            $excerpt .= '...';
                        }
                        ?>
                        <div class="berita-card">
                            <?php if (!empty($row['foto'])): ?>
                            <img src="../upload/<?php echo $row['foto']; ?>" alt="<?php echo $row['judul']; ?>" class="berita-img">
                            <?php endif; ?>
                            <div class="berita-title"><?php echo $row['judul']; ?></div>
                            <div class="berita-meta">
                                <i class="fas fa-user"></i> <?php echo $row['username']; ?> 
                                <span class="ml-3">
                                    <i class="fas fa-calendar"></i> <?php echo date('d M Y', strtotime($row['created_at'])); ?>
                                </span>
                            </div>
                            <div class="berita-excerpt">
                                <?php echo nl2br($excerpt); ?>
                            </div>
                            <a href="semua_berita_detail.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">
                                <i class="fas fa-eye"></i> Baca Selengkapnya
                            </a>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <div class="empty-state">
                        <i class="fas fa-inbox"></i>
                        <h5>Belum Ada Berita</h5>
                        <p>Tidak ada berita yang tersedia saat ini.</p>
                    </div>
                    <?php
                }
                ?>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
