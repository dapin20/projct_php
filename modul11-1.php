<?php
echo "<h1>Variabel dan Tipa Data</h1><br>";
$a = 5; // Variabel bertipe integer
$b = 2.5; // Variabel bertipe float
$komentar = "Selamat Datang di pemrograman web"; // String
$status = true; // variabel bertipe bolean
$buah = ["apel", "jeruk", "mangga"]; // variabel bertipe array
$kosong = null; // variabel bertipe null

// Menampilkan dengan echo
echo "Nilai variabel a adalah = $a <br>";
echo "Nilai variabel b adalah = $b <br>";
echo "Nilai variabel komentar adalah = $komentar <br>";
echo "<hr>";
// menampilkan bolean
echo "Nilai variabel status (boolean) adalah = ";
var_dump(value: $status);
echo "<br><br>";
// Menampilkan array
echo "Isi variabel array adalah : <br>";
echo "<pre>";
print_r(value: $buah);
echo "</pre<";
// menampilkan null
echo "Nilai variabel kosong adalah = ";
var_dump(value: $kosong);
?> 