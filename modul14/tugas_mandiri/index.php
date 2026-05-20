<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Ekstrakurikuler Siswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f2f7f2; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .kotak-utama { background: white; padding: 20px; border-radius: 8px; border: 1px solid #c3e6cb; }
        .judul { border-bottom: 3px solid #28a745; padding-bottom: 10px; margin-bottom: 20px; color: #155724; }
    </style>
</head>
<body>
<div class="container mt-4 kotak-utama">
    <h3 class="judul text-center"><i class="fas fa-trophy"></i> Data Pendaftaran Ekstrakurikuler</h3>
    <a href="tambah.php" class="btn btn-success mb-3"><i class="fas fa-user-plus"></i> Tambah Siswa</a>

    <?php if (isset($_GET["msg"])): ?>
        <div class="alert alert-info border-info">
            <strong>Info:</strong> <?= htmlspecialchars($_GET["msg"]) ?>
        </div>
    <?php endif; ?>

    <table class="table table-bordered table-hover">
        <thead class="table-success text-center">
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
            require "koneksi.php";
            /** @var mysqli $koneksi */
    $conn = $koneksi;
            $result = mysqli_query($conn, "SELECT * FROM tb_siswa ORDER BY nama ASC");
            $no = 1;
            if (mysqli_num_rows($result) == 0) {
                echo "<tr><td colspan='10' class='text-center'>Belum ada data</td></tr>";
            } else {
                while ($row = mysqli_fetch_assoc($result)):
            ?>
            <tr>
                <td class="text-center"><?= $no++ ?></td>
                <td><?= htmlspecialchars($row["nis"]) ?></td>
                <td><?= htmlspecialchars($row["nama"]) ?></td>
                <td class="text-center"><?= htmlspecialchars($row["kelas"]) ?></td>
                <td><?= $row["ttl"] ? date("d-m-Y", strtotime($row["ttl"])) : "-" ?></td>
                <td><?= htmlspecialchars($row["kota"]) ?></td>
                <td><?= $row["jk"] == "L" ? "Laki-laki" : "Perempuan" ?></td>
                <td><?= htmlspecialchars($row["hobi"]) ?></td>
                <td><?= htmlspecialchars($row["ekskul"]) ?></td>
                <td class="text-center">
                    <a href="edit.php?nis=<?= urlencode($row["nis"]) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                    <a href="hapus.php?nis=<?= urlencode($row["nis"]) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin hapus data?')"><i class="fas fa-trash"></i> Hapus</a>
                </td>
            </tr>
            <?php endwhile; } ?>
        </tbody>
    </table>
</div>
</body>
</html>