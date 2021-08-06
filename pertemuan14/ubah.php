<?php 
require "functions.php";

//ambil id di url
$id = $_GET["IDPelajar"];
$table = $_GET["table"];

//query data pelajar

$pelajar = query("SELECT * FROM $table WHERE IDPelajar = '$id'")[0];

if (isset($_POST["submit"])) {
    //cek berjaya diubah ke tak
    if (ubah($_POST) > 0) {
        echo "
        <script>
        alert('data berjaya diubah');
        document.location.href = 'index.php';
        </script>
        
        ";
    }else{
        echo "
        <script>
        alert('data tidak berjaya diubah');
        document.location.href = 'index.php';
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
    <title>Kemaskini Data Pelajar</title>
</head>
<body>
    <h1>Kemaskini Data Pelajar</h1>
    <form action="" method="post">
        <ul>
            
                <label for="IDPelajar">
                    ID Pelajar: <?= $pelajar['IDPelajar']; ?>
                    <input  type="hidden" name="IDPelajar" id="IDPelajar" placeholder="cht:P001" value="<?= $pelajar['IDPelajar']?>">
                </label>
            
            <li>
                <label for="Nama_Pelajar">
                    Nama Pelajar :
                    <input type="text" name="Nama_Pelajar" id="Nama_Pelajar" required value="<?= $pelajar['Nama_Pelajar']?>">
                </label>
            </li>
            <li>
                <label for="IDKelas">
                    Kelas :
                    <input type="text" name="IDKelas" id="IDKelas" value="<?= $pelajar['IDKelas']?>">
                </label>
            </li>
            <li>
                <label for="KataLaluan">
                    KataLaluan :
                    <input required type="password" id="KataLaluan" name="KataLaluan" value="<?= $pelajar['KataLaluan']?>">
                </label>
            </li>
            <li>
                <button type="submit" name="submit">Kemaskini</button>
            </li>
        </ul>
    </form>
    <a href="index.php">Kembali ke Home</a>
</body>
</html>