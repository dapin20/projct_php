<?php
// Data siswa disimpan dalam variabel statis
$nis        = "2026001";
$nama_siswa = "GALANG";
$nilai_tugas = 85;
$nilai_uts   = 80;
$nilai_uas   = 90;
 
// Hitung total dan rata-rata
$total_nilai  = $nilai_tugas + $nilai_uts + $nilai_uas;
$rata_rata    = $total_nilai / 3;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Pengolahan Nilai Siswa</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Source+Serif+4:wght@300;400;600&display=swap');
 
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
 
        body {
            font-family: 'Source Serif 4', serif;
            background: #f5f0e8;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }
 
        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: #1a1a2e;
            margin-bottom: 32px;
            letter-spacing: 0.5px;
            text-align: center;
        }
 
        .card {
            background: #ffffff;
            border: 1px solid #d6c9a8;
            border-radius: 4px;
            width: 100%;
            max-width: 520px;
            box-shadow: 6px 6px 0px #c9b99a;
            overflow: hidden;
        }
 
        .card-header {
            background: #1a1a2e;
            color: #f5f0e8;
            padding: 14px 20px;
            font-family: 'Playfair Display', serif;
            font-size: 1.05rem;
            letter-spacing: 0.8px;
        }
 
        table {
            width: 100%;
            border-collapse: collapse;
        }
 
        tr {
            border-bottom: 1px solid #e8e0d0;
            transition: background 0.15s;
        }
 
        tr:last-child { border-bottom: none; }
        tr:hover { background: #faf7f2; }
 
        td {
            padding: 13px 20px;
            font-size: 0.95rem;
            color: #2d2d2d;
        }
 
        td:first-child {
            width: 45%;
            color: #5a5a6a;
            font-weight: 300;
        }
 
        td:last-child {
            font-weight: 400;
        }
 
        tr.highlight td {
            font-weight: 600;
            color: #1a1a2e;
            background: #f5f0e8;
            font-size: 1rem;
        }
 
        .colon { margin-right: 8px; color: #9a8c7a; }
    </style>
</head>
<body>
    <h1>Program Pengolahan Nilai Siswa</h1>
 
    <div class="card">
        <div class="card-header">Laporan Hasil Belajar</div>
        <table>
            <tr>
                <td>NIS</td>
                <td><span class="colon">:</span><?= htmlspecialchars($nis) ?></td>
            </tr>
            <tr>
                <td>Nama Siswa</td>
                <td><span class="colon">:</span><?= htmlspecialchars($nama_siswa) ?></td>
            </tr>
            <tr>
                <td>Nilai Tugas</td>
                <td><span class="colon">:</span><?= $nilai_tugas ?></td>
            </tr>
            <tr>
                <td>Nilai UTS</td>
                <td><span class="colon">:</span><?= $nilai_uts ?></td>
            </tr>
            <tr>
                <td>Nilai UAS</td>
                <td><span class="colon">:</span><?= $nilai_uas ?></td>
            </tr>
            <tr class="highlight">
                <td>Total Nilai</td>
                <td><span class="colon">:</span><?= $total_nilai ?></td>
            </tr>
            <tr class="highlight">
                <td>Rata-rata Nilai</td>
                <td><span class="colon">:</span><?= number_format($rata_rata, 2) ?></td>
            </tr>
        </table>
    </div>
</body>
</html>
 