<?php
session_start();
require "functions.php";
sec("guru");
$title = "Kelas";
require "header.php";

include "css/senarai.php";
include "css/button.php";
include "css/borang.php";
$kelas = query("SELECT * FROM kelas");

//cek bile tekan tambah
if (isset($_POST["submit"])) {
    //cek berjaya di tambah ke tak
    if (tambahkelas($_POST) > 0) {
        echo "
        <script>
        alert('data berjaya ditambah');
        document.location.href = 'kelas_insert.php';
        </script>
        
        ";
    } else {
        echo "
        <script>
        alert('data tidak berjaya ditambah');
        // document.location.href = 'index.php';
        </script>
        
        ";
    }
}
?>
<style>
    h2 {
        text-align: center;
    }
</style>

<body>
    <?php include "./include/menu.php" ?>
    <div class="kandungan">
        <h2>Senarai Kelas</h2>
        <br>
        <table class="list">
            <tr class="list">
                <th class="bil">Bil.</th>
                <th>ID Kelas</th>
                <th>Nama Kelas</th>
                <th>Aksi</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($kelas as $row) : ?>
                <tr class="list">
                    <td><?= $i; ?></td>
                    <td><?= $row["IDKelas"]; ?></td>
                    <td><?= $row["Nama_Kelas"]; ?></td>
                    <td>
                        <a class="update" href="kelas_update.php?IDKelas=<?= $row['IDKelas']; ?>">Ubah</a>
                        <a class="padam" href="./include/hapus.php?id=<?= $row['IDKelas']; ?>&table=kelas&fill=IDKelas" onclick="return confirm('Yakin hendak dipadam');">Padam</a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>
        <br>
        <!-- ini batas untuk form tambah kelas -->
        <h3 class="pendek">Tambah kelas</h3>
        <form class="pendek" action="" method="post">
            <table style="border: none; margin:auto;">
                <tr>
                    <td class="tak"><label for="IDKelas"> ID kelas</label></td>
                    <td class="tak"> <input maxlength="3" type="text" name="IDKelas" id="IDKelas" placeholder="max 3 char"></td>
                </tr>
                <tr>
                    <td class="tak"> Nama kelas</td>
                    <td class="tak"> <input type="text" name="Nama_Kelas"></td>
                </tr>

            </table>
            <button class="tambah" type="submit" name="submit">Tambah</button>
        </form>
    </div>

</body>

</html>