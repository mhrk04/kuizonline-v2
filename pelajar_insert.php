<?php
$title = "Tambah Pelajar";
require "header.php";
require "menu_guru.php";
include "css/borang.php";
include "css/button.php";

if ($_SESSION['status'] != "guru") {
    header("Location: login.php");
    exit;
}
require "functions.php";

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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelajar</title>
    <style>
        h3.panjang {
            margin-top: 115px;
        }
    </style>
</head>

<body>
    <div class="kandungan">
        <h3 class="panjang">Tambah Pelajar</h3>
        <form class="panjang" action="" method="post">
            <table>
                <tr>
                    <td><label for="IDPelajar">ID :</label></td>
                    <td><input required type="text" name="IDPelajar" id="IDPelajar" placeholder="Max 4 Char"></td>

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
                <tr>
                    <td><button class="tambah" type="submit" name="submit">Tambah</button></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>