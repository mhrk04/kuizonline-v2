<?php
session_start();
$title = "Tambah Guru";
require "header.php";
include "css/borang.php";
include "css/button.php";

if ($_SESSION['status'] != "guru") {
    header("Location: login.php");
    exit;
}
require "functions.php";

if (isset($_POST["submit"])) {
    //cek berjaya di tambah ke tak
    if (tambahguru($_POST) > 0) {
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

<style>
    center {
        margin-top: 50px;
    }
</style>

<body>
    <?php include "./include/menu.php" ?>
    <div class="kandungan">
        <center>
            <h3 class="panjang">Tambah Guru</h3>
            <form class="panjang" action="" method="post">
                <table>
                    <tr>
                        <td><label for="IDGuru">ID Guru:</label></td>
                        <td><input type="text" name="IDGuru" id="IDGuru" maxlength="3" placeholder="Max Char 3"></td>
                    </tr>
                    <tr>
                        <td><label for="Nama_Guru">Nama Guru:</label></td>
                        <td><input type="text" name="Nama_Guru" id="Nama_Guru"></td>
                    </tr>
                    <tr>
                        <td><label for="KataLaluan">KataLaluan:</label></td>
                        <td><input type="password" name="KataLaluan" id="KataLaluan"></td>
                    </tr>
                </table>
                <button type="submit" class="tambah" name="submit">Tambah</button>
            </form>
        </center>
    </div>
</body>

</html>