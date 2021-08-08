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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Pelajar</title>
</head>
<body>
    <ul>
        <li><?= $_SESSION['nama']; ?></li>
        <li><a href="home_pelajar.php">Home</a></li>
        <li><a href="jawab_soalan.php">Mula Kuiz</a></li>
        <li><a href="jawab_ulangkaji.php">Laporan</a></li>
        <li><a href="logout.php">Log Keluar</a></li>
    </ul>
</body>
</html>

