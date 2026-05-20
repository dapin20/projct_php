<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Data Ekstrakurikuler</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f2f7f2;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .kotak-utama {
            background: white;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #667eea;
            margin-top: 20px;
        }
        .judul {
            border-bottom: 3px solid #667eea;
            padding-bottom: 10px;
            margin-bottom: 20px;
            color: #667eea;
            font-weight: bold;
        }
        .btn-custom {
            border-radius: 5px;
        }
    </style>
</head>
<body>
<?php
session_start();
include "koneksi.php";

// cek session
if (!isset($_SESSION['username']) || $_SESSION['level'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>

    <nav class="navbar navbar-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1"><i class="fas fa-shield-alt"></i> Admin Dashboard</span>
            <div>
                <span class="text-white me-3">Welcome, <?= $_SESSION['username'] ?></span>
                <a href="logout.php" class="btn btn-danger btn-sm"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
    </nav>

    <div class="container kotak-utama">
        <h3 class="judul text-center"><i class="fas fa-trophy"></i> Data Pendaftaran Ekstrakurikuler</h3>
        
        <a href="tambah.php" class="btn btn-success mb-3"><i class="fas fa-user-plus"></i> Tambah Data</a>
        
        <?php if (isset($_GET["msg"])): ?>
            <div class="alert alert-info alert-dismissible fade show border-info">
                <strong>Info:</strong> <?= htmlspecialchars($_GET["msg"]) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-info text-center">
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Tgl Lahir</th>
                        <th>Kota</th>
                        <th>Jenis Kelamin</th>
                        <th>Hobi</th>
                        <th>Ekskul</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = $conn->query("SELECT * FROM tb_siswa ORDER BY nama ASC");
                    $no = 1;
                    
                    if ($result->num_rows == 0) {
                        echo "<tr><td colspan='10' class='text-center'>Belum ada data</td></tr>";
                    } else {
                        while ($row = $result->fetch_assoc()):
                    ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= htmlspecialchars($row['nis']) ?></td>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td><?= htmlspecialchars($row['kelas']) ?></td>
                        <td><?= htmlspecialchars($row['tgl_lahir']) ?></td>
                        <td><?= htmlspecialchars($row['kota']) ?></td>
                        <td><?= htmlspecialchars($row['jenis_kelamin']) ?></td>
                        <td><?= htmlspecialchars($row['hobi']) ?></td>
                        <td><?= htmlspecialchars($row['ekskul']) ?></td>
                        <td class="text-center">
                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php
                        endwhile;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
