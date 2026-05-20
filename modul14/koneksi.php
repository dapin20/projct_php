<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "db_biodata";
// membuat koneksi
$koneksi = mysqli_connect($host, $username, $password, $database);
//cek koneksi
if (!$koneksi) {
    die("koneksi gagal: " . mysqli_connect_error());
}
?>