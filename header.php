<?php
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}
include "css/menu.php";

?>
<!-- batas html -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
  <meta name="description" content="Kuiz Santai Sejarah untuk projek sk | @mhaziqrk">
  <meta name="keywords" content="@mhaziqrk kuiz website">
  <meta name="author" content="Mhaziq Rohaizan">
  <link rel="shortcut icon" href="css/img/mylogo.jpg" type="image/x-icon">
  <title><?= $title; ?></title>
</head>
<div class="all">

  <style>
    h1.header {
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      font-size: 20px;
      font-weight: bold;
      text-align: center;
      color: black;
    }
  </style>
  <div class="header">
    <h1 class="header">KUIZ SANTAI SEJARAH </h1>
  </div>
  <?php include "./include/footer.php" ?>