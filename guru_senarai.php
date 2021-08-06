<?php
require "functions.php";
$guru = query("SELECT * FROM guru");
$pelajar = query("SELECT * FROM pelajar");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senarai Guru</title>
    <style>
        ul{
            list-style:none ;
        }
    </style>
</head>
<body>
    <center>
    <h3>Senarai Guru</h3>
    <br>
    <nav>
        <ul>
            <li><a href="soalan_senarai.php">Soalan Kuiz</a></li>
            <li><a href="guru_senarai.php">Senarai Pelajar dan Guru</a></li>
            <li><a href="pelajar_insert.php">Menambah Pelajar</a></li>
            <li><a href="guru_insert.php">Menambah Guru</a></li>
            <li><a href="kelas_insert.php">Menambah Kelas</a></li>
        </ul>
    </nav>
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
                <a href="guru_update.php?id=<?= $row['IDGuru']; ?>">Ubah</a> |
                <a href="hapus.php?id=<?= $row['IDGuru']; ?>&table=guru&fill=IDGuru" onclick="return confirm('Yakin hendak dipadam');">Padam</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    
<!-- INI batas ke senarai pelajar -->

    <h3>Senarai Pelajar</h3>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>Bil.</th>
            <th>ID Pelajar</th>
            <th>Nama Pelajar</th>
            <th>ID Kelas</th>
            <th>Kata Laluan</th>
            <th>Aksi</th>
        </tr>
        <?php $j = 1; ?>
        <?php foreach ($pelajar as $pel) :?>
        <tr>
            <td><?= $j; ?></td>
            <td><?= $pel["IDPelajar"]; ?></td>
            <td><?= $pel["Nama_Pelajar"]; ?></td>
            <td><?= $pel["IDKelas"]; ?></td>
            <td><?= $pel["KataLaluan"]; ?></td>
            <td>
                <a href="ubah.php?id=<?= $pel['IDPelajar']; ?>">Ubah</a> |
                <a href="hapus.php?id=<?= $pel['IDPelajar']; ?>&table=pelajar&fill=IDPelajar" onclick="return confirm('Yakin hendak dipadam');">Padam</a>
            </td>
        </tr>
        <?php $j++; ?>
        <?php endforeach; ?>
    </table>
    </center>
</body>
</html>