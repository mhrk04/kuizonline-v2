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
    <h1>Selamat Datang <?= $_SESSION['nama']; ?> </h1>
  </div>
</body>