<?php
require "header.php";
require "menu_guru.php";
include "css/senarai.php";
if ($_SESSION['status'] != "guru") {
    header("Location: login.php");
    exit;
}
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
    <link rel="shortcut icon" href="css/img/mylogo.jpg" type="image/x-icon">
</head>

<body>
    <div class="kandungan">
        <center>
            <br>
            <h3>Senarai Guru</h3>
            <br>
            <table class="list">
                <tr>
                    <th>Bil.</th>
                    <th>ID Guru</th>
                    <th>Nama Guru</th>
                    <!-- <th>Kata Laluan</th> -->
                    <th>Aksi</th>
                </tr>
                <?php $i = 1; ?>
                <?php foreach ($guru as $row) : ?>
                    <tr class="list">
                        <td><?= $i; ?></td>
                        <td><?= $row["IDGuru"]; ?></td>
                        <td><?= $row["Nama_Guru"]; ?></td>
                        <!-- <td> //$row["KataLaluan"]; </td>             -->
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
            <table class="list">
                <tr>
                    <th>Bil.</th>
                    <th>ID Pelajar</th>
                    <th>Nama Pelajar</th>
                    <th>ID Kelas</th>
                    <th>Aksi</th>
                </tr>
                <?php $j = 1; ?>
                <?php foreach ($pelajar as $pel) : ?>
                    <tr class="list">
                        <td><?= $j; ?></td>
                        <td><?= $pel["IDPelajar"]; ?></td>
                        <td><?= $pel["Nama_Pelajar"]; ?></td>
                        <td><?= $pel["IDKelas"]; ?></td>
                        <td>
                            <a href="pelajar_update.php?id=<?= $pel['IDPelajar']; ?>">Ubah</a> |
                            <a href="hapus.php?id=<?= $pel['IDPelajar']; ?>&table=pelajar&fill=IDPelajar" onclick="return confirm('Yakin hendak dipadam');">Padam</a>
                        </td>
                    </tr>
                    <?php $j++; ?>
                <?php endforeach; ?>
            </table>
        </center>
    </div>
</body>

</html>