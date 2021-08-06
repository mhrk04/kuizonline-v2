<?php
require "functions.php";
$kelas = query("SELECT * FROM kelas");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senarai Kelas</title>
    <link rel="stylesheet" href="senarai.css">
</head>
<body>
    <center>
    <h3>Senarai Kelas</h3>
    <br>
    <ul><li><a href="kelas_insert.php">Tambah Kelas</a></li></ul>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Bil.</th>
            <th>ID Kelas</th>
            <th>Nama Kelas</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($kelas as $row) :?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["IDKelas"]; ?></td>
            <td><?= $row["Nama_Kelas"]; ?></td>
            <td>
                <a href="kelas_update.php?IDKelas=<?= $row['IDKelas']; ?>">Ubah</a> |
                <a href="kelas_delete.php?IDKelas=<?= $row['IDKelas']; ?>" onclick="return confirm('Yakin hendak dipadam');">Padam</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    </center>
</body>
</html>