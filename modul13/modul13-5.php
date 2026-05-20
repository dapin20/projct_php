<?php
if (isset($_POST['Pilih'])) {
    $film = $_POST['kartun'];
    echo "Film Kartun Favorit Anda adalah;
    <b>font color='red'>$film</font></b>";
}