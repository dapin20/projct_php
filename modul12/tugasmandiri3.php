<?php
echo "<b>Pola Bintang Naik</b><br>";
for ($i=1; $i<=5; $i++) {
    for ($j=1; $j<=$i; $j++){
        echo "*";
    }
    echo "<br>";
}
echo "<br><b>Pola Bintang Turun</b><br>";
for ($i=5; $i>=1; $i--) {
    for ($j=1; $j<=$i; $j++) {
        echo "*";
    }
    echo "<br>";
}
echo "<br><b>Pola Angka</b><br>";
FOR ($i=1; $i<=5; $i++) {
    for ($j=1; $j<=$i; $j++) {
        echo $j." ";
    }
    echo "<br>";
}
?>