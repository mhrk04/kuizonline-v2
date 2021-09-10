<?php
$title = "Home Guru";
require "header.php";
require "menu_guru.php";
if ($_SESSION['status'] != "guru") {
    header("Location: login.php");
    exit;
}
$nama = $_SESSION['nama'];
?>


<body>
    <div class="kandungan">
        <img src="css/img/mylogo.jpg" width="150px" alt="logo">
        <h1>Selamat Datang Cikgu <?= $_SESSION['nama']; ?> </h1>
    </div>
    <?php include "footer.php" ?>
</body>

</html>