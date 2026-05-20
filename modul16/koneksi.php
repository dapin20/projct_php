<?php
//koneksi database
$host = "localhost";
$use = "root";
$pass = "";
$db = "db_latihan";
$conn = new mysqli($host, $use, $pass, $db);
// cek koneksi
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}
?>