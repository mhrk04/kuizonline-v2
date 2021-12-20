<?php
session_start();
$title = "Home";
require "./header.php";
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
    <?php
    if ($_SESSION['status'] == "guru") { ?>
      <h1>Selamat Datang Cikgu <?= $_SESSION['nama']; ?> </h1>
    <?php } else { ?>
      <h1>Selamat Datang <?= $_SESSION['nama']; ?> </h1>
    <?php } ?>
  </div>
</body>