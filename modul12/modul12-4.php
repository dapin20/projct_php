<?php
echo "<h1>Latihan 4: Pernyataan switch</h1><br>";
$nilai = 88;
switch (true) {
    case ($nilai >= 86 && $nilai <= 100):
        echo "Nilai: $nilai <br> Keterangan: Sangat Baik";
        break;
    case ($nilai >= 76 && $nilai <= 85):
        echo "Nilai: $nilai <br> Keterangan: Baik";
        break;
    case ($nilai >= 66 && $nilai <= 75):
        echo "Nilai: $nilai <br> Keterangan: Cukup";
        break;
    case ($nilai >= 0 && $nilai <= 65):
        echo "Nilai: $nilai <br> Keterangan: Kurang";
        break;
    default:
        echo "Nilai: $nilai <br> Keterangan: Nilai Diluar Range";
}
// Perbedaan: switch lebih cocok untuk pilihan tetap; di sini kita menggunakan switch(true)
// agar bisa mengevaluasi rentang nilai seperti dalam if-elseif.
?>