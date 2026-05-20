<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Tambah Siswa</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body class="bg-light">
<div class="container mt-4">
  <div class="mb-3">
    <a href="index.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
  </div>

  <?php
    require "koneksi.php";
    /** @var mysqli $koneksi */
    $conn = $koneksi;
    $error = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nis    = trim($_POST["nis"]);
        $nama   = trim($_POST["nama"]);
        $kelas  = $_POST["kelas"];
        $tgl    = $_POST["tgl"];
        $bln    = $_POST["bln"];
        $thn    = $_POST["thn"];
        $alamat = trim($_POST["alamat"]);
        $kota   = trim($_POST["kota"]);
        $jk     = $_POST["jk"] ?? "";
        $hobi   = isset($_POST["hobi"])  ? implode(",", $_POST["hobi"])  : "";
        $ekskul = isset($_POST["ekskul"])? implode(",", $_POST["ekskul"]): "";
        $ttl    = ($thn && $bln && $tgl) ? "$thn-$bln-$tgl" : null;

        if (empty($nis)) {
            $error = "NIS wajib diisi!";
        } else {
            $cek = mysqli_query($conn, "SELECT nis FROM tb_siswa WHERE nis='".mysqli_real_escape_string($conn, $nis)."'");
            if (mysqli_num_rows($cek) > 0) {
                $error = "NIS sudah terdaftar!";
            } else {
                $sql = "INSERT INTO tb_siswa (nis, nama, kelas, ttl, alamat, kota, jk, hobi, ekskul)
                        VALUES (
                          '".mysqli_real_escape_string($conn, $nis)."',
                          '".mysqli_real_escape_string($conn, $nama)."',
                          '".mysqli_real_escape_string($conn, $kelas)."',
                          ".($ttl ? "'".mysqli_real_escape_string($conn, $ttl)."'" : "NULL").",
                          '".mysqli_real_escape_string($conn, $alamat)."',
                          '".mysqli_real_escape_string($conn, $kota)."',
                          '".mysqli_real_escape_string($conn, $jk)."',
                          '".mysqli_real_escape_string($conn, $hobi)."',
                          '".mysqli_real_escape_string($conn, $ekskul)."'
                        )";
                if (mysqli_query($conn, $sql)) {
                    header("Location: index.php?msg=Data berhasil ditambahkan");
                    exit;
                } else {
                    $error = "Gagal menyimpan: " . mysqli_error($conn);
                }
            }
        }
    }
  ?>

  <?php if ($error): ?>
    <div class="alert alert-danger py-2"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <form method="POST" action="">
    <?php $data = $_POST ?: []; include "form.php"; ?>
  </form>
</div>
</body>
</html>