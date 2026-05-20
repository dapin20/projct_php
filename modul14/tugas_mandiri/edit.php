<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Edit Siswa</title>
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
    $nis_param = $_GET["nis"] ?? "";

    $res  = mysqli_query($conn, "SELECT * FROM tb_siswa WHERE nis='".mysqli_real_escape_string($conn, $nis_param)."'");
    $data = mysqli_fetch_assoc($res);

    if (!$data) {
        echo "<div class='alert alert-danger'>Data tidak ditemukan.</div>";
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
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

        $sql = "UPDATE tb_siswa SET
                  nama   = '".mysqli_real_escape_string($conn, $nama)."',
                  kelas  = '".mysqli_real_escape_string($conn, $kelas)."',
                  ttl    = ".($ttl ? "'".mysqli_real_escape_string($conn, $ttl)."'" : "NULL").",
                  alamat = '".mysqli_real_escape_string($conn, $alamat)."',
                  kota   = '".mysqli_real_escape_string($conn, $kota)."',
                  jk     = '".mysqli_real_escape_string($conn, $jk)."',
                  hobi   = '".mysqli_real_escape_string($conn, $hobi)."',
                  ekskul = '".mysqli_real_escape_string($conn, $ekskul)."'
                WHERE nis = '".mysqli_real_escape_string($conn, $nis_param)."'";

        if (mysqli_query($conn, $sql)) {
            header("Location: index.php?msg=Data berhasil diperbarui");
            exit;
        } else {
            $error = "Gagal update: " . mysqli_error($conn);
        }
    }
  ?>

  <?php if ($error): ?>
    <div class="alert alert-danger py-2"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <form method="POST" action="">
    <?php $readonly = "readonly"; include "form.php"; ?>
  </form>
</div>
</body>
</html>