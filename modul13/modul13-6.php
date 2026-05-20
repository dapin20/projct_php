<?php
if (isset($_POST['Proses'])) {
    $saran = $_POST['saran'];
    echo "Kritik / Saran Anda adalah : <br>";
    echo "<font color=blue><b>$saran</b></font>";
}
?>