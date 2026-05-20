<?php
session_start();
if (!empty($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}
$error = isset($_GET['error']) ? $_GET['error'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login - Tugas Mandiri</title>
</head>
<body>
<div>
    <h2>Login Siswa RPL</h2>
    <?php if ($error): ?>
        <div><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
    <form action="proses_login.php" method="post">
        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Masuk</button>
    </form>
    <p>Gunakan username <strong>siswa</strong> dan password <strong>rpl</strong></p>
</div>
</body>
</html>
