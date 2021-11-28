<?php
session_start();
require "functions.php";
sec("guru");
$title = "Tambah Pelajar";
require "header.php";
include "css/borang.php";
include "css/button.php";

// cek bile tekan butang tambah
if (isset($_POST["submit"])) {
    //cek berjaya di tambah ke tak
    if (tambah($_POST) > 0) {
        echo "
        <script>
        alert('data berjaya ditambah');
        document.location.href = 'guru_senarai.php';
        </script>
        
        ";
    } else {
        echo "
        <script>
        alert('data tidak berjaya ditambah');
        document.location.href = 'guru_senarai.php';
        </script>
        
        ";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        h3.panjang {
            margin-top: 115px;
        }
    </style>
</head>

<body>
    <?php include "./include/menu.php" ?>
    <div class="kandungan">
        <h3 class="panjang">Tambah Pelajar</h3>
        <form class="panjang" action="" method="post">
            <table>
                <tr>
                    <td><label for="IDPelajar">ID :</label></td>
                    <td><input required type="text" name="IDPelajar" id="IDPelajar" maxlength="4" placeholder="Contoh:P001"></td>

                </tr>
                <tr>
                    <td> <label for="Nama_Pelajar">
                            Nama Pelajar : </label></td>
                    <td><input type="text" name="Nama_Pelajar" id="Nama_Pelajar" required></td>

                </tr>
                <tr>
                    <td><label for="IDKelas">Kelas :</label></td>
                    <td> <select id="IDKelas" name="IDKelas">
                            <?php kelaslist(); ?>
                        </select></td>
                </tr>
                <tr>
                    <td><label for="KataLaluan">KataLaluan : </label></td>
                    <td><input required type="password" id="KataLaluan" name="KataLaluan"></td>
                </tr>
            </table>
            <button class="tambah" type="submit" name="submit">Tambah</button>
        </form>
    </div>
</body>

</html>