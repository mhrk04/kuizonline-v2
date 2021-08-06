<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}
//panggil fail function
require "functions.php";
// query senarai pelajar
$pelajar = query("SELECT * FROM pelajar");

//tombol cari di klik
if (isset($_POST["cari"])) {
    $pelajar = cari($_POST["keyword"]);
}

?>


<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    <a href="logout.php">Logout</a>

    <h1>Senarai Pelajar</h1>
    <br>
    <a href="tambah.php">Tambah pelajar</a>
    <br><br>
    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian">
        <button type="submit" name="cari">Cari</button>
    </form>
<br><br>

    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>Bil.</th>
            <th>ID Pelajar</th>
            <th>Nama Pelajar</th>
            <th>ID Kelas</th>
            <th>Kata Laluan</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($pelajar as $row) :?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["IDPelajar"]; ?></td>
            <td><?= $row["Nama_Pelajar"]; ?></td>
            <td><?= $row["IDKelas"]; ?></td>
            <td><?= $row["KataLaluan"]; ?></td>
            <td>
                <a href="ubah.php?IDPelajar=<?= $row['IDPelajar']; ?>&table=pelajar">Ubah</a> |
                <a href="hapus.php?IDPelajar=<?= $row['IDPelajar']; ?>&table=pelajar" onclick="return confirm('Yakin hendak dipadam');">Padam</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>