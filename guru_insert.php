<?php 
require "menu_guru.php";

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
    }else{
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
    <title>Menambah Guru</title>
</head>
<body>
    <h2>Tambah Guru</h2>
    <form action="" method="post">
        <table>
            <tr>
                <td><label for="IDGuru">ID Guru:</label></td>
                <td><input type="text" name="IDGuru" id="IDGuru" placeholder="Max Char 3"></td>
            </tr>
            <tr>
                <td><label for="Nama_Guru">Nama Guru:</label></td>
                <td><input type="text" name="Nama_Guru" id="Nama_Guru" ></td>
            </tr>
            <tr>
                <td><label for="KataLaluan">KataLaluan:</label></td>
                <td><input type="password" name="KataLaluan" id="KataLaluan"></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Tambah</button></td>
            </tr>
        </table>
        </form>
</body>
</html>