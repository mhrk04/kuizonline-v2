<?php
$title = "Home Guru";
include "header.php";
require "menu_guru.php";
if ($_SESSION['status'] != "guru") {
    header("Location: login.php");
    exit;
}
$nama = $_SESSION['nama'];
?>


<body>
    <div class="kandungan">
        <h1>Selamat Datang Cikgu <?= $_SESSION['nama']; ?> </h1>
    </div>
    <?php include "footer.php" ?>
</body>

</html>