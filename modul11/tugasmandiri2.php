
<?php
// =============================================
//  Program Menghitung Luas dan Keliling
//  Bangun Datar: segitiga siku-siku, persegi,
//  persegi panjang, dan lingkaran
// =============================================

// --- Segitiga Siku-Siku ---
$seg_alas   = 6;
$seg_tinggi = 8;
$seg_miring = sqrt(($seg_alas ** 2) + ($seg_tinggi ** 2)); // sisi miring
$luas_segitiga     = 0.5 * $seg_alas * $seg_tinggi;
$keliling_segitiga = $seg_alas + $seg_tinggi + $seg_miring;

// --- Persegi ---
$persegi_sisi       = 7;
$luas_persegi       = $persegi_sisi ** 2;
$keliling_persegi   = 4 * $persegi_sisi;

// --- Persegi Panjang ---
$pp_panjang         = 10;
$pp_lebar           = 5;
$luas_pp            = $pp_panjang * $pp_lebar;
$keliling_pp        = 2 * ($pp_panjang + $pp_lebar);

// --- Lingkaran ---
$lingkaran_r        = 7;
$pi                 = M_PI;
$luas_lingkaran     = $pi * ($lingkaran_r ** 2);
$keliling_lingkaran = 2 * $pi * $lingkaran_r;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luas & Keliling Bangun Datar</title>
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
            gap: 28px;
        }

        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: #1a1a2e;
            text-align: center;
            letter-spacing: 0.5px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 22px;
            width: 100%;
            max-width: 900px;
        }

        .card {
            background: #fff;
            border: 1px solid #d6c9a8;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 5px 5px 0px #c9b99a;
        }

        .card-header {
            padding: 12px 18px;
            font-family: 'Playfair Display', serif;
            font-size: 1rem;
            color: #f5f0e8;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-header .icon { font-size: 1.3rem; }

        /* Unique header colors per shape */
        .segitiga .card-header { background: #1a1a2e; }
        .persegi   .card-header { background: #2d5a3d; }
        .pp        .card-header { background: #7a3b1e; }
        .lingkaran .card-header { background: #4a2060; }

        .card-body { padding: 16px 18px; }

        .params {
            font-size: 0.82rem;
            color: #7a6e60;
            margin-bottom: 14px;
            line-height: 1.7;
        }

        .result-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #ede8de;
            font-size: 0.92rem;
        }

        .result-row:last-child { border-bottom: none; }

        .label { color: #5a5a6a; font-weight: 300; }

        .value {
            font-weight: 600;
            color: #1a1a2e;
            background: #f5f0e8;
            padding: 3px 10px;
            border-radius: 3px;
        }

        .formula {
            font-size: 0.75rem;
            color: #9a8c7a;
            margin-top: 2px;
            font-style: italic;
        }
    </style>
</head>
<body>
    <h1>Luas &amp; Keliling Bangun Datar</h1>

    <div class="grid">

        <!-- SEGITIGA SIKU-SIKU -->
        <div class="card segitiga">
            <div class="card-header">
                <span class="icon">△</span> Segitiga Siku-Siku
            </div>
            <div class="card-body">
                <div class="params">
                    Alas = <?= $seg_alas ?> &nbsp;|&nbsp;
                    Tinggi = <?= $seg_tinggi ?> &nbsp;|&nbsp;
                    Miring = <?= number_format($seg_miring, 2) ?>
                </div>
                <div class="result-row">
                    <div>
                        <div class="label">Luas</div>
                        <div class="formula">½ × alas × tinggi</div>
                    </div>
                    <div class="value"><?= number_format($luas_segitiga, 2) ?></div>
                </div>
                <div class="result-row">
                    <div>
                        <div class="label">Keliling</div>
                        <div class="formula">alas + tinggi + miring</div>
                    </div>
                    <div class="value"><?= number_format($keliling_segitiga, 2) ?></div>
                </div>
            </div>
        </div>

        <!-- PERSEGI -->
        <div class="card persegi">
            <div class="card-header">
                <span class="icon">■</span> Persegi
            </div>
            <div class="card-body">
                <div class="params">
                    Sisi = <?= $persegi_sisi ?>
                </div>
                <div class="result-row">
                    <div>
                        <div class="label">Luas</div>
                        <div class="formula">sisi × sisi</div>
                    </div>
                    <div class="value"><?= number_format($luas_persegi, 2) ?></div>
                </div>
                <div class="result-row">
                    <div>
                        <div class="label">Keliling</div>
                        <div class="formula">4 × sisi</div>
                    </div>
                    <div class="value"><?= number_format($keliling_persegi, 2) ?></div>
                </div>
            </div>
        </div>

        <!-- PERSEGI PANJANG -->
        <div class="card pp">
            <div class="card-header">
                <span class="icon">▬</span> Persegi Panjang
            </div>
            <div class="card-body">
                <div class="params">
                    Panjang = <?= $pp_panjang ?> &nbsp;|&nbsp; Lebar = <?= $pp_lebar ?>
                </div>
                <div class="result-row">
                    <div>
                        <div class="label">Luas</div>
                        <div class="formula">panjang × lebar</div>
                    </div>
                    <div class="value"><?= number_format($luas_pp, 2) ?></div>
                </div>
                <div class="result-row">
                    <div>
                        <div class="label">Keliling</div>
                        <div class="formula">2 × (panjang + lebar)</div>
                    </div>
                    <div class="value"><?= number_format($keliling_pp, 2) ?></div>
                </div>
            </div>
        </div>

        <!-- LINGKARAN -->
        <div class="card lingkaran">
            <div class="card-header">
                <span class="icon">●</span> Lingkaran
            </div>
            <div class="card-body">
                <div class="params">
                    Jari-jari (r) = <?= $lingkaran_r ?> &nbsp;|&nbsp; π = <?= number_format($pi, 5) ?>
                </div>
                <div class="result-row">
                    <div>
                        <div class="label">Luas</div>
                        <div class="formula">π × r²</div>
                    </div>
                    <div class="value"><?= number_format($luas_lingkaran, 2) ?></div>
                </div>
                <div class="result-row">
                    <div>
                        <div class="label">Keliling</div>
                        <div class="formula">2 × π × r</div>
                    </div>
                    <div class="value"><?= number_format($keliling_lingkaran, 2) ?></div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>