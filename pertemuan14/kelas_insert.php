<?php 
require "functions.php";

//cek bile tekan tambah
if (isset($_POST["submit"])) {
    //cek berjaya di tambah ke tak
    if (tambahkelas($_POST) > 0) {
        echo "
        <script>
        alert('data berjaya ditambah');
        </script>
        
        ";
    }else{
        echo "
        <script>
        alert('data tidak berjaya ditambah');
        // document.location.href = 'index.php';
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
    <title>Tambah Kelas</title>
    <link rel="stylesheet" href="borang.css">
    <link rel="stylesheet" href="button.css">
</head>

<body>
    <h3 class="panjang">Tambah kelas</h3>
    <form class="panjang" action="" method="post">
        <table>
            <tr>
                <td>ID kelas</td>
                <td> <input type="text" name="IDKelas" placeholder="max 3 char"></td>
            </tr>
            <tr>
                <td> Nama kelas</td>
                <td> <input type="text" name="Nama_Kelas"></td>
            </tr>

        </table>
        <button class="tambah" type="submit" name="submit">Tambah</button>
    </form>
</body>

</html>