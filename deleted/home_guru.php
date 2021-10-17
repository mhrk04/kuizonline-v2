<?php
session_start();
$title = "Home Guru";
require "header.php";
if ($_SESSION['status'] != "guru") {
    header("Location: login.php");
    exit;
}
?>
<style>
    .cen {
        margin: auto;
        text-align: center;
    }
</style>

<body>
    <?php include "./include/menu.php" ?>
    <div class="kandungan">
        <div class="cen"><img src="css/img/mylogo.jpg" alt="logo"></div>
        <h1>Selamat Datang Cikgu <?= $_SESSION['nama']; ?> </h1>
    </div>
    <?php include "footer.php" ?>
</body>

</html>