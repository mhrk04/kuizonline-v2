<?php 
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
    <title>Tambah Pelajar</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="soalan_senarai.php">Soalan Kuiz</a></li>
            <li><a href="guru_senarai.php">Senarai Pelajar dan Guru</a></li>
            <li><a href="pelajar_insert.php">Menambah Pelajar</a></li>
            <li><a href="guru_insert.php">Menambah Guru</a></li>
            <li><a href="kelas_insert.php">Menambah Kelas</a></li>
        </ul>
    </nav>
    <h1>Tambah Pelajar</h1>
    <form action="" method="post">
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
                <td><button type="submit" name="submit">Tambah</button></td>
            </tr>
        </table>
    </form>
</body>
</html>