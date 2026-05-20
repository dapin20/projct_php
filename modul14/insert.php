<html>
<head>
    <title>Insert Data Siswa</title>
    </head>
<body>
    <form method="POST" action="">
        <table border="1">
            <tr>
                <td>NIS</td>
                <td> : </td>
                <td><input type="text" name="nis"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td> : </td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="submit">
                <input type="reset" name="reset" value="reset"></td>
            </tr>
            </table>
    </form>
    <?php
    // memanggil file koneksi.php
    include "koneksi.php";
    /** @var mysqli $koneksi */
    @$nis=$_POST['nis'];
    @$nama=$_POST['nama'];
    @$kirim=$_POST['submit'];
    @$query="INSERT INTO tb_siswa (nis,nama) VALUES ('$nis','$nama')";
    //hasil data array
    if ($kirim) {
        $hasil=mysqli_query($koneksi,$query);
        echo "Data Berhasil Disimpan";
        echo "<a href='tampil.php'>Lihat Data</a>";
    }
    ?>
</body>
</html>
<?php
echo "<a href='insert.php'>Daftar</a>";
?>