<html>
<head>
    <title>Latihan For</title>
</head>
<body>
<h1>Latihan 5</h1>
<h2>Looping for dengan increment += 5</h2>
<?php
$brush_price = 5;
echo "<table border=\"1\" align=\"center\">";
echo "<tr><th>Quantity</th><th>Price</th></tr>";
for ($counter = 10; $counter <= 100; $counter += 5) {
    echo "<tr>";
    echo "<td>$counter</td>";
    echo "<td>" . ($brush_price * $counter) . "</td>";
    echo "</tr>";
}
echo "</table>";
?>

<h2>Looping while</h2>
<?php
$counter = 10;
echo "<table border=\"1\" align=\"center\">";
echo "<tr><th>Quantity</th><th>Price</th></tr>";
while ($counter <= 100) {
    echo "<tr><td>$counter</td><td>" . ($brush_price * $counter) . "</td></tr>";
    $counter += 5;
}
echo "</table>";
?>

<h2>Looping do-while</h2>
<?php
$counter = 10;
echo "<table border=\"1\" align=\"center\">";
echo "<tr><th>Quantity</th><th>Price</th></tr>";
do {
    echo "<tr><td>$counter</td><td>" . ($brush_price * $counter) . "</td></tr>";
    $counter += 5;
} while ($counter <= 100);
echo "</table>";
?>

<h2>Kesimpulan</h2>
<p>Dengan <code>$counter += 5</code>, nilai quantity bertambah 5 setiap iterasi: 10, 15, 20, ... sampai 100.</p>
<p>Loop <strong>for</strong> cocok untuk jumlah iterasi yang sudah diketahui. Loop <strong>while</strong> dan <strong>do-while</strong> bekerja sama, hanya perbedaan bahwa <strong>do-while</strong> akan menjalankan isi minimal sekali.</p>
</body>
</html>
