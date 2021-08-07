<?php 
session_start();
if ($_SESSION['status'] != "guru") {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        ul{
            list-style: none;
        }
    </style>
</head>
<body>
    <center>
    <nav>
        <ul>
            <li><a href="home_guru.php">Home</a></li>
            <li><a href="soalan_senarai.php">Soalan Kuiz</a></li>
            <li><a href="laporan_pilihan.php">Laporan Prestasi</a></li>
            <li><a href="guru_senarai.php">Senarai Guru & Pelajar</a></li>
            <li><a href="pelajar_insert.php">Menambah Pelajar</a></li>
            <li><a href="guru_insert.php">Menambah Guru</a></li>
            <li><a href="kelas_insert.php">Menambah Kelas</a></li>
            <li><a href="logout.php">Log Keluar</a></li>
            <li><a href="import.php">Import Data</a></li>
        </ul>
    </nav>
    </center>
</body>
</html>