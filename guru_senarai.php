<?php
require "functions.php";
$guru = query("SELECT * FROM guru");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senarai Guru</title>
    <link rel="stylesheet" href="senarai.css">
</head>
<body>
    <center>
    <h3>Senarai Guru</h3>
    <br>
    <ul><li><a href="guru_insert.php">Tambah Guru</a></li></ul>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Bil.</th>
            <th>ID Guru</th>
            <th>Nama Guru</th>
            <th>Kata Laluan</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($guru as $row) :?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["IDGuru"]; ?></td>
            <td><?= $row["Nama_Guru"]; ?></td>
            <td><?= $row["KataLaluan"]; ?></td>            
            <td>
                <a href="guru_update.php?IDGuru=<?= $row['IDGuru']; ?>">Ubah</a> |
                <a href="hapus.php?id=<?= $row['IDGuru']; ?>&table=guru&fill=IDGuru" onclick="return confirm('Yakin hendak dipadam');">Padam</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    </center>
</body>
</html>