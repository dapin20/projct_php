<?php
session_start();
//hapus semua data session
session_unset();
//hancurkan session
session_destroy();
//keterangan setelah logout
echo "Anda telah berhasil logout!<br>";
echo "<a href='login.php'>Login kembali</a>";

//langsung redirect ke login.php
//header("Location: login.php");
exit();
?>