<?php
session_start();
$title = "Kemaskini Pelajar";
require "header.php";
include "css/borang.php";
include "css/button.php";
if ($_SESSION['status'] != "guru") {
    header("Location: login.php");
    exit;
}
require "functions.php";

//ambil id di url
$id = $_GET["id"];

//query data pelajar

$pelajar = query("SELECT * FROM pelajar WHERE IDPelajar = '$id'")[0];

if (isset($_POST["submit"])) {
    //cek berjaya diubah ke tak
    if (ubah($_POST) > 0) {
        echo "
        <script>
        alert('data berjaya diubah');
        document.location.href = 'guru_senarai.php';
        </script>
        
        ";
    } else {
        echo "
        <script>
        alert('data tidak berjaya diubah');
        document.location.href = 'guru_senarai.php';
        </script>
        
        ";
    }
}
?>
<!-- batas html -->
<style>
    h3.panjang {
        margin-top: 30px;
    }
</style>

<body>
    <?php include "./include/menu.php" ?>
    <div class="kandungan">
        <h3 class="panjang">Kemaskini Data Pelajar</h3>
        <form class="panjang" action="" method="post">
            <table>
                <tr>

                    <td> ID Pelajar: </td>
                    <td><?= $pelajar['IDPelajar']; ?></td><input type="hidden" name="IDPelajar" id="IDPelajar" placeholder="cht:P001" value="<?= $pelajar['IDPelajar'] ?>">
                </tr>

                <tr>
                    <td><label for="Nama_Pelajar">Nama Pelajar :</label></td>
                    <td><input type="text" name="Nama_Pelajar" id="Nama_Pelajar" required value="<?= $pelajar['Nama_Pelajar'] ?>"></td>

                </tr>
                <tr>
                    <td><label for="IDKelas">Kelas :</label></td>
                    <td><input type="text" name="IDKelas" id="IDKelas" value="<?= $pelajar['IDKelas'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="KataLaluan">KataLaluan :</label></td>
                    <td><input required type="password" id="KataLaluan" name="KataLaluan" value="<?= $pelajar['KataLaluan'] ?>"></td>
                </tr>
                <tr>
                    <td><button type="submit" class="update" name="submit">Kemaskini</button></td>
                </tr>
            </table>
        </form>
        <!-- <a href="guru_senarai.php">Kembali ke Senarai Nama</a> -->
    </div>
</body>

</html>