<?php
session_start();
if ($_SESSION['status'] != "pelajar") {
    header("Location: login.php");
    exit;
}
include "css/menu.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="css/img/mylogo.jpg" type="image/x-icon">
</head>

<body>
    <div class="menu">
        <h3 class="menu">Main Menu</h3>
        <h2 class="nama"><?= $_SESSION['nama']; ?></h2>
        <div class="menu-area">
            <ul>
                <li><a class="<?php if ($title == 'Home Pelajar') {
                                    echo 'aktif';
                                } ?>" href="home_pelajar.php">Home</a></li>
                <li><a class="<?php if ($title == 'Mula Kuiz') {
                                    echo 'aktif';
                                } ?>" href="jawab_soalan.php">Mula Kuiz</a></li>
                <li><a class="<?php if ($title == 'Laporan') {
                                    echo 'aktif';
                                } ?>" href="jawab_ulangkaji.php">Laporan</a></li>
                <li><a class="logout" href="logout.php">Log Keluar</a></li>
            </ul>
        </div>
    </div>
    <?php include "footer.php" ?>
</body>

</html>