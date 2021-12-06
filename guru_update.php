<?php
session_start();
require "functions.php";
sec("guru");
$title = "Kemaskini Guru";
require "header.php";
include "css/button.php";

$id = $_GET["id"];
if ($id != $_SESSION['username']) {
    echo "
         <script>
         alert('Anda Tidak Boleh Mengubah Maklumat Pengguna Ini !');
         document.location.href = 'guru_senarai.php';
         </script>";
    exit;
}
$guru = query("SELECT * FROM guru WHERE IDGuru = '$id'")[0];

if (isset($_POST["submit"])) {
    //cek berjaya diubah ke tak
    if (ubahguru($_POST) > 0) {
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
include "css/borang.php";
?>

<head>
    <style>
        h3.panjang {
            margin-top: 51px;
        }
    </style>
</head>

<body>
    <?php include "./include/menu.php" ?>
    <div class="kandungan">
        <center>
            <h3 class="panjang">Kemaskini Data Guru</h3>
            <form class="panjang" action="" method="post">
                <input type="hidden" name="IDGuru" id="IDGuru" value="<?= $guru['IDGuru']; ?>">

                <table>
                    <tr>
                        <td>ID Guru: </td>
                        <td><?= $guru['IDGuru']; ?></td>
                    </tr>
                    <tr>
                        <td><label for="Nama_Guru">Nama Guru:</label></td>
                        <td><input type="text" name="Nama_Guru" id="Nama_Guru" value="<?= $guru['Nama_Guru']; ?>"></td>
                    </tr>

                    <tr>
                        <td><label for="KataLaluan">KataLaluan:</label></td>
                        <td><input type="text" name="KataLaluan" id="KataLaluan" value="<?= $guru['KataLaluan']; ?>"></td>
                    </tr>

                    <tr>
                        <td><button type="submit" class="update" name="submit">Kemaskini</button></td>
                    </tr>
                </table>
            </form>
        </center>
    </div>
</body>

</html>