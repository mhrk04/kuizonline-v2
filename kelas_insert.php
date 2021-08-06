<?php 
require "functions.php";
$kelas = query("SELECT * FROM kelas");

//cek bile tekan tambah
if (isset($_POST["submit"])) {
    //cek berjaya di tambah ke tak
    if (tambahkelas($_POST) > 0) {
        echo "
        <script>
        alert('data berjaya ditambah');
        document.location.href = 'kelas_insert.php';
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
    <h2>Senarai Kelas</h2>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Bil.</th>
            <th>ID Kelas</th>
            <th>Nama Kelas</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($kelas as $row) :?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["IDKelas"]; ?></td>
            <td><?= $row["Nama_Kelas"]; ?></td>
            <td>
                <a href="kelas_update.php?IDKelas=<?= $row['IDKelas']; ?>">Ubah</a> |
                <a href="hapus.php?id=<?= $row['IDKelas']; ?>&table=kelas&fill=IDKelas" onclick="return confirm('Yakin hendak dipadam');">Padam</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>

    <h2>Tambah kelas</h2>
    <form  action="" method="post">
        <table>
            <tr>
                <td><label for="IDKelas"> ID kelas</label></td>
                <td> <input type="text" name="IDKelas" id="IDKelas" placeholder="max 3 char"></td>
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