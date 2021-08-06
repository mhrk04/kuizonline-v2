<?php 
require "functions.php";

// cek bile tekan butang tambah
if (isset($_POST["submit"])) {
    //cek berjaya di tambah ke tak
    if (tambah($_POST) > 0) {
        echo "
        <script>
        alert('data berjaya ditambah');
        document.location.href = 'index.php';
        </script>
        
        ";
    }else{
        echo "
        <script>
        alert('data tidak berjaya ditambah');
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
    <title>Tambah Pelajar</title>
</head>
<body>
    <h1>Tambah Pelajar</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="IDPelajar">
                    ID :
                    <input required type="text" name="IDPelajar" id="IDPelajar" placeholder="cht:P001">
                </label>
            </li>
            <li>
                <label for="Nama_Pelajar">
                    Nama Pelajar :
                    <input type="text" name="Nama_Pelajar" id="Nama_Pelajar" required>
                </label>
            </li>
            <li>
                <label for="IDKelas">
                    Kelas :
                    <select id="IDKelas" name="IDKelas">
                        <?php kelaslist(); ?>
                    </select>
                </label>
            </li>
            <li>
                <label for="KataLaluan">
                    KataLaluan :
                    <input required type="password" id="KataLaluan" name="KataLaluan">
                </label>
            </li>
            <li>
                <button type="submit" name="submit">Tambah</button>
            </li>
        </ul>
    </form>
    <a href="index.php">Kembali ke Home</a>
</body>
</html>