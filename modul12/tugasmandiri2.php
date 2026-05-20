<?php

// Soal 2: Penghitung Diskon dengan Input

// Ambil input dari form HTML (metode POST)
$jumlah_bayar = 0;
$hasil = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jumlah_bayar = (float) $_POST["harga"];

    if ($jumlah_bayar >= 500000) {
        $diskon = 50;
    } elseif ($jumlah_bayar >= 100000) {
        $diskon = 10;
    } elseif ($jumlah_bayar >= 50000) {
        $diskon = 5;
    } else {
        $diskon = 0;
    }

    $potongan    = $jumlah_bayar * $diskon / 100;
    $total_bayar = $jumlah_bayar - $potongan;

    if ($diskon > 0) {
        $hasil = "Selamat! Anda mendapat diskon {$diskon}%\n";
        $hasil .= "Potongan    : Rp "
                 . number_format($potongan, 0, ",", ".") . "\n";
        $hasil .= "Total bayar : Rp "
                 . number_format($total_bayar, 0, ",", ".") . "\n";
    } else {
        $hasil = "Maaf, Anda tidak mendapat diskon.\n";
        $hasil .= "Total bayar : Rp "
                 . number_format($jumlah_bayar, 0, ",", ".");
    }

    echo $hasil;
}

?>

<!-- Form HTML untuk input harga -->
<form method="post">
    <label>Masukkan jumlah bayar: Rp </label>
    <input type="number" name="harga" required>
    <button type="submit">Hitung Diskon</button>
</form>

<?php if ($hasil) echo "<pre>$hasil</pre>"; ?>