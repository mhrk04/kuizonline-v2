<?php
session_start();
$title = "Home Guru";
require "header.php";
require "menu_guru.php";
if ($_SESSION['status'] != "guru") {
    header("Location: login.php");
    exit;
}
$nama = $_SESSION['nama'];
?>
<style>
    .cen {
        margin: auto;
        text-align: center;
    }
</style>

<body>
    <div class="kandungan">
        <div class="cen"><img src="css/img/mylogo.jpg" alt="logo"></div>
        <h1>Selamat Datang Cikgu <?= $_SESSION['nama']; ?> </h1>
    </div>
    <?php include "footer.php" ?>
</body>

</html>