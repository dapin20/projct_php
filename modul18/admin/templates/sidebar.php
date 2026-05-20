<?php
// Ensure the $page variable is set to avoid notices and ensure default behavior
if (!isset($page)) {
    $page = ''; // Default to empty string if $page is not defined
}
?>
<div class="sidebar">
        <h2> Admin</h2>

        <a href="index.php?page=dashboard" class="<?= ($page=='dashboard') ? 'active' : '' ?>">Dashboard</a>
        <a href="index.php?page=user" class="<?= ($page=='user') ? 'active' : '' ?>">User</a>
        <a href="index.php?page=berita" class="<?= ($page=='berita') ? 'active' : '' ?>">Berita</a>
        
        <hr>
        <a href="logout.php">Logout</a>
        
    </div>