
<?php 
// Menentukan halaman default
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

// White list halaman yang diizinkan
$allowed_pages = ['dashboard', 'user', 'berita',];

// Cek apakah halaman di izinkan
if (!in_array($page, $allowed_pages)) {
    $page = 'dashboard'; // Set ke halaman default jika tidak diizinkan
}
?>
<?php include 'admin/templates/header.php'; ?>
<?php include 'admin/templates/sidebar.php'; ?>

<div class="main">
    <div class="content">
        <?php include "admin/pages/$page.php"; ?>
    </div>

    <?php include "admin/templates/footer.php"; ?>
</div>

