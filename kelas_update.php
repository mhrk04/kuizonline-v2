<?php 
require "functions.php";

//ambil id di url
$id = $_GET["IDKelas"];

//query data Kelas

$kelas = query("SELECT * FROM kelas WHERE IDKelas = '$id'")[0];

if (isset($_POST["submit"])) {
    //cek berjaya diubah ke tak
    if (ubahkel($_POST) > 0) {
        echo "
        <script>
        alert('data berjaya diubah');
        document.location.href = 'kelas_insert.php';
        </script>
        
        ";
    }else{
        echo "
        <script>
        alert('data tidak berjaya diubah');
        document.location.href = 'kelas_insert.php';
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
    <title>Kemaskini Data Kelas</title>
    <!-- <link rel="stylesheet" href="borang.css"> -->
</head>
<body>
    <h3>Kemaskini Data Kelas</h3>
    <form action="" method="post">
        <table>
        <input  type="hidden" name="IDKelas" id="IDKelas" placeholder="cht:P001" value="<?= $kelas['IDKelas']?>">
            <tr>
                <td> ID Kelas: <?= $kelas['IDKelas']; ?> </td>
            </tr>
            <tr>
                <td>
                <label for="Nama_Kelas">
                    Nama Kelas :
                    <input type="text" name="Nama_Kelas" id="Nama_Kelas" required value="<?= $kelas['Nama_Kelas']?>">
                </label>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="submit">Kemaskini</button>
                </td>
            </tr>
        </table>
    </form>
    <a href="kelas_insert.php">Kembali</a>
</body>
</html>