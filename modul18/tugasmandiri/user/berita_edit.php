<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['level'] != 'user') {
    header("Location: ../login.php");
    exit;
}

include '../koneksi.php';

$id = $_GET['id'] ?? '';
$query = "SELECT * FROM berita WHERE id = $id AND user_id = " . $_SESSION['user_id'];
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) == 0) {
    header("Location: berita_saya.php");
    exit;
}

$berita = mysqli_fetch_assoc($result);
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $isi = mysqli_real_escape_string($koneksi, $_POST['isi']);
    $foto = $berita['foto'];

    // Handle upload foto
    if (!empty($_FILES['foto']['name'])) {
        $nama_file = $_FILES['foto']['name'];
        $ukuran_file = $_FILES['foto']['size'];
        $tipe_file = $_FILES['foto']['type'];
        $tmp_file = $_FILES['foto']['tmp_name'];

        // Validasi tipe file
        $tipe_allowed = array('image/jpeg', 'image/png', 'image/gif', 'image/jpg');
        if (!in_array($tipe_file, $tipe_allowed)) {
            $error = "Tipe file tidak diizinkan! Hanya JPG, PNG, GIF yang diperbolehkan.";
        }
        // Validasi ukuran file (max 5MB)
        elseif ($ukuran_file > 5000000) {
            $error = "Ukuran file terlalu besar! Maksimal 5MB.";
        } else {
            // Hapus foto lama jika ada
            if (!empty($berita['foto']) && file_exists('../upload/' . $berita['foto'])) {
                unlink('../upload/' . $berita['foto']);
            }

            // Generate nama file unik
            $nama_file_baru = time() . '_' . str_replace(' ', '_', $nama_file);
            $path_upload = '../upload/' . $nama_file_baru;

            // Buat folder upload jika belum ada
            if (!is_dir('../upload')) {
                mkdir('../upload', 0755, true);
            }

            if (move_uploaded_file($tmp_file, $path_upload)) {
                $foto = $nama_file_baru;
            } else {
                $error = "Gagal upload file!";
            }
        }
    }

    if (!$error) {
        $foto_part = $foto ? ", foto = '$foto'" : ", foto = NULL";
        $query = "UPDATE berita SET judul = '$judul', isi = '$isi' $foto_part WHERE id = $id AND user_id = " . $_SESSION['user_id'];
        if (mysqli_query($koneksi, $query)) {
            $success = "Berita berhasil diupdate!";
            header("Refresh: 2; url=berita_saya.php");
        } else {
            $error = "Gagal mengupdate berita: " . mysqli_error($koneksi);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita - Aplikasi Berita</title>
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
        .form-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .form-group label {
            font-weight: 600;
            color: #333;
        }
        .form-control {
            border-radius: 5px;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .btn-submit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 10px 30px;
            font-weight: bold;
        }
        .btn-submit:hover {
            background: linear-gradient(135deg, #5568d3 0%, #693a91 100%);
            color: white;
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
                    <a class="nav-link active" href="berita_saya.php">
                        <i class="fas fa-pen-fancy"></i> Berita Saya
                    </a>
                    <a class="nav-link" href="semua_berita.php">
                        <i class="fas fa-newspaper"></i> Semua Berita
                    </a>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 main-content">
                <div class="mb-4">
                    <a href="berita_saya.php" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <h1 class="mb-4"><i class="fas fa-edit"></i> Edit Berita</h1>

                <?php if ($error): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal!</strong> <?php echo $error; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <?php if ($success): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Berhasil!</strong> <?php echo $success; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <div class="form-card">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="judul">Judul Berita <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="judul" name="judul" required value="<?php echo $berita['judul']; ?>">
                        </div>

                        <?php if (!empty($berita['foto'])): ?>
                        <div class="form-group">
                            <label>Foto Saat Ini:</label>
                            <img src="../upload/<?php echo $berita['foto']; ?>" alt="<?php echo $berita['judul']; ?>" style="max-width: 200px; max-height: 200px; border-radius: 5px;">
                        </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <label for="foto">Ganti Foto Berita</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                            <small class="form-text text-muted">Format: JPG, PNG, GIF | Maksimal 5MB (Kosongkan jika tidak ingin mengubah)</small>
                        </div>

                        <div class="form-group">
                            <label for="isi">Isi Berita <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="isi" name="isi" rows="10" required><?php echo $berita['isi']; ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-submit text-white">
                            <i class="fas fa-save"></i> Update Berita
                        </button>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
