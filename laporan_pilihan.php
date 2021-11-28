<?php
session_start();
require "functions.php";
sec("guru");
$title = "Laporan";
require "header.php";
include "css/button.php";
include "css/borang.php";
?>

<body>
    <?php include "./include/menu.php" ?>
    <div class="kandungan">
        <h3 class="panjang">PILIHAN JENIS LAPORAN</h3>
        <form class="panjang" action="laporan_cetak.php" method="POST">
            <select name='pilihan' id='pilihan' onchange='papar_pilihan()'>
                <option value="1">Semua Kelas dan Peratus</option>
                <option value="2">Mengikut Kelas</option>
                <option value="3">Mengikut Peratus</option>
                <option value="4">Mengikut Kelas dan Peratus</option>
            </select><br>
            <div id="kelas" style="display: none;">
                <select name="IDKelas">
                    <?php
                    // include('sambungan.php');
                    kelaslist()
                    ?>
                </select>
            </div>
            <div id="peratus" style="display: none;">
                <select name="peratus">
                    <option value=80>Lebih 80</option>
                    <option value=50>Lebih 50</option>
                    <option value=0>Kurang 50</option>
                </select>
            </div>
            <button class="papar" type="submit">Papar</button>
        </form>
        <script src="js/laporan.js"></script>
    </div>
</body>

</html>