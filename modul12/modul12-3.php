<?php
echo "<h1>Latihan 3: Pernyataan if-elseif</h1><br>";
$nilai = 88;
if ($nilai >= 86 && $nilai <= 100) {
    echo "Nilai: $nilai <br> Keterangan: Sangat Baik";
} elseif ($nilai >= 76 && $nilai <= 85) {
    echo "Nilai: $nilai <br> Keterangan: Baik";
} elseif ($nilai >= 66 && $nilai <= 75) {
    echo "Nilai: $nilai <br> Keterangan: Cukup";
} elseif ($nilai >= 0 && $nilai <= 65) {
    echo "Nilai: $nilai <br> Keterangan: Kurang";
} else {
    echo "Nilai: $nilai <br> Keterangan: Nilai Diluar Range";
}
?>