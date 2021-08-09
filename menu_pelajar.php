<?php
session_start();
if ($_SESSION['status'] != "pelajar") {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Menu Pelajar</title>
    <link rel="stylesheet" href="css/menu2.css">
</head>
<body>
    <div class="menu">
        <h3 class="menu">Main Menu</h3>
        <h2 class="nama"><?= $_SESSION['nama']; ?></h2>
    <div class="menu-area">
    <ul>
        <li><a href="home_pelajar.php">Home</a></li>
        <li><a href="jawab_soalan.php">Mula Kuiz</a></li>
        <li><a href="jawab_ulangkaji.php">Laporan</a></li>
        <li><a href="logout.php">Log Keluar</a></li>
    </ul>
    </div>
    </div>
</body>
</html>

