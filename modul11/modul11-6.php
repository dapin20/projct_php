<?php
echo "<h1>Variasi Konversi Tipe Data</h1><br>";
// 1. Konversi Manual / Explicit Casting (Cara yang paling umum)
$harga = "750.85 Rupiah";
echo "<b>1. Explicit Casting:</b><br>";
echo "Data Awal (String): $harga <br>";
$floatHarga = (float) $harga; // Dipaksa menjadi float/double
echo "Hasil (float): $floatHarga <br>";
$intHarga = (int) $harga; // Dipaksa menjadi integer
echo "Hasil (int): $intHarga <br><br>";

// 2. Konversi Otomatis / Implicit Conversion (Type Juggling)
echo "<b>2. Konversi Otomatis (Implicit):</b><br>";
$angkaString = "10";
$angkaInteger = 5;
// PHP otomatis mengubah $angkaString menjadi integer agar bisa dijumlahkan
$total = $angkaString + $angkaInteger;
echo "String '10' + Integer 5 = $total (Tipe: " . gettype($total) . ")<br><br>";

// 3. Menggunakan settype() (Seperti contoh awal Anda)
echo "<b>3. Menggunakan settype():</b><br>";
$bayar = "500.77 Rupiah";
settype($bayar, "double");
echo "Tipe Data Double : $bayar <br>";
settype($bayar, "integer");
echo "Tipe Data Integer : $bayar <br>";
?>
