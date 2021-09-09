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

<div class="menu">
    <h3 class="menu">Menu Utama</h3>
    <h2 class="nama"><?= $nama; ?></h2>
    <ul>
        <li><a class="<?php if ($title == 'Home Guru') {
                            echo 'aktif';
                        } ?>" href="home_guru.php">Home</a></li>

        <li><a class="<?php if ($title == 'Soalan' || $title == 'Kemaskini Soalan') {
                            echo 'aktif';
                        } ?>" href="soalan_senarai.php">Soalan Kuiz</a></li>

        <li><a class="<?php if ($title == 'Laporan' || $title == 'Laporan Prestasi') {
                            echo 'aktif';
                        } ?>" href="laporan_pilihan.php">Laporan Prestasi</a></li>
        <li><a class="<?php if ($title == 'Senarai Guru & Pelajar' || $title == 'Kemaskini Guru' || $title == 'Kemaskini Pelajar') {
                            echo 'aktif';
                        } ?>" href="guru_senarai.php">Senarai Guru & Pelajar</a></li>

        <li><a class="<?php if ($title == 'Tambah Pelajar') {
                            echo 'aktif';
                        } ?>" href="pelajar_insert.php">Menambah Pelajar</a></li>
        <li><a class="<?php if ($title == 'Tambah Guru') {
                            echo 'aktif';
                        } ?>" href="guru_insert.php">Menambah Guru</a></li>
        <li><a class="<?php if ($title == 'Kelas' || $title == 'Kemaskini Kelas') {
                            echo 'aktif';
                        } ?>" href="kelas_insert.php">Menambah Kelas</a></li>
        <li><a class="<?php if ($title == 'Import') {
                            echo 'aktif';
                        } ?>" href="import.php">Import Data</a></li>
        <!-- ini batas logout -->
        <li><a class="logout" href="logout.php">Log Keluar</a></li>
    </ul>
</div>