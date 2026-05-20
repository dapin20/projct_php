<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
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
            border: 1px solid #667eea;
            margin-top: 20px;
        }
        .form-container h2 {
            color: #667eea;
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
?>

    <div class="container form-container">
        <h2><i class="fas fa-user-plus"></i> Tambah Data Siswa</h2>
        
        <form method="POST" action="proses_tambah.php">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nis" class="form-label">NIS:</label>
                        <input type="text" class="form-control" id="nis" name="nis" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas:</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tgl_lahir" class="form-label">Tanggal Lahir:</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="kota" class="form-label">Kota:</label>
                        <input type="text" class="form-control" id="kota" name="kota" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="hobi" class="form-label">Hobi:</label>
                        <input type="text" class="form-control" id="hobi" name="hobi" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="ekskul" class="form-label">Ekstrakurikuler:</label>
                        <input type="text" class="form-control" id="ekskul" name="ekskul" required>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="index.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Batal</a>
                <button type="submit" class="btn btn-success" name="submit"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
