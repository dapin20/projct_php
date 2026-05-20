<?php
session_start();
if (empty($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$biodata = isset($_SESSION['biodata']) ? $_SESSION['biodata'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Biodata Siswa - RPL</title>
</head>
<body>
<div>
    <h2>Halo, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
    <p><a href="logout.php">Logout</a></p>

    <?php if ($biodata): ?>
        <h3>Biodata Siswa</h3>
        <ul>
            <li><strong>Nama:</strong> <?php echo htmlspecialchars($biodata['nama']); ?></li>
            <li><strong>NIS:</strong> <?php echo htmlspecialchars($biodata['nis']); ?></li>
            <li><strong>Kelas:</strong> <?php echo htmlspecialchars($biodata['kelas']); ?></li>
            <li><strong>Alamat:</strong> <?php echo nl2br(htmlspecialchars($biodata['alamat'])); ?></li>
        </ul>
        <p><a href="#form">Ubah Biodata</a></p>
    <?php else: ?>
        <p>Belum ada biodata tersimpan. Silakan isi form di bawah.</p>
    <?php endif; ?>

    <h3 id="form">Form Biodata</h3>
    <form action="save_biodata.php" method="post">
        <label>Nama</label>
        <input type="text" name="nama" value="<?php echo $biodata ? htmlspecialchars($biodata['nama']) : ''; ?>" required>

        <label>NIS</label>
        <input type="text" name="nis" value="<?php echo $biodata ? htmlspecialchars($biodata['nis']) : ''; ?>" required>

        <label>Kelas</label>
        <input type="text" name="kelas" value="<?php echo $biodata ? htmlspecialchars($biodata['kelas']) : ''; ?>" required>

        <label>Alamat</label>
        <textarea name="alamat" required><?php echo $biodata ? htmlspecialchars($biodata['alamat']) : ''; ?></textarea>

        <button type="submit">Simpan Biodata</button>
    </form>
</div>
</body>
</html>
