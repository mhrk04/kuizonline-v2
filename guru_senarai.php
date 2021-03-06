<?php
session_start();
require "functions.php";
sec("guru");

$title = "Senarai Guru & Pelajar";
require "header.php";
include "css/senarai.php";

//query untuk senarai
$guru = query("SELECT * FROM guru");
$pelajar = query("SELECT * FROM pelajar");
//search
if (isset($_POST["cari"])) {
    $pelajar = cari($_POST["keyword"]);
}

?>

<style>
    #keyword {
        border: 2px solid;
        border-radius: 1.1rem;
        height: auto;
    }
</style>

<body>
    <?php include "./include/menu.php" ?>
    <div class="kandungan">
        <center>
            <br>
            <h2>Senarai Guru</h2>
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
                            <a class="update" href="guru_update.php?id=<?= $row['IDGuru']; ?>">Ubah</a>
                            <a class="padam" href="./include/hapus.php?id=<?= $row['IDGuru']; ?>&table=guru&fill=IDGuru" onclick="return confirm('Yakin hendak dipadam');">Padam</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </table>

            <!-- INI batas ke senarai pelajar -->

            <h2>Senarai Pelajar</h2>
            <!-- tobol cari -->
            <form action="" method="post">

                <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off" id="keyword">
                <button type="submit" name="cari" id="tombol-cari">Cari!</button>

            </form>
            <!-- table pelajar -->
            <?php $table = 'pelajar' ?>
            <h3>Jumlah pelajar semasa : <?php kiraBaris('pelajar') ?></h3>
            <div id="container">
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
                                <a class="update" href="pelajar_update.php?id=<?= $pel['IDPelajar']; ?>">Ubah</a>
                                <a class="padam" href="./include/hapus.php?id=<?= $pel['IDPelajar']; ?>&table=pelajar&fill=IDPelajar" onclick="return confirm('Yakin hendak dipadam');">Padam</a>
                            </td>
                        </tr>
                        <?php $j++; ?>
                    <?php endforeach; ?>
                </table>
            </div>
        </center>
    </div>
    <script src="js/ajax.js"></script>
</body>

</html>