<?php 
session_start();
//cek guru or not
if ($_SESSION['status'] != "guru") {
    header("Location: login.php");
    exit;
}
$nama = $_SESSION['nama'];
include "css/menu.php";
?>

<!-- untuk link menu -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="menu">
        <h3 class="menu">Menu Utama</h3>
        <h2 class="nama"><?= $nama; ?></h2>
        <ul>
            <li><a href="home_guru.php">Home</a></li>
            <li><a href="soalan_senarai.php">Soalan Kuiz</a></li>
            <li><a href="laporan_pilihan.php">Laporan Prestasi</a></li>
            <li><a href="guru_senarai.php">Senarai Guru & Pelajar</a></li>
            <li><a href="pelajar_insert.php">Menambah Pelajar</a></li>
            <li><a href="guru_insert.php">Menambah Guru</a></li>
            <li><a href="kelas_insert.php">Menambah Kelas</a></li>
            <li><a href="import.php">Import Data</a></li>
            <li><a href="logout.php">Log Keluar</a></li>
        </ul>
    </div>
</body>
</html>