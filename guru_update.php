<?php 
require "header.php";
require "menu_guru.php";
if ($_SESSION['status'] != "guru") {
    header("Location: login.php");
    exit;}
require "functions.php";

$id = $_GET["id"];
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
    }else{
        echo "
        <script>
        alert('data tidak berjaya diubah');
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
    <title>Kemaskini Data Guru</title>
    <link rel="stylesheet" href="css/borang.css">
</head>
<body>
    <center>
        <h3 class="pendek">Kemaskini Data Guru</h3>
        <form class="pendek" action="" method="post">
        <table>
            <tr>
                <td><label for="IDGuru">ID Guru:</label></td>
                <td><input type="text" name="IDGuru" id="IDGuru" value="<?= $guru['IDGuru']; ?>"></td>
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
                <td><button type="submit" name="submit">Kemaskini</button></td>
            </tr>
        </table>
        </form>
    </center>
</body>
</html>