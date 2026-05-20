<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f2f7f2;
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            border: 1px solid #ffc107;
            margin-top: 20px;
        }
        .form-container h2 {
            color: #ffc107;
            font-weight: bold;
            margin-bottom: 20px;
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

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM tb_siswa WHERE id='$id'");
$row = $result->fetch_assoc();

if (!$row) {
    header("Location: index.php?msg=Data tidak ditemukan!");
    exit();
}
?>

    <div class="container form-container">
        <h2><i class="fas fa-edit"></i> Edit Data Siswa</h2>
        
        <form method="POST" action="proses_edit.php">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nis" class="form-label">NIS:</label>
                        <input type="text" class="form-control" id="nis" name="nis" value="<?= htmlspecialchars($row['nis']) ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($row['nama']) ?>" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas:</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" value="<?= htmlspecialchars($row['kelas']) ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tgl_lahir" class="form-label">Tanggal Lahir:</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= htmlspecialchars($row['tgl_lahir']) ?>" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="kota" class="form-label">Kota:</label>
                        <input type="text" class="form-control" id="kota" name="kota" value="<?= htmlspecialchars($row['kota']) ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki" <?= ($row['jenis_kelamin'] == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="Perempuan" <?= ($row['jenis_kelamin'] == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="hobi" class="form-label">Hobi:</label>
                        <input type="text" class="form-control" id="hobi" name="hobi" value="<?= htmlspecialchars($row['hobi']) ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="ekskul" class="form-label">Ekstrakurikuler:</label>
                        <input type="text" class="form-control" id="ekskul" name="ekskul" value="<?= htmlspecialchars($row['ekskul']) ?>" required>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="index.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Batal</a>
                <button type="submit" class="btn btn-warning" name="submit"><i class="fas fa-save"></i> Update</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
